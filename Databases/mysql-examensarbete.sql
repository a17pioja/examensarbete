drop database if exists a17piojaExamensarbete;
create database a17piojaExamensarbete;
use a17piojaExamensarbete;

create table mytable(
ID integer,
Name varchar(25),
primary key(ID)
)engine=innodb;


use a17piojaExamensarbete;
insert into mytable(ID, Name) values (1, "John");

Select * from mytable;

