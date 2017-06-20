-- Enter into mySQL:

CREATE TABLE users (
	id int NOT NULL AUTO_INCREMENT,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	PRIMARY KEY (id)
);

create table artists (
	id int auto_increment not null,
	name varchar(255) not null unique,
	primary key(id)
);

create table albums(
	id int auto_increment not null,
	name varchar(255) not null,
	year year(4),
	artist_id int,
	primary key(id),
	foreign key(artist_id) references artists(id)
);

create table playlists(
	id int auto_increment not null,
	date_created timestamp default current_timestamp,
	user_id int,
	primary key(id),
	foreign key(user_id) references users(id)
		on update cascade on delete set null
);

create table songs(
	id int auto_increment not null,
	title varchar(255) not null,
	length int,
	genre varchar(255),
	album_id int,
	primary key(id),
	foreign key(album_id) references albums(id)
		on update cascade on delete set null
);

create table songs_playlists(
	id int auto_increment not null,
	song_id int,
	playlist_id int,
	primary key(id),
	foreign key(song_id) references songs(id)
		on update cascade on delete set null,
	foreign key(playlist_id) references playlists(id)
		on update cascade on delete set null
); 

insert into artists(name)
	values('Rivermaya'), ('Psy');

insert into albums(name, year, artist_id)
	values('Psy 6', 2012, 2), ('Trip', 1996, 1);

insert into songs(title, length, genre, album_id)
	values('Gangnam Style', 253, 'K-pop', 1);

insert into songs(title, length, genre, album_id)
	values('Kundiman', 234, 'OPM', 2);

insert into songs(title, length, genre, album_id)
	values('Kisapmata', 279, 'OPM', 2);

