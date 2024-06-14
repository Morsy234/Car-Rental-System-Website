DROP DATABASE `Car_Rental_System`;
CREATE DATABASE `Car_Rental_System`;
USE `Car_Rental_System`;

CREATE TABLE cars(
    car_id int auto_increment PRIMARY KEY,
    model varchar(255) NOT NULL,
    plate_no varchar(8) NOT NULL UNIQUE,
    color varchar(25) NOT NULL,
    year int NOT NULL,
    miles float NOT NULL,
    price_per_day DECIMAL(10,2),
    date timestamp NOT NULL,
    office_id int NOT NULL,
    image varchar(255) NOT NULL,
    status_id int NOT NULL DEFAULT 1,
    is_rented boolean DEFAULT false
);
CREATE TABLE `status`(
     status_id int auto_increment PRIMARY KEY,
    status_name varchar(100) NOT NULL
);
    
CREATE TABLE customers (
    customer_id int auto_increment PRIMARY KEY,
    fname varchar(255) NOT NULL,
    lname varchar(255) NOT NULL,
    email varchar(255) NOT NULL UNIQUE,
    `password` varchar(255) NOT NULL,
    address varchar(255) NOT NULL,
    phone varchar(12) NOT NULL UNIQUE,
    wallet DECIMAL(10, 2)
);
CREATE TABLE reservations(
    reserve_no int auto_increment PRIMARY KEY, 
    customer_id int NOT NULL,
    car_id int NOT NULL,
    startD DATE NOT NULL,
    endD DATE NOT NULL,
    res_date timestamp DEFAULT current_timestamp() NOT NULL,
    cost decimal(10,2) NOT NULL
);

CREATE TABLE admins(
    email varchar(255) NOT NULL PRIMARY KEY,
    `password` varchar(255) NOT NULL
);
CREATE TABLE offices(
    office_id int auto_increment NOT NULL PRIMARY KEY, 
    city varchar(50) NOT NULL,
    country varchar(50) NOT NULL,
    name varchar(255) NOT NULL
);

ALTER TABLE reservations ADD FOREIGN KEY (car_id) 
REFERENCES cars(car_id);

ALTER TABLE reservations ADD FOREIGN KEY (customer_id) 
REFERENCES customers(customer_id);

ALTER TABLE cars ADD FOREIGN KEY (office_id) 
REFERENCES offices(office_id) ON DELETE CASCADE;

ALTER TABLE `cars` ADD FOREIGN KEY (status_id) 
REFERENCES status(status_id);


INSERT INTO `status` (status_name) VALUES 
    ('Active'),
    ('Out of Service'),
    ('Rented');

INSERT INTO admins (email, password)
VALUES ('admin@example.com', '1');