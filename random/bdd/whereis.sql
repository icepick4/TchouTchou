create or replace PROCEDURE whereIs(
travel_id_ IN TRAVEL.TRAVEL_ID%type,
next_station_id OUT STATION.STATION_ID%type,
ETA OUT INTERVAL DAY TO second,
train_status OUT NUMBER)
AS
train_id_  TRAIN.TRAIN_ID%type;
v_total_time LINE_STOP.DURATION_TIME%type;
v_last_stop_time LINE_STOP.DURATION_TIME%type;
v_start_time TRAVEL.START_TIME%type;
v_last_STATION LINE.START_STATION_ID%type;
v_delta_time DELTA_TIME_STATION.DELTA_TIME%type;

CURSOR c_next_stop is
     select ls.station_id, ls.duration_time from LINE_STOP ls, LINE l, TRAVEl t  where t.travel_id=travel_id_ AND t.line_id=l.line_id AND l.line_id=ls.line_id ORDER BY ORDER_STOP ASC;

v_next_stop c_next_stop%rowtype;
BEGIN 

    v_last_stop_time := 5; -- to be chnage default turn around time

    train_status := 0; -- default train status is stop
    -- get the starting station into v_last_STATION
    select START_STATION_ID into v_last_STATION from LINE l, TRAVEl t  where t.travel_id=travel_id_ AND t.line_id=l.line_id;

    v_total_time :=v_last_stop_time; -- set total time to 0 add first station tunr around

    -- get start time into v_start_time
    SELECT  START_TIME  into  v_start_time FROM TRAVEL t where travel_id_ = t.travel_id ;
    getETA(v_start_time,0,v_total_time,0,ETA, train_status);
    next_station_id := v_last_STATION;

    IF train_status= 0 THEN -- if turn arount time for depart si good

    -------------- LOOP
    OPEN c_next_stop; -- open cursor
    LOOP
    FETCH c_next_stop INTO v_next_stop ;

    IF c_next_stop%NOTFOUND THEN -- if no result or last sattion
        --v_last_STATION
        -- next_station_id

         select END_STATION_ID into next_station_id from LINE l, TRAVEl t  where t.travel_id=travel_id_ AND t.line_id=l.line_id;
         dbms_output.put_line('for last station '|| v_last_STATION ||';' || next_station_id); 
         getDTS(v_last_STATION,next_station_id,v_delta_time);


         -- set to 5 for wainting turn aroundt  time  for all sation
         getETA(v_start_time,v_delta_time,5,v_total_time,ETA, train_status);
    -- calculate diffrence bewteen the it shoud take and curent time

    ---------------------
     --ADD if 0 set START DATE TO +23h

     -----------------

    exit;
    END IF;
    -- get next sation id
    next_station_id := v_next_stop.station_id;

    -- get time to this station
    dbms_output.put_line( v_last_STATION ||';' || next_station_id); 


    getDTS(v_last_STATION,next_station_id,v_delta_time);

    getETA(v_start_time,v_delta_time,v_next_stop.DURATION_TIME,v_total_time,ETA, train_status);
    -- calculate diffrence bewteen the it shoud take and curent time

    IF  train_status = 1 OR train_status = 2 OR train_status=3 then -- travel not finish or a quai
        exit;
    END IF;

    -- add for next loop the time to go to the station with turn around
    v_total_time := v_total_time + v_next_stop.DURATION_TIME + v_delta_time;
    v_last_STATION := next_station_id;

    END LOOP;

    CLOSE c_next_stop;

    END iF;

    IF train_status = 0 THEN
        dbms_output.put_line( 'update start time to 24h for travel id '||travel_id_); 
        UPDATE TRAVEL SET START_TIME=START_TIME+ interval '24' hour  where TRAVEL_ID = travel_id_;
        commit;

    END IF;

    EXCEPTION
    WHEN NO_DATA_FOUND THEN
    next_station_id := null;
ETA := null;
train_status := null;


    /*

    declare
v_st STATION.STATION_ID%TYPE;
v_ETA INTERVAL DAY TO SECOND;
v_code NUMBER;
begin

    whereis(5,v_st,v_ETA,v_code);
    dbms_output.put_line('direction station '  || v_st); 
    dbms_output.put_line('ETA ' || v_ETA); 
    dbms_output.put_line('code status ' || v_code); 
    --dbms_output.put_line( extract (hour   from v_ETA)||':'||extract (minute    from v_ETA)); 
    --dbms_output.put_line(CURRENT_TIMESTAMP); 

end;



    declare
v_delta_time DELTA_TIME_STATION.DELTA_TIME%type;
begin

    getDTS(1,7,v_delta_time);
    dbms_output.put_line('v_delta_time '  || v_delta_time); 


end;

declare

CURSOR c_next_trip is
     select TRAVEl_ID from  TRAVEl t  ORDER BY TRAVEl_ID ASC;

v_next_trip c_next_trip%rowtype;
v_st STATION.STATION_ID%TYPE;
v_ETA INTERVAL DAY TO SECOND;
v_code NUMBER;
begin


    OPEN c_next_trip; -- open cursor
    LOOP
    FETCH c_next_trip INTO v_next_trip ;

    IF c_next_trip%NOTFOUND THEN
    exit;
    end if;
    dbms_output.put_line( v_next_trip.TRAVEl_ID); 

    whereis(5,v_st,v_ETA,v_code);


    insert into TRAIN_ETA VALUES (v_next_trip.TRAVEl_ID, v_st, v_ETA, v_code);

     END LOOP;

    CLOSE c_next_trip;

    EXCEPTION
      WHEN DUP_VAL_ON_INDEX
      THEN
         UPDATE TRAIN_ETA SET TO_SATION = v_st, ETA = v_ETA, CODE= v_code where TRAVEL_ID = v_next_trip.TRAVEl_ID;




end;




;*/
END;