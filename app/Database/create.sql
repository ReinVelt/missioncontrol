drop database r31n;
create database r31n;
USE r31n;

CREATE TABLE USERS (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nick varchar(32),
    email varchar(64),
    hash varchar(255)
);
INSERT INTO USERS (id,nick,email,hash) values (NULL,'Rein','rein.velt@gmail.com','secret');
INSERT INTO USERS (id,nick,email,hash) values (NULL,'Piet','piet@gmail.com','1sdfdsfdffs');


CREATE TABLE MISSION(
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(32) NOT NULL,
    description varchar(255) NOT NULL,
    data TEXT,
    start DATETIME,
    end datetime,
    finished boolean
);
INSERT INTO MISSION VALUES (NULL,'Test mission to Tikbuktu','test','data',NULL,NULL,NULL);


CREATE TABLE MISSION_TARGETS(
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    missionId int(11) unsigned NOT NULL,
    name varchar(32) NOT NULL,
    description varchar(255) NOT NULL,
    latitude double(12,8) NOT NULL,
    longitude double(12,8) NOT NULL,
    datum datetime NOT NULL,
    finished boolean
);



CREATE TABLE MISSION_PARTICIPANTS(
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    missionRole int unsigned NOT NULL,
    missionId int(11) unsigned NOT NULL,
    userId int(11) unsigned NOT NULL
);

CREATE TABLE MISSION_ROLES (
     id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
     name varchar(32)
);



CREATE TABLE GPSLOG (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userId int(11) unsigned NOT NULL,
    missionId int(11) unsigned NOT NULL,
    name varchar(32),
    description text,
    latitude double(12,8),
    longitude double(12,8),
    altitude int(11),
    speed int,
    heading int,
    datum datetime NOT NULL 
);

CREATE TABLE LOGBOOK(
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userId int(11) unsigned NOT NULL,
    missionId int(11) unsigned NOT NULL,
    coordinate POINT NOT NULL,
    datum datetime NOT NULL,
    data TEXT
);

CREATE TABLE MEDIA (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userId int(11) unsigned NOT NULL,
    missionId int(11) unsigned NOT NULL,
    latitude double(12,8),
    longitude double(12,8),
    name varchar(32) NOT NULL,
    description varchar(32),
    mimetype varchar(64) NOT NULL,
    filesize int(11) unsigned NOT NULL,
    uri varchar(255) NOT NULL,
    datum datetime NOT NULL
);

CREATE USER 'r31n'@'%' IDENTIFIED BY 'password';
GRANT ALL ON r31n.* to 'r31n'@'%';
FLUSH PRIVILEGES;



