<?php


// start session
session_start();

// connection to the database
include_once("connect.php");

// retrive user number Id from the session 
 $session_id_number = $_SESSION['id'];

      // SELECT note.id,note.note FROM note INNER JOIN person_note ON note_id = note.id where person_id=1
 $sql = "SELECT note.id,note.note FROM note INNER JOIN person_note ON note_id = note.id where person_id= '$session_id_number' ";
 $query = mysqli_query($link,$sql);


    $notes = array();
    

    while($row = mysqli_fetch_assoc($query)) {
    
        $notes[] = $row;
    }
  
 
 
// create JSON file
echo json_encode($notes);


?>
