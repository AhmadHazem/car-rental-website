CREATE DATABASE car_rental_agency;

CREATE TABLE `user` (
    SSN varchar(255) not null PRIMARY KEY,
    fname varchar(255) not null, 
    lname varchar(255) not null, 
    email varchar(255) not null, 
    phone varchar(255) not null, 
    nationailty varchar(255) not null,
    `password` varchar(255) not null, 
    birthdate date not null,
    isadmin BIT not null,
    gender varchar(255) not null
     );

CREATE TABLE `reservation` (
    reservationID int not null AUTO_INCREMENT PRIMARY KEY,
    reservationDate date not null,
    PickupDate date not null,
    ReturnDate date not null,
    SSN varchar(255) not null,
    Payment float not null,
    plateID int not null
    );

CREATE TABLE Car (
    plateID int not null PRIMARY KEY,
    model varchar(255) not null,
    color varchar(255) not null,
    manufacturer varchar(255) not null,
    `modelYear` varchar(255) not null,
    priceperday float not null,
    automatic bit not null,
    imglink varchar(1024) not null,
    state varchar(255) not null,
    branchID varchar(255) not null
    );

CREATE TABLE branch (
    branchID varchar(255) not null PRIMARY KEY,
    Country varchar(255) not null,
    City varchar(255) not null
    );

CREATE TABLE outofService (
    start date not null,
    end date not null,
    plateID int not null
    );


ALTER TABLE reservation
ADD FOREIGN KEY (SSN) REFERENCES `user`(SSN);

ALTER TABLE reservation
ADD FOREIGN KEY (plateID) REFERENCES car(plateID);

ALTER TABLE car
ADD FOREIGN KEY (branchID) REFERENCES branch(branchID);

ALTER TABLE outofservice
ADD FOREIGN KEY (plateID) REFERENCES car(plateID);