<?php

// start session
session_start();

// Open the connection to the database
include_once("connect.php");



if($_POST)
{
      
// Create new Note
    
    // retrive user number Id from the session 
    $note_from_post = $_POST['note'];
    
   // insert Query
   // INSERT INTO note (`note`)VALUES('note_555');
    $sql = " INSERT INTO note (`note`)VALUES('$note_from_post') ";
    $query = mysqli_query($link,$sql);
  
  
  
    
 // Create new Person_Note
 
   // retrive user number Id from the session 
    $session_id_number = $_SESSION['id'];

  // select query TABLE NOTE - retrive  id number from the last added row
    //SELECT id FROM note where note='note_5';
    $sql = " SELECT MAX(id) FROM note where note='$note_from_post' Limit 1";
    $query_2 = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($query_2);
    $noteID = $row['MAX(id)'];
    
   // insert Query TABLE person_note
    // INSERT INTO person_note(`person_id`,`note_id`) VALUES(2,6);
    $sql = " INSERT INTO person_note(`person_id`,`note_id`) VALUES('$session_id_number','$noteID') ";
    $query = mysqli_query($link,$sql);  
 
 
 
 // SELECT last note from the DATABASE
   // SELECT * FROM note where id=3;
    $sql = " SELECT * FROM note where id='$noteID' ";
    $query_3 = mysqli_query($link,$sql);
    $row_3 = mysqli_fetch_array($query_3);

 
}

  
// create JSON file
echo json_encode($row_3);



?>