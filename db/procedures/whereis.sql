create or replace PROCEDURE       whereIs(
travel_id_ IN TRAVEL.TRAVEL_ID%type,
next_station_id OUT STATION.STATION_ID%type,
ETA OUT INTERVAL DAY TO second,
train_status OUT NUMBER)
AS
train_id_  TRAIN.TRAIN_ID%type;
v_total_time LINE_STOP.DURATION_TIME%type;
v_last_stop_time LINE_STOP.DURATION_TIME%type;
v_start_time TRAVEL.START_TIME%type;
v_last_STATION LINE_STOP.STATION_ID%type;
v_delta_time DELTA_TIME_STATION.DELTA_TIME%type;
v_late  TRAVEL.LATE_TIME%type;
v_train_type  TRAIN.TRAIN_TYPE_ID%type;
v_coef number;
CURSOR c_next_stop is
     select ls.station_id, ls.duration_time from LINE_STOP ls, TRAVEl t  where t.travel_id=travel_id_ AND t.line_id=ls.line_id ORDER BY ORDER_STOP ASC;

v_next_stop c_next_stop%rowtype;
BEGIN 

OPEN c_next_stop; -- open cursor

FETCH c_next_stop INTO v_next_stop ;
v_last_STATION := v_next_stop.station_id;

v_last_stop_time := v_next_stop.DURATION_TIME;

train_status := 0; -- default train status is stop


select SPEED_COEFFICIENT into v_coef from TRAIN_ID_SPEED_COEFFICIENT tisc where tisc.TRAVEL_ID = travel_id_;

-- get the starting station into v_last_STATION

select nvl(LATE_TIME,0) into v_total_time FROM TRAVEL WHERE TRAVEL_ID = travel_id_;
--v_total_time :=0; -- set total time to 0 

-- get start time into v_start_time
SELECT  START_TIME  into  v_start_time FROM TRAVEL t where travel_id_ = t.travel_id ;

getETA(v_start_time,0,v_next_stop.DURATION_TIME,v_total_time,ETA, train_status);
CheckCode(travel_id_,ETA, v_last_STATION,v_last_STATION,train_status,train_status,v_late);

v_total_time := v_total_time + v_last_stop_time;
next_station_id := v_last_STATION;

IF train_status= 0 THEN -- if turn arount time for depart si good

    -------------- LOOP

    LOOP
    FETCH c_next_stop INTO v_next_stop ;

        IF c_next_stop%NOTFOUND THEN -- if no result 

            exit;
        END IF;


    -- get next sation id
    next_station_id := v_next_stop.station_id;

    
    --dbms_output.put_line( v_last_STATION ||';' || next_station_id); 

    -- get time to this station
    v_delta_time := getDTSF(v_last_STATION,next_station_id, v_coef);
  

    getETA(v_start_time,v_delta_time,v_next_stop.DURATION_TIME,v_total_time,ETA, train_status);
    CheckCode(travel_id_,ETA, v_last_STATION,next_station_id,train_status,train_status,v_late);
    -- calculate diffrence bewteen the it shoud take and curent time
    
    

    IF  train_status = 1 OR train_status = 2 OR train_status = 3 OR train_status = 4 OR train_status = 5 then -- travel not finish or a quai
        checkDeparture(travel_id_,v_last_STATION,train_status);
        dbms_output.put_line('[TRAVEL ID='|| travel_id_ || ' ]'); 
        dbms_output.put_line('[WHEREIS][UPDATE] next station='||next_station_id||' status='||train_status);
        exit;
    END IF;

    -- add for next loop the time to go to the station with turn around
    v_total_time := v_total_time + v_next_stop.DURATION_TIME + v_delta_time;
    v_last_STATION := next_station_id;

    END LOOP;

    CLOSE c_next_stop;

    END iF;

    IF train_status = 0 THEN
        dbms_output.put_line( '[WHEREIS][LINE FINISH] update start time to 30 for travel id '||travel_id_); 
        UPDATE TRAVEL SET START_TIME=START_TIME+ interval '30' day, LATE_TIME = null  where TRAVEL_ID = travel_id_;
        Update PLATFORM SET PLATFORM_USER= NULL, PLATFORM_UTILISATION=0 WHERE PLATFORM_USER =train_id_;
        train_status := 3;
        checkDeparture(travel_id_,v_last_STATION,train_status);
        clearTickets(travel_id_);

        commit;

    END IF;
    if v_late > 0 then

         update TRAVEL  SET LATE_TIME = nvl(LATE_TIME,0) + v_late WHERE TRAVEL_ID = travel_id_;
          commit;
     end if;

    EXCEPTION
    WHEN NO_DATA_FOUND THEN
    next_station_id := null;
ETA := null;
train_status := null;
END;