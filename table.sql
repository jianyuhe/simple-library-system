create table categories(
category varchar(3) primary key,
categoryDescription varchar(20)
);
create table books(
ISBN varchar(20) primary key,
bookTitle varchar(50),
author varchar(20),
edition int(5),
year int(4),
category varchar(3),
rese char(1),
index (ISBN),
foreign key (category) references categories(category)
);


create table users(
userName varchar(50) primary key not null unique,
Password varchar(6) not null,
FirstName varchar(10) not null,
Surname varchar(10) not null,
AddressLine1 varchar(20),
AddressLine2 varchar(20),
City varchar(20),
Telephone int(20),
Mobile int(10)
);
create table reservations(
ISBN varchar(20),
userName varchar(50),
reservedDate varchar(20),
foreign key (ISBN) references books(ISBN),
foreign key (userName) references users(userName)
);

insert into categories (category,categoryDescription) values 
(001, 'Health');

insert into categories (category,categoryDescription) values 
(002, 'Business');

insert into categories (category,categoryDescription) values 
(003, 'Biography');

insert into categories (category,categoryDescription) values 
(004, 'Technology');

insert into categories (category,categoryDescription) values 
(005, 'Travel');

insert into categories (category,categoryDescription) values 
(006, 'Self-Help');

insert into categories (category,categoryDescription) values 
(007, 'Cookery');

insert into categories (category,categoryDescription) values 
(008, 'Fiction');


insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('093-403992', 'Computers in Business', 'Alicia Oneill', 3, 1997, 003, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('23472-8729', 'Exploring Peru', 'Stephanie Birch', 2, 2005, 005, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('237-34823', 'Business Strategy', 'Joe Peppard', 2, 2002, 002, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('23u8-923849', 'A guide to nutrition', 'John Thorpe', 2, 1997, 001, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('2983=3494', 'Cooking for children', 'Anabelle Sharpe', 1, 2003, 007, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('82n2-308', 'computer for idiots', 'Susan ONell', 5, 1998, 004, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('9823-23984', 'My life in pictur4e', 'Kevin Graham', 8, 2004, 001, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('9823-2403-0', 'Davinci Code', 'Dan Brown', 1, 2003, 008, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('9823-98345', 'How to cook Italian food', 'Jamie Oliver', 2, 2005, 007, 'Y');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('9823-98487', 'Optimising your business', 'Cleo Blair', 1, 2001, 002, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('98234-029384', 'My ranch in Texas', 'George Bush', 1, 2005, 001, 'Y');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('988745-234', 'Tara Road', 'Meave Binchy', 4, 2002, 008, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('993-004-00', 'My life in bits', 'John Smith', 1, 2001, 001, 'N');
insert into books (ISBN, bookTitle, author, edition, year, category, rese) values 
('9987-0039882', 'Shooting History', 'Jon Snow', 1, 2003, 001, 'N');

insert into users (userName,Password,FirstName,Surname,AddressLine1,AddressLine2,City,Telephone,Mobile) values 
('alanjmckenna', 't1234s','Alan','Mckenna','38 Cranley Road' ,'Fairview','Dublin',9998377,856625567);
insert into users (userName,Password,FirstName,Surname,AddressLine1,AddressLine2,City,Telephone,Mobile) values 
('joecrotty', 'kj7899','Joseph','Crotty','Apt 5 Clyde Road','Donnybrook','Dublin',8887889,876654456);
insert into users (userName,Password,FirstName,Surname,AddressLine1,AddressLine2,City,Telephone,Mobile) values 
('tommy100', '12345','tom','behan','14 hyde road','dalkey','Dublin',9983747,876738782);


insert into reservations (ISBN,userName,reservedDate)
values ('98234-029384','joecrotty','11-Oct-2008');
insert into reservations (ISBN,userName,reservedDate)
values ('9823-98345','tommy100','11-Oct-2008');
