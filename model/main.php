<?php
/**
 * InClass # HW #
 * NinerBookXchange.
 * User: Myron Willams
 * Date: 3/16/2017
 * Time: 4:43 PM
 */
require_once ('model/book_db.php');
require_once ('model/user_db.php');
require_once ('model/class_db.php');
require_once ('model/posting_db.php'); // book_catalog table

/**
// TEST of Methods
//insertUser($fName, $lName, $fineAmount, $userType, $password, $username)
insertUser("Alex", "Ryder", 0, "admin", "---", "aryder");
insertUser("John", "Shepard", 0, "faculty", "---", "jshep");
insertUser("Jane", "Doe", 0, "student", "---", "jdoe");

//insertClass($department, $crsNum, $section);
insertClass("ACCT", 12, 1);
insertClass("CCI", 15, 2);
insertClass("ECGR", 2, 1);
insertClass("MATH", 20, 1);


//insertBook($title, $author, $classID, $ISBN)
//insertPosting($bookID, $userID)
insertBook("Learn Accounting", "Vince McMann", 1, "0486994536");
insertPosting(getBookIDWithTitle("Learn Accounting"), getUserIDWithUsername("jshep"));

insertBook("Head First Java", "Bill Gates", 2, "0596009208");
insertPosting(getBookIDWithTitle("Learn Accounting"), getUserIDWithUsername("jshep"));

insertBook("Signals and Waves", "Jamas Conrad", 3, "0981991536");
insertPosting(getBookIDWithISBN("0981991536"), getUserIDWithUsername("jdoe"));

insertBook("Calculus X", "Albert Einstein", 4, "0486404536");
insertPosting(getBookIDWithISBN("0486404536"), getUserIDWithUsername("jdoe"));

*/

