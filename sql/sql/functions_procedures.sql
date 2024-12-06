use adventureworkshop;

-- Functions
delimiter $$
create function BrojKupaca()
returns int
deterministic
begin
	declare brojKupaca int;
	select count(*) into brojKupaca from kupac;
    return brojKupaca;
end $$
delimiter ;

select BrojKupaca();

delimiter $$
create function DrugiNajprodavanijiProizvod()
returns int
deterministic
begin
	declare volumenProdaje int;
	select sum(st1.Kolicina) into volumenProdaje
		from stavka as st1
	group by st1.ProizvodID
	order by sum(st1.Kolicina) desc limit 1,1;
    return volumenProdaje;
end $$
delimiter ;

select sum(st.Kolicina) - DrugiNajprodavanijiProizvod() as Razlika
from stavka as st
group by st.ProizvodID
order by sum(st.Kolicina) desc limit 1;

delimiter $$
create function BrojKupacaPoGradu(GradID int)
returns int
deterministic
begin
	declare brojKupaca int;
		select count(*) into brojKupaca 
			from kupac 
			where kupac.GradID = GradID;
    return brojKupaca;
end $$
delimiter ;

select BrojKupacaPoGradu(222);


-- Procedures
delimiter $$
create procedure DodajKreditnuKarticu(
	in Tip varchar(50),
	in Broj varchar(25),
	in IstekMjescec tinyint,
	in IstekGodina int
)
begin
	if length(Broj) = 16 then
		insert into kreditnakartica 
        (Tip, Broj, IstekMjescec, IstekGodina) values
        (Tip, Broj, IstekMjescec, IstekGodina);
	else
		signal sqlstate '45000'  
        set message_text = 'Broj kreditne kartice mora imati točno 16 znakova';
	end if;
end $$
delimiter ;



