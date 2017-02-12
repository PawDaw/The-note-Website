<?php


ob_start();

// start session
session_start();


if(isset($_POST['login'])) {

     include_once("connect.php");
    
     $msg = '';

     // Prevent SQL injection
     // removing tags from the string 
     $username = strip_tags($_POST['userName']);
     $password = strip_tags($_POST['userPassword']);
     
     // removing slashes from the string 
     $username = stripslashes($username);
     $password = stripslashes($password);
     
     // 
    
     
     $sql = "Select * FROM person WHERE name= '$username' LIMIT 1";
     $query = mysqli_query($link,$sql);
     $row = mysqli_fetch_array($query);
     
     $userID = $row['id'];
     $userPass = $row['pass'];

    
        if($userPass == $password){
        
             $_SESSION['id'] = $userID;
             header("Location: index.php");
            
            
        }else{
         $msg = 'Wrong username or password';
        }
     
     
 }    




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Login</title>
	
	<?php require_once 'bootstrap.html';?>
   

    <style>
         h5{
                color:red;
                size:12;
                font-family: "Comic Sans MS", cursive, sans-serif;
                text-align: center ;
                
            }
          
    </style>
    
</head>
<body>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<form class="form-horizontal" action="<?=$_SERVER['PHP_SELF']?>" method="POST">

<div class="container">

    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Please Login</h4>
            <input type="text" name="userName" id="userName" class="form-control input-sm chat-input" placeholder="username" />
            </br>
            <input type="password" name="userPassword" id="userPassword" class="form-control input-sm chat-input" placeholder="password" required />
            </br>
            
            <div class="wrapper">
            
            <button type="submit" class="btn btn-success btn-md" name="login">
            <span class="group-btn">   </span> Login</button>   
           
            </div>
            
            </div>
            
            <h5 class = "form-signin-heading"><?php echo $msg; ?></h5>
        
        </div>
    </div>
</div>
</form>

</body>
</html>


 