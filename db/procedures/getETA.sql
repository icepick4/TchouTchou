create or replace PROCEDURE       getETA(
v_start_time IN TRAVEL.START_TIME%type,
v_delta_time IN DELTA_TIME_STATION.DELTA_TIME%type,
v_stop_duration IN LINE_STOP.DURATION_TIME%type,
v_total_time IN LINE_STOP.DURATION_TIME%type,
ETA OUT INTERVAL DAY TO second,

train_status OUT NUMBER)
AS
/* donne la procahine gare avec le temps d'arré et le code status*/
ETA_tmp INTERVAL DAY TO second;
BEGIN 
train_status := 0;
ETA := (v_start_time + (1/1440)*(v_delta_time+v_total_time))- CURRENT_TIMESTAMP;    
IF  ETA >  CURRENT_TIMESTAMP-CURRENT_TIMESTAMP then -- travel not finish
        train_status := 1; -- set to 'in movment'

        
    --END IF;
else
    dbms_output.put_line( '[GETETA] not 1 beacause 00:00>'||ETA ); 
    end if;
    -- calaculate time need with in station time
ETA_tmp := (v_start_time + (1/1440)*(v_delta_time+v_stop_duration+v_total_time))- CURRENT_TIMESTAMP;
IF  ETA_tmp >  CURRENT_TIMESTAMP-CURRENT_TIMESTAMP  AND train_status <> 1 then
    ETA := ETA_tmp;
    dbms_output.put_line( '[GETETA] code is now 2 beacause 00:00<'||ETA ); 
        train_status := 2; -- set status to stop in station
    END IF;
IF v_start_time - CURRENT_TIMESTAMP >  v_start_time- v_start_time then
train_status:=3;
end IF;


END;