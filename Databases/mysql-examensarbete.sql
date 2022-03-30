drop database if exists a17piojaExamensarbete;
create database a17piojaExamensarbete;
use a17piojaExamensarbete;

create table customers(
CustomerID int NOT NULL AUTO_INCREMENT,
CustomerFirstName varchar(32),
CustomerLastName varchar(32),
CustomerCity varchar(32),
CustomerCountry varchar(32),
CustomerAddress varchar(64),
primary key(CustomerID)
)engine=innodb;

create table products(
ProductID int NOT NULL AUTO_INCREMENT,
ProductName varchar(128),
ProductPrice float,
ProductLocation varchar(32),
ProductDesc varchar(512),
ProductDate datetime,
primary key(ProductID)
)engine=innodb;

create table orders(
OrderID int NOT NULL AUTO_INCREMENT,
OrderUserID int NOT NULL,
OrderProductID int NOT NULL,
OrderName varchar(32),
foreign key (OrderUserID) references customers(CustomerID),
foreign key (OrderProductID) references Products(ProductID),
primary key(OrderID)
)engine=innodb;

insert into Customers(CustomerFirstName, CustomerLastName, CustomerCity, CustomerCountry, CustomerAddress) values ('Test', 'Testsson', 'Texas','USA', 'West St 1901');
select * from customers;