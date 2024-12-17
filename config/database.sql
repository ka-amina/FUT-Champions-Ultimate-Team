create database football;
use football;
create table CLUBS (
club_id INT not null  unique primary key AUTO_INCREMENT,
club_name varchar(20) ,
club_logo varchar(255)
);
create table NATIONALITIES (
nationality_id varchar(3) unique primary key not null AUTO_INCREMENT,
country_name varchar(10) ,
flag_image varchar(255)
);
create table PLAYERS(
player_id INT  not null primary key AUTO_INCREMENT,
name varchar(20) ,
photo varchar(255),
club_id INT ,
nationality_id varchar(3),
position_name enum('GK','ST','RW','LW','CM','LB','CB','RB'),
rating int not null,
is_deleted tinyint(1),
foreign key (club_id) references clubs(club_id),
foreign key (nationality_id) references NATIONALITIES(nationality_id)
);
create table OUTFIELD_PLAYERS (
player_id INT not null primary key,
pace int not null,
shooting int not null,
passing int not null,
driblling int not null,
defending int not null,
physical int not null,
foreign key (player_id) references players (player_id)
);
create table GOALKEEPERS (
player_id INT not null primary key,
diving int not null,
handling int not null,
kicking int not null,
refelexes int not null,
speed int not null,
positioning int not null,
foreign key (player_id) references players (player_id)
);

-- insert data on tables

INSERT INTO CLUBS (club_name, club_logo) 
VALUES ('Inter Miami', 'https://cdn.sofifa.net/meta/team/239235/120.png'),
       ('Al Nassr', 'https://cdn.sofifa.net/meta/team/2506/120.png'),
       ('Manchester City', 'https://cdn.sofifa.net/players/239/085/25_120.png');
INSERT INTO NATIONALITIES (country_name, flag_image)
VALUES ('Argentina', 'https://cdn.sofifa.net/flags/ar.png'),
       ('Portugal', 'https://cdn.sofifa.net/flags/pt.png'),
       ('Belgium', 'https://cdn.sofifa.net/flags/be.png');
INSERT INTO PLAYERS (name, photo, club_id, nationality_id, position_name, rating, is_deleted)
VALUES ('David De Gea', 'degea_photo.png', 1, 1, 'GK', 85, 0),
       ('Sergio Ramos', 'ramos_photo.png', 2, 2, 'CB', 87, 0),
       ('Lionel Messi', 'messi_photo.png', 3, 3, 'RW', 95, 0); 
INSERT INTO OUTFIELD_PLAYERS 
VALUES (2, 80, 85, 90, 87, 75, 88),  
       (3, 95, 92, 88, 96, 65, 82); 
INSERT INTO GOALKEEPERS (player_id, diving, handling, kicking, refelexes, speed, positioning)
VALUES (1, 90, 85, 80, 87, 70, 85);  


