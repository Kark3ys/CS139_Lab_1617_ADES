/*These will not work, need inner joins to work, some are implemented below original method*/


SELECT * FROM lists WHERE
listID=listRel.listID AND
listRel.userID=<input_user_ID_here>;

SELECT name FROM lists 
INNER JOIN listRel ON lists.listID=listRel.listID
INNER JOIN users ON listRel.userID=users.userID
WHERE users.userID=2;

/*------------------------*/
SELECT name FROM lists WHERE
listID=listRel.listID AND
listRel.userID=<insert_user_ID_here>;

/*------------------------*/
SELECT val FROM items WHERE
items.listID=<insert_list_ID_here> AND
checked=false;

/*------------------------*/
SELECT val FROM items WHERE
items.listID=<insert_list_ID_here> AND
checked=true;

/*------------------------*/
SELECT COUNT(itemID) FROM items WHERE
items.listID = <insert_list_ID_here>;

/*------------------------*/
SELECT COUNT(itemID) FROM items WHERE
items.itemID + lsits.listID AND
lists.listID = listRel.listID AND
listRel.userID = <insert_user_ID_here>;

