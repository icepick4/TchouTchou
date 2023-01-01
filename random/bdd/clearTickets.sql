create OR replace procedure clearTickets(
v_travel_id IN TRAVEL.TRAVEL_ID%type)
as

begin

	delete from  TICKET where TRAVEL_ID = v_travel_id;

end;