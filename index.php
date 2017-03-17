
<?php
/**
 * InClass # HW #
 * NinerBookXchange.
 * User: Myron Willams
 * Date: 3/16/2017
 * Time: 4:43 PM
 */
require_once('model/main.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NinerBookXChange</title>
</head>
<body>
<?php
$books = getAllBooks();
foreach ($books as $book):
echo $book["Title"] . "<br>";
endforeach;

echo "getBookTitleByID: 2 " . getBookTitleByID(2) . "<br>";

//insertBook($title, $author, $classID, $IDBN)
//insertBook("insert test", "insert Author", 456, 300);

//updateBook($bookID, $title, $author, $classID, $ISBN)
//updateBook(2, "update test", "up author", 33, 57755);


?>
</body>
</html>