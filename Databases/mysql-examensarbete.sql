drop database if exists a17piojaExamensarbete;
create database a17piojaExamensarbete;
use a17piojaExamensarbete;

create table mytable(
ID int NOT NULL AUTO_INCREMENT,
Name varchar(25),
primary key(ID)
)engine=innodb;

insert into mytable(Name) values ("James Smith");
insert into mytable(Name) values ("Maria Garcia");
insert into mytable(Name) values ("Mary Smith");

Select * from mytable;

create table products(
ProductID int(12),
ProductName varchar(128),
ProductPrice float,
ProductWeight float,
ProductDesc varchar(512),
ProductCategoryID int(12),
primary key(ProductID)
)engine=innodb;