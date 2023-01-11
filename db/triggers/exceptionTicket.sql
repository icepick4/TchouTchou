CREATE OR REPLACE TRIGGER exceptionTicket
AFTER INSERT ON TICKET
FOR EACH ROW
--prevent having negative tickets for a travel
DECLARE 
    v_nb_tickets number(10);
BEGIN
    SELECT INTO v_nb_tickets COUNT(*) FROM TICKET WHERE TRAVEL_ID = :NEW.TRAVEL_ID;
    IF v_nb_tickets < 0 THEN
        RAISE_APPLICATION_ERROR(-20001, 'You cannot have negative tickets for a travel');
    END IF;
END;