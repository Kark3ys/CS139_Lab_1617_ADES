INSERT INTO users(username, fname, pass, theme, email)
VALUES('SomeUserName', 'Hello', 'Pass', 3, 'some@gmail.com'),
	('AnotherUser', 'Another Guy', '1234', 2, 'another@yahoo.com'),
	('Idunno', 'Uses Lists', 'password', 2, 'dunno@microsoft.live.co.uk'),
	('A', 'B', 'C', 0, 'D');

INSERT INTO folders(name, defperm)
VALUES
	('Folder 1', 0),
	('New Folder', 2),
	('abcd', 2),
	('Unlisted Folder', 1),
	('Something Else', 0);

INSERT INTO lists(name)
VALUES ('nEW lIST'), ('A list'), ('Another List'), ('Something Else List');

INSERT INTO items(listID, val)
VALUES (1, 'Carrots'), (1, 'Potatoes'), (2, 'Finish Painting'), (1, 'Lettuce'),
	(1, 'Onions'), (3, 'Finish Washing'),+ (4, '£3.49'), (3, 'Clean Car'), (1, 'Ketchup');

INSERT INTO listRel(userID, listID, perm)
VALUES (1,1,0), (2,1,1), (3,1,1), (2,2,0), (4,3,0), (4,4,0);