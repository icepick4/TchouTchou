CREATE OR REPLACE PROCEDURE TCHOU.whereIs(
train_id_ IN TRAIN.TRAIN_ID%type,
next_station_id OUT STATION.STATION_ID%type,
ETA OUT INTERVAL DAY TO second,
train_status OUT NUMBER)
AS
v_total_time LINE_STOP.DURATION_TIME%type;
v_last_stop_time LINE_STOP.DURATION_TIME%type;
v_start_time TRAVEL.START_TIME%type;
v_last_STATION LINE.START_STATION_ID%type;
v_delta_time DELTA_TIME_STATION.DELTA_TIME%type;

CURSOR c_next_stop is
     select ls.station_id, ls.duration_time from LINE_STOP ls, LINE l, TRAVEl t  where t.train_id=train_id_ AND t.line_id=l.line_id AND l.line_id=ls.line_id ORDER BY ORDER_STOP ASC;

v_next_stop c_next_stop%rowtype;
BEGIN 

    v_last_stop_time := 5; -- to be chnage default turn around time

    train_status := 0; -- default train status is stop
    -- get the starting station into v_last_STATION
    select START_STATION_ID into v_last_STATION from LINE l, TRAVEl t  where t.train_id=train_id_ AND t.line_id=l.line_id;

    v_total_time :=v_last_stop_time; -- set total time to 0 add first station tunr around

    -- get start time into v_start_time
	SELECT  START_TIME  into  v_start_time FROM TRAVEL t where train_id_ = t.TRAIN_ID ;
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

         select END_STATION_ID into next_station_id from LINE l, TRAVEl t  where t.train_id=train_id_ AND t.line_id=l.line_id;
         getDTS(v_last_STATION,next_station_id,v_delta_time);
         getETA(v_start_time,v_delta_time,v_next_stop.DURATION_TIME,v_total_time,ETA, train_status);
    -- calculate diffrence bewteen the it shoud take and curent time

    ---------------------
     --ADD if 0 set START DATE TO +23h

     -----------------

    exit;
    END IF;
    -- get next sation id
    next_station_id := v_next_stop.station_id;

    -- get time to this station
    --dbms_output.put_line( v_last_STATION ||';' || next_station_id); 


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

    /*
    declare
v_st STATION.STATION_ID%TYPE;
v_ETA INTERVAL DAY TO SECOND;
begin

	whereis(3,v_st,v_ETA);
    dbms_output.put_line(v_st); 
    dbms_output.put_line(v_ETA); 
    dbms_output.put_line( extract (hour   from v_ETA)||':'||extract (minute    from v_ETA)); 
    dbms_output.put_line(CURRENT_TIMESTAMP); 

end;*/
END;