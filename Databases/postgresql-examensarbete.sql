DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS products;

CREATE TABLE customers(
customerid SERIAL PRIMARY KEY,
customerfirstname varchar(32),
customerlastname varchar(32),
customercity varchar(32),
customercountry varchar(32),
customeraddress varchar(64)
);
create table products(
productid SERIAL PRIMARY KEY,
productname varchar(128),
productprice float,
productlocation varchar(32),
productdate timestamp
);

create table orders(
orderid SERIAL PRIMARY KEY,
orderuserid int NOT NULL,
orderproductid int NOT NULL,
ordername varchar(32),
foreign key (orderuserid) references customers(customerid),
foreign key (orderproductid) references Products(productid)
);

insert into products(ProductName, productprice, productlocation,productdate) values ('Testband', 100, 'Stockholm', '2022-05-25 10:30:10');
insert into Customers(customerfirstname, customerlastname, customercity, customercountry, customeraddress) values ('Test', 'Testsson', 'Texas','USA', 'West St 1901');
insert into orders(orderuserid, orderproductid, ordername) values (1, 1, 'testorder');

select * from customers;
select * from products;
select * from orders;

 