use adventureworkshop;
select * from proizvod limit 5;

select potkategorijaID as cat, count(*) as BrojProizvoda
from proizvod group by potkategorijaID;

-- Izbroji ukupnu prodaju za svakog komercijalistu
select komercijalistID, count(*) as UkupnaProdaja
from racun group by komercijalistID;


-- Ipiši sve gradove s nazivom države
select drzava.naziv as Drzava, grad.Naziv as Grad from grad, drzava
where grad.DrzavaID=drzava.IDDrzava;

select grad.Naziv as Grad, drzava.naziv as Drzava from grad
inner join drzava
on grad.DrzavaID=drzava.IDDrzava;

select grad.Naziv as Grad, drzava.naziv as Drzava from grad
left join drzava
on grad.DrzavaID=drzava.IDDrzava;

-- full outer join
select grad.Naziv as Grad, drzava.naziv as Drzava from grad
left join drzava
on grad.DrzavaID=drzava.IDDrzava
union
select grad.Naziv as Grad, drzava.naziv as Drzava from grad
right join drzava
on grad.DrzavaID=drzava.IDDrzava;

-- full outer join with exclusion
select grad.Naziv as Grad, drzava.naziv as Drzava 
from grad
left join drzava
on grad.DrzavaID=drzava.IDDrzava
where grad.drzavaid is null
union
select grad.Naziv as grad, drzava.naziv as Drzava from grad
right join drzava
on grad.DrzavaID=drzava.IDDrzava
where grad.DrzavaID is null
