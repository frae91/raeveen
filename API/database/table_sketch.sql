CREATE TABLE users (
	id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	username TEXT NOT NULL,
	password TEXT NOT NULL,
	email TEXT NOT NULL,
	created TEXT NOT NULL
)

CREATE TABLE course (
	id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	username TEXT NOT NULL,
	course TEXT NOT NULL,
	enrolledOn TEXT NOT NULL
)
