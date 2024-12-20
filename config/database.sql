create database football;
use football;
create table CLUBS (
club_id INT not null  unique primary key AUTO_INCREMENT,
club_name varchar(20) ,
club_logo varchar(255)
);
create table NATIONALITIES (
nationality_id int unique primary key not null AUTO_INCREMENT,
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

INSERT INTO NATIONALITIES (country_name, flag_image)
VALUES ('Argentina', 'https://cdn.sofifa.net/flags/ar.png'),
       ('Portugal', 'https://cdn.sofifa.net/flags/pt.png'),
       ('Belgium', 'https://cdn.sofifa.net/flags/be.png');


