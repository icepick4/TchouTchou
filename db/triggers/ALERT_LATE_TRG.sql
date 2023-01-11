create or replace TRIGGER ALERT_LATE_TRG
AFTER INSERT ON ALERT
FOR EACH ROW
DECLARE
v_late NUMBER;
v_alert_late NUMBER;
BEGIN
    SELECT LATE_TIME INTO v_late FROM TRAVEL WHERE TRAVEL_ID = :new.travel_id;
    SELECT ALERT_TYPE_TIME INTO v_alert_late FROM ALERT_TYPE WHERE alert_type_id = :new.alert_type_id;
    IF (v_late IS NOT NULL) THEN
        UPDATE TRAVEL SET LATE_TIME = LATE_TIME+v_alert_late WHERE TRAVEL_ID = :new.travel_id;
    ELSE
        UPDATE TRAVEL SET LATE_TIME = v_alert_late WHERE TRAVEL_ID = :new.travel_id;
    END IF;
END;