<?php
/**
 * InClass # HW #
 * NinerBookXchange.
 * User: Myron Willams
 * Date: 3/16/2017
 * Time: 11:24 PM
 */

require_once ('model/database.php');
/** Select Statements */

// select all of the users
function getAllUsers(){
    global $db;
    // select all
    $query = 'SELECT * FROM `user`
              ORDER BY `user`.`UserID`';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

// get a user's First Name with the @param $userID
function getUserFirstNameByID($userID){
    global $db;
    // select user with userID
    $query = 'SELECT * FROM `user`
              WHERE `UserID` = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $userID);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $user_name = $user['First_Name'];
    return $user_name;
}

// get a userID with the $username@param
function getUserIDWithUsername($username){
    global $db;
    // select user with username
    $query = 'SELECT * FROM `user`
              WHERE `Username` = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $user_id = $user['UserID'];
    return $user_id;
}

// get a user's fine amount with the @param $userID
function getUserFineAmountByID($userID){
    global $db;
    // select user with userID
    $query = 'SELECT * FROM `user`
              WHERE `UserID` = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $userID);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $user_fine = $user['Fine_Amount'];
    return $user_fine;
}

// get a user's type with the @param $userID
function getUserTypeByID($userID){
    global $db;
    // select user with userID
    $query = 'SELECT * FROM `user`
              WHERE `UserID` = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $userID);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $user_type = $user['Type'];
    return $user_type;
}




/** Insert Statements */

// insert new user
function insertUser($fName, $lName, $fineAmount, $userType, $password, $username){
    global $db;

    $query = "INSERT INTO `user`(`First_Name`, `Last_Name`, `Fine_Amount`, `Type`, `Password`, `Username`) 
              VALUES (:newFName, :newLName, :newFineAmount, :newUserType, :newPassword, :newUsername)";
    $statment = $db->prepare($query);
    $statment->bindParam(':newFName', $fName);
    $statment->bindParam(':newLName', $lName);
    $statment->bindParam(':newFineAmount', $fineAmount);
    $statment->bindParam(':newUserType', $userType);
    $statment->bindParam(':newPassword', $password);
    $statment->bindParam(':newUsername', $username);
    $statment->execute();
}
/** Update Statements */

/**
 * @param $UserID
 * @param $fName
 * @param $lName
 * @param $fineAmount
 * @param $userType
 * @param $password
 * @param $username
 */
function updateUser($UserID, $fName, $lName, $fineAmount, $userType, $password, $username){
    global $db;

    $query = "UPDATE `user` 
              SET `First_Name`=:newFName, `Last_Name`=:newLName, `Fine_Amount`=:newFineAmount, `Type`=:newUserType, `Password`=:newPassword, `Username`=:newUsername
              WHERE `UserID`=:ID";
    $statement = $db->prepare($query);
    $statement->bindParam(':ID', $UserID);
    $statement->bindParam(':newFName', $fName);
    $statement->bindParam(':newLName', $lName);
    $statement->bindParam(':newFineAmount', $fineAmount);
    $statement->bindParam(':newUserType', $userType);
    $statement->bindParam(':newPassword', $password);
    $statement->bindParam(':newUsername', $username);
    $statement->execute();
}

/**
 * @param $UserID
 * @param $fineAmount
 */
function updateUserFineAmount($UserID, $fineAmount){
    global $db;

    $query = "UPDATE `user` 
              SET `Fine_Amount`=:newFineAmount
              WHERE `UserID`=:ID";
    $statement = $db->prepare($query);
    $statement->bindParam(':ID', $UserID);
    $statement->bindParam(':newFineAmount', $fineAmount);
    $statement->execute();
}

/** Delete Statements */

// delete a user with @param $userID
function deleteUser($userID){
    global $db;

    $query = "DELETE FROM `user` 
              WHERE `user`.`UserID` = :userID ";
    $statement = $db->prepare($query);
    $statement->bindParam(':userID', $userID);
    $statement->execute();
}