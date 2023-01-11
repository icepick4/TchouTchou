create or replace FUNCTION getEmptySeatsBetweenTwoStation (v_travel_id IN NUMBER, v_first_station_id IN NUMBER, v_last_station_id IN NUMBER )
RETURN NUMBER AS
v_capacity NUMBER := 0;
v_train_capacity NUMBER := 0;
v_check NUMBER := 0;
v_toAdd NUMBER := 0;
BEGIN
SELECT TRAIN_CAPACITY INTO v_capacity FROM TRAIN_TYPE INNER JOIN TRAIN ON TRAIN.TRAIN_TYPE_ID = TRAIN_TYPE.TRAIN_TYPE_ID INNER JOIN TRAVEL ON TRAIN.TRAIN_ID = TRAVEL.TRAIN_ID WHERE TRAVEL_ID = v_travel_id;
FOR c_stationToCheck IN (SELECT * FROM LINE_STOP WHERE LINE_ID = (SELECT LINE_ID FROM TRAVEL WHERE TRAVEL_ID = v_travel_id))
LOOP
    IF c_stationToCheck.station_id = v_last_station_id THEN
        v_check := 0;
    ELSIF v_check = 1 OR c_stationToCheck.station_id = v_first_station_id  THEN
        v_check := 1;
        SELECT COUNT(*) INTO v_toAdd FROM TICKET INNER JOIN TRAVEL ON TICKET.TRAVEL_ID = TRAVEL.TRAVEL_ID WHERE TRAVEL.TRAVEL_ID = v_travel_id AND TRAVEL.LINE_ID = (SELECT LINE_ID FROM TRAVEL WHERE TRAVEL_ID = v_travel_id) AND START_STATION_ID = c_stationToCheck.station_id;
        v_capacity := v_capacity - v_toAdd;
    END IF;
END LOOP;

RETURN v_capacity;
END;