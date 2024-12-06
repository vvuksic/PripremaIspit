use adventureworkshop;

-- Dohvati sve proizvode
select * from proizvod;

-- Dohvati prvih 5 proizvoda
select * from proizvod limit 5;

-- Izbroji proizvode u svakoj potkategoriji
select PotkategorijaID, count(*) as BrojProizvoda
from proizvod
group by PotkategorijaID;

-- Izbroji ukupnu prodaju za svakog komercijalistu
select KomercijalistID, count(*) as UkupnaProdaja
from racun
group by KomercijalistID;

-- Ispiši sve gradove s imenom države
select drzava.Naziv as Drzava, grad.Naziv as Grad
from grad, drzava
where grad.DrzavaID = drzava.IDDrzava;

select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
inner join drzava
on grad.DrzavaID = drzava.IDDrzava;

select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
left join drzava
on grad.DrzavaID = drzava.IDDrzava;

-- FULL OUTER JOIN
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
left join drzava
on grad.DrzavaID = drzava.IDDrzava
union
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
right join drzava
on grad.DrzavaID = drzava.IDDrzava;

-- FULL OUTER JOIN with exclusion
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
left join drzava
on grad.DrzavaID = drzava.IDDrzava
where grad.DrzavaID is null 
union
select grad.Naziv as Grad, drzava.Naziv as Drzava
from grad
right join drzava
on grad.DrzavaID = drzava.IDDrzava
where grad.DrzavaID is null 


