DROP TABLE IF EXISTS mytable;
DROP TABLE IF EXISTS mytable;

CREATE TABLE mytable(
ID integer PRIMARY KEY,
Name varchar(25)
);

insert into mytable(ID, Name) values (1, 'James Smith');
insert into mytable(ID, Name) values (2, 'Maria Garcia');
insert into mytable(ID, Name) values (3, 'Mary Smith');

SELECT * FROM mytable;
