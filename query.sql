CREATE database if not exists provap1;


use provap1;
create table barcos (
	id int auto_increment primary key,
    bar_modelo varchar(30),
    bar_fabricante varchar(15),
    bar_opcionais varchar(30),
    bar_cor varchar(15)
);