create or replace PROCEDURE checkDeparture 
(
v_TRAVEl_ID IN TRAVEL.TRAVEL_ID%type,
last_sation IN STATION.STATION_ID%type,
v_new_code in NUMBER
) AS 

v_old_code Number ;
v_res Number;
v_train_id TRAIN.TRAIN_ID%type;
BEGIN
select CODE into v_old_code from TRAIN_ETA t WHERE t.TRAVEL_ID = v_TRAVEL_ID;

select TRAIN_ID into v_train_id from TRAVEL t WHERE t.TRAVEL_ID = v_TRAVEL_ID;
--dbms_output.put_line('[CheckCode] new code vs old '||v_new_code||';'||v_old_code||';');


-- remove from platform

 IF v_old_code = 2 and  v_new_code <> 2 THEN

        v_res := popPlatform(last_sation,v_train_id);

        dbms_output.put_line('[CheckCode] remove from platfrom succes='||v_res||'; station='||last_sation||'; train='||v_train_id||';');
        dbms_output.put_line('[CheckCode] old code'||v_old_code||'; new code='||v_new_code);
    end if;
end;