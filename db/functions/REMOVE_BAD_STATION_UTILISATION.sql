create or replace FUNCTION REMOVE_BAD_STATION_UTILISATION
return NUMBER
AS 
BEGIN
UPDATE TCHOU.PLATFORM 
SET PLATFORM_UTILISATION = 0,
PLATFORM_USER = NULL
WHERE PLATFORM_USER NOT IN (SELECT t.TRAIN_ID  FROM TCHOU.TRAIN_ETA te, TCHOU.TRAVEL t
WHERE te.TRAVEL_ID = t.TRAVEL_ID AND te.CODE =2  );

RETURN 1;

END;