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
	fname VARCHAR(30) NOT NULL,
	pass VARCHAR(30) NOT NULL,
	theme INTEGER DEFAULT 0,
	email VARCHAR(50) NOT NULL UNIQUE,
	createTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastlogTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE folders
(
	folderID INTEGER NOT NULL UNIQUE PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(30) NOT NULL,
	defperm INTEGER NOT NULL DEFAULT 0,
	lastTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
	checked BOOLEAN DEFAULT false NOT NULL
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

CREATE TABLE folderRel
(
	userID INTEGER NOT NULL,
	folderID INTEGER NOT NULL,
	perm INTEGER NOT NULL,
	permEditTS TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fav BOOLEAN DEFAULT false NOT NULL,
	PRIMARY KEY(userID, folderID),
	FOREIGN KEY(userID) REFERENCES users(userID),
	FOREIGN KEY(folderID) REFERENCES folders(folderID)
);

CREATE TABLE folderChild
(
	folderID INTEGER NOT NULL,
	childID INTEGER NOT NULL,
	isFolder BOOLEAN DEFAULT false NOT NULL,
	PRIMARY KEY(folderID, childID),
	FOREIGN KEY(folderID) REFERENCES folders(folderID),
	FOREIGN KEY(childID) REFERENCES lists(listID), 
	FOREIGN KEY(childID) REFERENCES folders(folderID)
	
);