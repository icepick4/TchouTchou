create or replace FUNCTION getWAgon(
v_train  IN NUMBER,
v_place  IN NUMBER)
RETURN NUMBER
/* donne la durée entre 2 gare*/
as 
v_capacity NUMBER := 0;
v_capacity_wagon NUMBER := 0;
v_wagon_number NUMBER := 0;
begin
select TRAIN_CAPACITY into v_capacity from train inner join train_type on train.train_type_id = train_type.train_type_id where train_id = v_train;
v_capacity_wagon := v_capacity/8;
for i in 0..8
LOOP
    if (v_place between v_capacity_wagon*i-1 AND v_capacity_wagon*(i)) then
        v_wagon_number := i;
        return v_wagon_number;
    end if;
end loop;
end;