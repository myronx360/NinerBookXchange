<?php
/**
 * InClass # HW #
 * NinerBookXchange.
 * User: Myron Willams
 * Date: 3/17/2017
 * Time: 1:11 AM
 */

require_once ('model/database.php');
/** Select Statements */

// select all of the books
function getAllClasses(){
    global $db;
    // select all
    $query = 'SELECT * FROM `class`
              ORDER BY `class`.`ClassID`';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

// get a class department with the @param $classID
function getClassDepByID($classID){
    global $db;
    // select department with bookID
    $query = 'SELECT * FROM `class`
              WHERE `ClassID` = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $classID);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    $department = $class['Crs_Dep'];
    return $department;
}

// get a classID with the $depName@param
function getClassIDWithDepName($depName){
    global $db;
    // select user with username
    $query = 'SELECT * FROM `class`
              WHERE `Crs_Dep` = :dep_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':dep_name', $depName);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    $class_id = $class['UserID'];
    return $class_id;
}




/** Insert Statements */

// insert new class
function insertClass($department, $crsNum, $section){
    global $db;

    $query = "INSERT INTO `class`(`Crs_Dep`, `Crs_Num`, `Section`) 
              VALUES (:newDepartment, :newCourseNum, :newSection)";
    $statement = $db->prepare($query);
    $statement->bindParam(':newDepartment', $department);
    $statement->bindParam(':newCourseNum', $crsNum);
    $statement->bindParam(':newSection', $section);
    $statement->execute();
}
/** Update Statements */

// update a class with @param $classID
function updateClass($classID, $department, $crsNum, $section){
    global $db;

    $query = "UPDATE `class` 
              SET `Crs_Dep`=:newDep,`Crs_Num`=:newCrsNum,`Section`=:newSection
              WHERE `ClassID`=:newID";
    $statement = $db->prepare($query);
    $statement->bindParam(':newID', $classID);
    $statement->bindParam(':newDep', $department);
    $statement->bindParam(':newCrsNum', $crsNum);
    $statement->bindParam(':newSection', $section);
    $statement->execute();
}

/** Delete Statements */

// delete a class with @param $classID
function deleteClass($classID){
    global $db;

    $query = "DELETE FROM `class` 
              WHERE `class`.`ClassID` = :classID ";
    $statement = $db->prepare($query);
    $statement->bindParam(':classID', $classID);
    $statement->execute();
}