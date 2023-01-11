create or replace TRIGGER exceptionTicket
BEFORE INSERT ON Tchou.TICKET
FOR EACH ROW
--prevent having negative tickets for a travel
DECLARE 
    v_nb_tickets number(10);
BEGIN
    SELECT COUNT(*) INTO v_nb_tickets  FROM Tchou.TICKET WHERE TRAVEL_ID = :new.TRAVEL_ID;
    IF v_nb_tickets < 0 THEN
        RAISE_APPLICATION_ERROR(-20001, 'You cannot have negative tickets for a travel');
    END IF;
END;