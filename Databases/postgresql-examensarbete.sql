DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS products;

CREATE TABLE customers(
CustomerID SERIAL PRIMARY KEY,
CustomerFirstName varchar(32),
CustomerLastName varchar(32),
CustomerCity varchar(32),
CustomerCountry varchar(32),
CustomerAddress varchar(64)
);

create table products(
ProductID SERIAL PRIMARY KEY,
ProductName varchar(128),
ProductPrice float,
ProductLocation varchar(32),
ProductDate timestamp
);

create table orders(
OrderID SERIAL PRIMARY KEY,
OrderUserID int NOT NULL,
OrderProductID int NOT NULL,
OrderName varchar(32),
foreign key (OrderUserID) references customers(CustomerID),
foreign key (OrderProductID) references Products(ProductID)
);

insert into products(ProductName, ProductPrice, ProductLocation,ProductDate) values ('Testband', 100, 'Stockholm', '2022-05-25 10:30:10');
insert into Customers(CustomerFirstName, CustomerLastName, CustomerCity, CustomerCountry, CustomerAddress) values ('Test', 'Testsson', 'Texas','USA', 'West St 1901');
insert into orders(orderuserid, orderproductid, ordername) values (1, 1, 'testorder');

select * from customers;
select * from products;
select * from orders;
