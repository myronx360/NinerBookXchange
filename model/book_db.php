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

// get a book Title with the $bookID@param
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

// get a book Info@param2 with the $bookID@param
function getBookInfoByID($bookID, $info){
    global $db;
    // select book with bookID
    $query = 'SELECT * FROM `book`
              WHERE `BookID` = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $bookID);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();
    $book_name = $book[$info];
    return $book_name;
}

// get a bookID with the @param $bookTitle
function getBookIDWithTitle($bookTitle){
    global $db;
    // select book with bookID
    $query = 'SELECT * FROM `book`
              WHERE `Title` = :book_title';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_title', $bookTitle);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();
    $book_id = $book['BookID'];
    return $book_id;
}

// get a bookID with the $bookISBN@param
function getBookIDWithISBN($bookISBN){
    global $db;
    // select book with bookID
    $query = 'SELECT * FROM `book`
              WHERE `ISBN` = :book_isbn';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_isbn', $bookISBN);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();
    $book_id = $book['BookID'];
    return $book_id;
}




/** Insert Statements */

// insert new book
function insertBook($title, $author, $classID, $ISBN){
    global $db;

    $query = "INSERT INTO `book`(`Title`, `Author`, `ClassID`, `ISBN`) 
              VALUES (:newTitle, :newAuthor, :newClass, :newISBN)";
    $statement = $db->prepare($query);
    $statement->bindParam(':newTitle', $title);
    $statement->bindParam(':newAuthor', $author);
    $statement->bindParam(':newClass', $classID);
    $statement->bindParam(':newISBN', $ISBN);
    $statement->execute();
}


/** Update Statements */

// update a book with @param $bookID
function updateBook($bookID, $title, $author, $classID, $ISBN){
    global $db;

    $query = "UPDATE `book` 
              SET `Title`=:newTitle,`Author`=:newAuthor,`ClassID`=:newClass, `ISBN`=:newISBN
              WHERE `BookID`=:newID";
    $statement = $db->prepare($query);
    $statement->bindParam(':newID', $bookID);
    $statement->bindParam(':newTitle', $title);
    $statement->bindParam(':newAuthor', $author);
    $statement->bindParam(':newClass', $classID);
    $statement->bindParam(':newISBN', $ISBN);
    $statement->execute();
}

/** Delete Statements */

// delete a book with @param $bookID
function deleteBook($bookID){
    global $db;

    $query = "DELETE FROM `book` 
              WHERE `book`.`BookID` = :bookID ";
    $statement = $db->prepare($query);
    $statement->bindParam(':bookID', $bookID);
    $statement->execute();
}