CREATE DATABASE IF NOT EXISTS qrcamdb;

use  qrcamdb;

CREATE table if not exists users (
id varchar(12) PRIMARY key not null,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
stall VARCHAR(100) not null,
tel int not null,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
pass VARCHAR(25));

create table if not exists reg(
id int primary key auto_increment,
userfk varchar(12),
enter_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
exit_time TIMESTAMP NULL DEFAULT NULL, FOREIGN KEY (userfk) REFERENCES users(id));
