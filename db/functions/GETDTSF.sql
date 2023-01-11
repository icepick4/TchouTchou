create or replace FUNCTION getDTSF(
v_start  DELTA_TIME_STATION.START_STATION_ID%type,
v_end   DELTA_TIME_STATION.END_STATION_ID%type,
v_coef number)
RETURN NUMBER
/* donne la durée entre 2 gare*/
as 
v_ETA  DELTA_TIME_STATION.DELTA_TIME%type;
begin
select DELTA_TIME into v_ETA from DELTA_TIME_STATION where (START_STATION_ID = v_start AND 
    END_STATION_ID = v_end) OR (START_STATION_ID =  v_end AND 
    END_STATION_ID = v_start);
    return v_ETA * v_coef;
end;