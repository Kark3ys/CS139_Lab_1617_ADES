INSERT INTO users(username, pass, salt, email)
VALUES('SomeUserName', 'd2335ebb952039cdf519ef1eb4c089499d7bec68', 'ae4f281df5a5d0ff3cad6371f76d5c29b6d953ec', 'some@gmail.com'),
	('AnotherUser', 'd2335ebb952039cdf519ef1eb4c089499d7bec68', 'ae4f281df5a5d0ff3cad6371f76d5c29b6d953ec', 'another@yahoo.com'),
	('Idunno', 'd2335ebb952039cdf519ef1eb4c089499d7bec68', 'ae4f281df5a5d0ff3cad6371f76d5c29b6d953ec', 'dunno@microsoft.live.co.uk'),
	('A', 'd2335ebb952039cdf519ef1eb4c089499d7bec68', 'ae4f281df5a5d0ff3cad6371f76d5c29b6d953ec', 'C');
	/*Passwords are all 'A'*/
	/*All salts are 'B'*/
	/*Encrypted Passwords are sha1($salt."--A")*/

INSERT INTO lists(name)
VALUES ('nEW lIST'), ('A list'), ('Another List'), ('Something Else List');

INSERT INTO items(listID, val)
VALUES (1, 'Carrots'), (1, 'Potatoes'), (2, 'Finish Painting'), (1, 'Lettuce'),
	(1, 'Onions'), (3, 'Finish Washing'), (4, '£3.49'), (3, 'Clean Car'), (1, 'Ketchup');

INSERT INTO listRel(userID, listID, perm)
VALUES (1,1,0), (2,1,1), (3,1,1), (2,2,0), (4,3,0), (4,4,0);