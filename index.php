<?php

 // START SESSION
session_start();

 // Check if session exist if not go back to login page
 if (!isset($_SESSION['id'])){
  header("Location: login.php");
 }
 
 
 // print out the session id number, for check purpose
// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<title>Note</title>
	
<!--  bootstrap  -->
	<?php require_once 'bootstrap.html';?>
	
<!--  CSS styles file -->
	<link rel="stylesheet" href="styles.css">
	
<!--  run when the index.php page is generate    -->
    <script src="row.js"></script>
 
<!--  run when pressed the add button -->
    <script src="add_new_row.js"></script>
	 

</head>
<body>

<div>
    <div id="logout">
      <button type="submit" class="btn btn-primary"  >
       <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <a href="logout.php" style="color: white" >Logout</a> </button>
    </div>
  </div>
</form>

<div class="container">

  <h3 class="animated rubberBand">Notes</h3>
  
  
<table  class="table table-striped">
     <thead>
      <tr>
        <th>ID</th>
        <th>Note</th>
      
      </tr>
    </thead>
           
    
    <tbody id="list" >
       <tr>
      </tr>
    </tbody>
   
</table>


 <br>
 <br>


<h3>Add new Note</h3>

<form method="post" id="form">

<div class="form-group">
    <div>
      <input type="text" class="form-control" name="note" id="note" placeholder="Note" >
    </div>
  </div>

<div class="form-group">
    <div>
      <button type="submit" class="btn btn-info">
       <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Add</button>
    </div>
  </div>
</form>


</div>

</body>
</html>


 