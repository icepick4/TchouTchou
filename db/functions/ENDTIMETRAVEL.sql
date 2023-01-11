create or replace FUNCTION ENDTIMETRAVEL (line_id IN NUMBER )
RETURN NUMBER IS v_sum NUMBER := 0;
v_result NUMBER;
v_timeToAdd NUMBEr;
BEGIN   
FOR v_stop IN (SELECT * FROM LINE_STOP WHERE LINE_ID = line_id AND ORDER_STOP != (SELECT MAX(ORDER_STOP) FROM LINE_STOP WHERE LINE_ID = line_id)) 
LOOP
    SELECT COUNT(*) INTO v_result FROM DELTA_TIME_STATION 
            WHERE START_STATION_ID = v_stop.STATION_ID 
            AND END_STATIOn_ID = 
            (
                SELECT STATION_ID FROM LINE_STOP 
                WHERE LINE_ID = line_id 
                AND ORDER_STOP = v_stop.order_stop +1 
            );
    IF ( v_result > 0) 
    THEN
    SELECT DELTA_TIME INTO v_timeToAdd FROM DELTA_TIME_STATION 
                    WHERE START_STATION_ID = v_stop.STATION_ID 
                    AND END_STATIOn_ID = (
                                            SELECT STATION_ID FROM LINE_STOP 
                                            WHERE LINE_ID = line_id 
                                            AND ORDER_STOP = v_stop.order_stop +1
                                        )
                    ;
    ELSE
    SELECT DELTA_TIME INTO v_timeToAdd FROM DELTA_TIME_STATION 
                    WHERE END_STATION_ID = v_stop.STATION_ID 
                    AND START_STATION_ID = (
                                            SELECT STATION_ID FROM LINE_STOP 
                                            WHERE LINE_ID = line_id 
                                            AND ORDER_STOP = v_stop.order_stop +1
                                            );

    END IF;
    v_sum := v_sum + v_timeToAdd;
    v_result := 0;
END LOOP;
RETURN (v_sum);
END;