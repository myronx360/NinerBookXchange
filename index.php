
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
/**
 *
      // Test of Methods
*/
$users = getAllUsers();
foreach ($users as $user){
    echo $user["First_Name"] . "<br>";
}

$classes = getAllClasses();
foreach ($classes as $class){
    echo $class["Crs_Dep"] . "<br>";
}

$books = getAllBooks();
foreach ($books as $book){
    echo $book["Title"] . "<br>";
}

$postings = getAllPostings();
foreach ($postings as $post){
    echo "BookID: ".$post["BookID"]."  userID: ".$post["UserID"] . "<br>";
}

echo "getBookTitleByID: 2 " . getBookTitleByID(2) . "<br>";
//*/

?>
</body>
</html>