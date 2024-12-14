create database football;
use football;
create table club (
club_id varchar(10) not null  unique primary key,
club_name varchar(20) ,
club_logo varchar(20)
);
create table nationality (
nationality_id varchar(10) unique primary key not null,
country_name varchar(10) ,
flag_image varchar(255)
);
create table player_position(
position_id varchar(10) not null primary key,
position_name enum('GK','ST','RW','LW','CM','LB','CB','RB'),
position_category varchar(50)
);
create table players(
player_id varchar(20) not null primary key,
name varchar(20) ,
photo varchar(255),
club_id varchar(10),
nationality_id varchar(10),
position_id varchar(10),
rating int not null,
foreign key (club_id) references club(club_id),
foreign key (nationality_id) references nationality(nationality_id),
foreign key (position_id) references player_position(position_id)
);
create table outfield_player(
player_id varchar(10) not null primary key,
pace int not null,
shooting int not null,
passing int not null,
driblling int not null,
defending int not null,
physical int not null,
foreign key (player_id) references players (player_id)
);
create table goalkeepers(
player_id varchar(10) not null primary key,
diving int not null,
handling int not null,
kicking int not null,
refelexes int not null,
speed int not null,
positioning int not null,
foreign key (player_id) references players (player_id)
);

