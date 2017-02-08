DROP TABLE users;
DROP TABLE listRel;
DROP TABLE folderRel;
DROP TABLE folders;
DROP TABLE lists;
DROP TABLE items;
DROP TABLE folderChild;

CREATE TABLE users
(
	userID INTEGER NOT NULL UNIQUE PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(30) NOT NULL UNIQUE,
	pass VARCHAR(50) NOT NULL,
	salt VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL UNIQUE,
	createTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastlogTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE lists
(
	listID INTEGER NOT NULL UNIQUE PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(30),
	defperm INTEGER DEFAULT 0,
	lastTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE items
(
	itemID INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	listID INTEGER NOT NULL,
	val VARCHAR(30) NOT NULL,
	checked BOOLEAN DEFAULT false NOT NULL,
	FOREIGN KEY(listID) REFERENCES lists(listID)
);

CREATE TABLE listRel
(
	userID INTEGER NOT NULL,
	listID INTEGER NOT NULL,
	perm INTEGER,
	permChangeTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fav BOOLEAN DEFAULT false NOT NULL,
	PRIMARY KEY(userID, listID),
	FOREIGN KEY(userID) REFERENCES users(userID),
	FOREIGN KEY(listID) REFERENCES lists(listID)
);