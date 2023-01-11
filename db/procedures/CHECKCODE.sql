create or replace PROCEDURE CheckCode 
(
v_TRAVEl_ID IN TRAVEL.TRAVEL_ID%type,
ETA IN INTERVAL DAY TO second,
last_sation IN STATION.STATION_ID%type,
next_station IN STATION.STATION_ID%type,
v_new_code in NUMBER,

v_code OUT NUMBER,
v_late OUT TRAVEL.LATE_TIME%type
) AS 

v_old_code Number ;
v_res Number;
v_train_id TRAIN.TRAIN_ID%type;
v_turn_around LINE_STOP.DURATION_TIME%type;
BEGIN
v_code:= v_new_code;
v_late:= 0;
select CODE into v_old_code from TRAIN_ETA t WHERE t.TRAVEL_ID = v_TRAVEL_ID;

select TRAIN_ID into v_train_id from TRAVEL t WHERE t.TRAVEL_ID = v_TRAVEL_ID;



IF v_new_code = 1 then
   dbms_output.put_line('[CheckCode] new code vs old '||v_new_code||';'||v_old_code||';');

    dbms_output.put_line('[CheckCode] code = 1 so check if ETA '|| ETA ||' < '|| (CURRENT_TIMESTAMP-(CURRENT_TIMESTAMP -(1/1440)*(10)) ));
    IF ETA  < interval '10' minute then --(CURRENT_TIMESTAMP-(CURRENT_TIMESTAMP -(1/1440)*(10)) ) then
        dbms_output.put_line('[CheckCode] yes ');
        dbms_output.put_line('[CheckCode] code is 1 station'||next_station||' train '|| v_train_id);
        v_res := getPlatform(next_station,v_train_id);
        IF v_res = 1 then
            dbms_output.put_line('[CheckCode]1 a platofrom is free '||v_code||';'||v_res||';');
            v_code := 5;
        ELSE
            dbms_output.put_line('[CheckCode]1 no platofrom free '||v_code||';'||v_res||';');
            v_code := 4;
            END IF;
    END IF;

ELSIF v_new_code = 2  then
    dbms_output.put_line('[CheckCode] code is 2; station '||next_station||' train '|| v_train_id);
    v_res := getPlatform(next_station,v_train_id);
    IF v_res = 1 then

        v_code := 5;
         dbms_output.put_line('[CheckCode] a platofrom is free 2;');
    ELSE

        v_code := 4;
         dbms_output.put_line('[CheckCode]2 no platofrom free '||v_code||';');
    END IF;
    IF v_old_code = 5 OR v_code = 5 THEN 
        v_code := 2;
        Update PLATFORM SET PLATFORM_UTILISATION=1 WHERE STATION_ID = next_station AND PLATFORM_USER= v_train_id;

    ELSE
        v_code := 4;
        select DURATION_TIME into v_turn_around FROM LINE_STOP ls, TRAVEL t 
        where t.TRAVEL_ID = v_TRAVEl_ID AND ls.STATION_ID= next_station AND ls.LINE_ID=t.LINE_ID;
        v_late:= v_turn_around -  extract (minute   from ETA); -- add late time from WHAT ETA calculated
    END IF;
END IF;

if v_new_code <> v_code then
    dbms_output.put_line('[CheckCode] end code '||v_code||';');
end if;

END;