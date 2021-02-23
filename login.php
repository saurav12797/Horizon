<?php

if(isset($_POST["submitButton"]))  /* means if submit button is pressed then */
{
   echo "form was submiited"; 

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title> Welcome to Horizon</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">
</head>
<body>


<div class="signInContainer">
    
    <div class="column">
       <div class="header">
       <img src="assets/images/horizon.png" title="logo" alt="Site Logo"/>
          <h3>Sign Up</h3>
          <span>To continue to Video Tube</span>
          
       </div>
    
       <form  method="POST" action="">
     
          
           <input type="text" name="userName" placeholder="User name" required>
        
           <input type="password" name="password" placeholder="Password" required>
         
           <input type="submit" name="submitButton" Value="SUBMIT">



       </form>
       <a href="register.php" class="signInMessage">Need an account? Sign up here</a>
    
    
    </div>




 
</div>

         
</body>
</html>