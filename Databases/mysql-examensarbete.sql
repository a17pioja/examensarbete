drop database if exists a17piojaExamensarbete;
create database a17piojaExamensarbete;
use a17piojaExamensarbete;

create table customers(
customerid int NOT NULL AUTO_INCREMENT,
customerfirstname varchar(32),
customerlastname varchar(32),
customercity varchar(32),
customercountry varchar(32),
customeraddress varchar(64),
primary key(customerid)
)engine=innodb;

create table products(
productid int NOT NULL AUTO_INCREMENT,
productname varchar(128),
productprice float,
productlocation varchar(32),
productdate datetime,
primary key(productid)
)engine=innodb;

create table orders(
orderid int NOT NULL AUTO_INCREMENT,
orderuserid int NOT NULL,
orderproductid int NOT NULL,
ordername varchar(32),
foreign key (orderuserid) references customers(customerid),
foreign key (orderproductid) references Products(productid),
primary key(orderid)
)engine=innodb;

insert into products(productname, productprice, productlocation,productdate) values ("Testband", 100, "Stockholm", "2022-05-25 10:30:10");
insert into Customers(customerfirstname, customerlastname, customercity, customercountry, customeraddress) values ('Test', 'Testsson', 'Texas','USA', 'West St 1901');
insert into orders(orderuserid, orderproductid, ordername) values (1, 1, "testorder");

select * from customers;
select * from products;
select * from orders;

SELECT COUNT(*) FROM products 