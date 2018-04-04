CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE Orders (
    OrderID int NOT NULL,
    OrderNumber int NOT NULL,
    PersonID int,
    PRIMARY KEY (OrderID),
    CONSTRAINT FK_PersonOrder FOREIGN KEY (PersonID)
    REFERENCES Persons(PersonID)
);

CREATE TABLE userImage (
uId int(8) PRIMARY key,
img varchar(60)
);

Create table friends (
uid1 int(8) not null,
uid2 int(8) not null,
Date timestamp,
primary key(uid1,uid2)
);

create table academicDegree (
aDid int(8) UNSIGNED AUTO_INCREMENT not null,
aDname varchar(32),
aDdescr varchar(200),
primary key(aDid)
);

create table userQualification (
uId int(11) not null,
aDid int(8) npt n,
dateRec Date,
PRIMARY(uId,aDid),
constraint fk_user Foreign key(uId) references users(uId),
constraint fk_academicDegree Foreign key(aDid) references academicDegree(aDid)
);


create table hotels (
hId int(8) UNSIGNED AUTO_INCREMENT not null,
hName varchar(32),
password varchar(32),
contactNo varchar(10),
email varchar(32) unique,
address varchar(75),
descr varchar(200),
primary key(hId)
);


create table jobHistory (
jHid int(8) UNSIGNED AUTO_INCREMENT not null,
uId int(11) UNISGNED not null,
hId int(8) UNSIGNED not null,
jName varchar(32),
fromDate Date,
toDate Date,
jHdescr varchar(200),
primary key(jHid),
constraint fk_user foreign key(uId) references users(uId),
constraint fk_hotel foreign key(hId) references hotels(hId)
)ENGINE=InnoDB;

create table skills (
sId int(8) UNISGNED AUTO_INCREMENT not null,
sTitle varchar(32),
sDescr varchar(200),
primary key(sId)
);


create table hotelMenu (
hId int(8) not null,
hMId int(8) UNSIGNED AUTO_INCREMENT not null,
hMName varchar(32),
primary key(hMId),
constraint fk_hotel foreign key(hId) references hotels(hId)
);

create table hotelDish (
hId int(8) UNSIGNED not null,
hDId int(8) UNSIGNED AUTO_INCREMENT not null,
hDname varchar(32),
hDdecr varchar(200),
hDprice int,
primary key(hDid),
foreign key(hId) references hotels(hId)
)engine = innodb;

create table hotelAwards (
hId int(8) UNISGNED not null,
hAId int(8) UNISGNED AUTO_INCREMENT not null,
hAname varchar(32),
hAdescr varchar(32),
hDprice int,
primary key(hAId),
foreign key(hId) references hotels(hId)
)engine = innodb;

create table hotelImage (
hId int(8) UNSIGNED not null,
hImg varchar(50),
primary key(hId),
foreign key(hId) references hotels(hId)
)engine=innodb;

create table vacancies(
vId int(8) UNSIGNED AUTO_INCREMENT not null,
hId int(8) UNSIGNED not null,
vName varchar(32),
vDescr varchar(200),
status varchar(32),
amount int,
primary key(vId),
foreign key(hId) references hotels(hId)
)engine = innodb;

create table skillsRequired (
vId int(8) UNSIGNED not null,
sId int(8) UNSIGNED not null,
primary key(vId,sId),
foreign key(vId) references vacancies(vId),
foreign key(sId) references skills(sId)
)engine = innodb; 

create table bannedUsers (
uId int(11) UNSIGNED not null,
dateStart timestamp,
dateEnd Date,
primary key(uId),
foreign key(uId) references users(uId)
)engine = innodb;


 