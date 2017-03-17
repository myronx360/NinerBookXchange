<?php
/**
 * InClass # HW #
 * NinerBookXchange.
 * User: Myron Willams
 * Date: 3/17/2017
 * Time: 12:09 AM
 */

require_once ('model/database.php');
/** Select Statements */

// select all of the postings
function getAllPostings(){
    global $db;
    // select all
    $query = 'SELECT * FROM `book_catalog`
              ORDER BY `book_catalog`.`postingID`';
    $statement = $db->prepare($query);
    $statement->execute();
    $postings = $statement->fetchAll();
    $statement->closeCursor();
    return $postings;
}

// select all of the postings order by bookID
function getAllPostingsOrderByBookID(){
    global $db;
    // select all
    $query = 'SELECT * FROM `book_catalog`
              ORDER BY `book_catalog`.`BookID`';
    $statement = $db->prepare($query);
    $statement->execute();
    $postings = $statement->fetchAll();
    $statement->closeCursor();
    return $postings;
}

// get a posting with the @param $bookID
function getPostingWithBookID($bookID){
    global $db;
    // select book with bookID
    $query = 'SELECT * FROM `book_catalog`
              WHERE `BookID` = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $bookID);
    $statement->execute();
    $posting = $statement->fetch();
    $statement->closeCursor();
    $posted_book = $posting['BookID']; //FIXME
    return $posted_book;
}




/** Insert Statements */

// insert new posting
function insertPosting($bookID, $userID){  // when ever a user adds a book
    global $db;

    $query = "INSERT INTO `book_catalog`(`BookID`, `UserID`) 
              VALUES (:newBookID, :newUserID)";
    $statment = $db->prepare($query);
    $statment->bindParam(':newBookID', $bookID);
    $statment->bindParam(':newUserID', $userID);
    $statment->execute();
}
/** Update Statements */
// might be easier to just remove and then insert to update a posting

/** Delete Statements */

// delete a posting with @param $postingID
function deleteBookWithPostID($postingID){
    global $db;

    $query = "DELETE FROM `book_catalog` 
              WHERE `book_catalog`.`postingID` = :postingID ";
    $statment = $db->prepare($query);
    $statment->bindParam(':postingID', $postingID);
    $statment->execute();
}

// delete all postings with @param $bookID
function deleteBooksWithBookID($bookID){
    global $db;

    $query = "DELETE FROM `book_catalog` 
              WHERE `book_catalog`.`BookID` = :bookID ";
    $statment = $db->prepare($query);
    $statment->bindParam(':bookID', $bookID);
    $statment->execute();
}

// delete all postings with @param $userID
function deleteBooksWithUserID($userID){
    global $db;

    $query = "DELETE FROM `book_catalog` 
              WHERE `book_catalog`.`UserID` = :userID ";
    $statment = $db->prepare($query);
    $statment->bindParam(':userID', $userID);
    $statment->execute();
}