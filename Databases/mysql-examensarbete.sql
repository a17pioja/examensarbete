drop database if exists a17piojaExamensarbete;
create database a17piojaExamensarbete;
use a17piojaExamensarbete;

create table mytable(
ID integer,
Name varchar(25),
primary key(ID)
)engine=innodb;

insert into mytable(ID, Name) values (1, "James Smith");
insert into mytable(ID, Name) values (2, "Maria Garcia");
insert into mytable(ID, Name) values (3, "Mary Smith");

Select * from mytable;