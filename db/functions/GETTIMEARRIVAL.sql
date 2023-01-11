create or replace FUNCTION getTimeArrival(
v_line  LINE_STOP.LINE_ID%type,
v_start  DELTA_TIME_STATION.START_STATION_ID%type,
v_end   DELTA_TIME_STATION.END_STATION_ID%type,
v_coef number)
RETURN NUMBER
/* donne la durée entre 2 gare distante*/
as 

v_total_time LINE_STOP.DURATION_TIME%type;

v_ETA  TRAVEL.START_TIME%type;

v_last_stop STATION.STATION_ID%type;

CURSOR c_next_stop is
     select ls.station_id, ls.duration_time from LINE_STOP ls where ls.line_id= v_line ORDER BY ORDER_STOP ASC;

v_next_stop c_next_stop%rowtype;

begin
if v_start = v_end then
return 0;
end if;

OPEN c_next_stop; -- open cursor
LOOP
    FETCH c_next_stop INTO v_next_stop ;
        IF c_next_stop%NOTFOUND THEN -- if no result 

        return null;
        END IF;
        if v_next_stop.station_id = v_start then
            exit;
        end if;
    end loop;
v_total_time := v_next_stop.duration_time;
v_last_stop := v_start;

LOOP
    FETCH c_next_stop INTO v_next_stop ;
    IF c_next_stop%NOTFOUND THEN -- if no result 

        return null;
        END IF;

    --dbms_output.put_line( v_total_time ||';' || v_next_stop.duration_time || ';' || getDTSF(v_last_stop,v_next_stop.station_id) || ';' || v_next_stop.station_id ); 
    --v_total_time := v_total_time + v_next_stop.duration_time;
    -- mouved to after the if

    v_total_time := v_total_time + getDTSF(v_last_stop,v_next_stop.station_id, v_coef);

    v_last_stop := v_next_stop.station_id;
    if v_next_stop.station_id = v_end then
            exit;
        end if;
    v_total_time := v_total_time + v_next_stop.duration_time;

END loop;
CLOSE c_next_stop;

return v_total_time;


EXCEPTION
    WHEN NO_DATA_FOUND THEN
    return null;

/*




select getTimeArrival(100801,1,6) from dual;

set SERVEROUTPUT on;
declare
v_i NUMBER;
begin 
v_i := getTimeArrival(100801,1,8);
end;
*/


end;