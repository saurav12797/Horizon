<?php
<<<<<<< HEAD
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

    if(isset($_POST["submitButton"])) {

        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        
        $success = $account->login($username, $password);

        if($success) {
            $_SESSION["userLoggedIn"] = $username; // we defined it in config.php

            header("Location: index.php");
        }
    }
 // suppose i get wrong in input..then my username atleast will be saved so that i neednot write it again
function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Horizon</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
    </head>
    <body > 

        
        <div  class="signInContainer">
        <img  src="assets/images/3658604.jpg" style="width:70%;height:100%" id="background">;

            <div class="column">

                <div class="header">
                    <img src="assets/images/logo1.png" title="Logo" alt="Site logo" />
                    <h3>Sign In</h3>
                    <span>to continue to Horizon</span>
                </div>

                <form method="POST">
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required> <!-- here php is used to get the input value which we type and save it if password is wroong -->

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>

                <a href="register.php" class="signInMessage">Need an account? Sign up here!</a>

            </div>

        </div>

    </body>
=======

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
>>>>>>> origin/master
</html>