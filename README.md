# logsystem
adatbázis neve test
a tábla sql kódja pedig:

CREATE TABLE users (
	usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	usersName varchar(128) NOT NULL,
	usersUid varchar(128) NOT NULL,
	usersPassword varchar(128) NOT NULL,
	userType varchar(10) NOT NULL
) COLLATE ascii_bin
