create or replace PROCEDURE updateTrainETA
AS
CURSOR c_next_trip is
     select TRAVEl_ID from  TRAVEl t  ORDER BY TRAVEl_ID ASC;

v_next_trip c_next_trip%rowtype;
v_st STATION.STATION_ID%TYPE;
v_ETA INTERVAL DAY TO SECOND;
v_code NUMBER;
v_existe NUMBER;
begin
    
    dbms_output.put_line('[TIME= '||CURRENT_TIMESTAMP||']');

    OPEN c_next_trip; -- open cursor
    LOOP
        FETCH c_next_trip INTO v_next_trip ;
    
        IF c_next_trip%NOTFOUND THEN
            exit;
        end if;
        --dbms_output.put_line('[TRAVEL ID='|| v_next_trip.TRAVEl_ID || ' ]'); 
    
        whereis(v_next_trip.TRAVEl_ID,v_st,v_ETA,v_code);
    
        select count(TRAVEL_ID) into v_existe FROM TRAIN_ETA where TRAVEL_ID = v_next_trip.TRAVEl_ID;
        IF v_existe = 0 THEN
            --dbms_output.put_line( '[updateTrainETA] Insert'); 
            insert into TRAIN_ETA VALUES (v_next_trip.TRAVEl_ID, v_st, v_ETA, v_code);
        ELSE
            UPDATE TRAIN_ETA SET TO_SATION = v_st, ETA = v_ETA, CODE= v_code where TRAVEL_ID = v_next_trip.TRAVEl_ID;
            --dbms_output.put_line( '[updateTrainETA] update'); 
        END IF;

     END LOOP;

    CLOSE c_next_trip;


end;