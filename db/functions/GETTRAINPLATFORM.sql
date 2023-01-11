create or replace function getTrainPlatoform(
v_TRAIN_ID TRAIN.TRAIN_ID%type,
v_STATION_ID STATION.STATION_ID%type)
return VARCHAR2 as
v_res VARCHAR2(1 BYTE) := null;
begin

SELECT PLATFORM_LETTER into v_res FROM PLATFORM 
WHERE PLATFORM_USER  = v_TRAIN_ID
AND STATION_ID = v_STATION_ID;
return v_res;
end;