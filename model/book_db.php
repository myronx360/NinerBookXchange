<?php
/**
 * InClass # HW #
 * NinerBookXchange.
 * User: Myron Willams
 * Date: 3/16/2017
 * Time: 5:22 PM
 */
require_once ('model/database.php');
/** Select Statements */

// select all of the books
function getAllBooks(){
    global $db;
    // select all
    $query = 'SELECT * FROM `book`
              ORDER BY `book`.`BookID`';
    $statement = $db->prepare($query);
    $statement->execute();
    $books = $statement->fetchAll();
    $statement->closeCursor();
    return $books;
}

// get a book with the @param $bookID
function getBookTitleByID($bookID){
    global $db;
    // select book with bookID
    $query = 'SELECT * FROM `book`
              WHERE `BookID` = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $bookID);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();
    $book_name = $book['Title'];
    return $book_name;
}




/** Insert Statements */

// insert new book
function insertBook($title, $author, $classID, $ISBN){
    global $db;

    $query = "INSERT INTO `book`(`Title`, `Author`, `ClassID`, `ISBN`) 
              VALUES (:newTitle, :newAuthor, :newClass, :newISBN)";
    $statment = $db->prepare($query);
    $statment->bindParam(':newTitle', $title);
    $statment->bindParam(':newAuthor', $author);
    $statment->bindParam(':newClass', $classID);
    $statment->bindParam(':newISBN', $ISBN);
    $statment->execute();
}
/** Update Statements */

// upadete a book with @param $bookID
function updateBook($bookID, $title, $author, $classID, $ISBN){
    global $db;

    $query = "UPDATE `book` 
              SET `Title`=:newTitle,`Author`=:newAuthor,`ClassID`=:newClass, `ISBN`=:newISBN
              WHERE `BookID`=:newID";
    $statment = $db->prepare($query);
    $statment->bindParam(':newID', $bookID);
    $statment->bindParam(':newTitle', $title);
    $statment->bindParam(':newAuthor', $author);
    $statment->bindParam(':newClass', $classID);
    $statment->bindParam(':newISBN', $ISBN);
    $statment->execute();
}

/** Delete Statements */

// delete a book with @param $bookID
function deleteBook($bookID){
    global $db;

    $query = "DELETE FROM `book` 
              WHERE `book`.`BookID` = :bookID ";
    $statment = $db->prepare($query);
    $statment->bindParam(':bookID', $bookID);
    $statment->execute();
}