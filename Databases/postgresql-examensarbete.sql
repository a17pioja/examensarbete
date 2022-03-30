DROP TABLE IF EXISTS mytable;
DROP TABLE IF EXISTS mytable;

CREATE TABLE mytable(
ID SERIAL PRIMARY KEY,
Name varchar(25)
);

insert into mytable(Name) values ('James Smith');
insert into mytable(Name) values ('Maria Garcia');
insert into mytable(Name) values ('Mary Smith');

SELECT * FROM mytable;
