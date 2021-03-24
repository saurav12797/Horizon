<?php

<<<<<<< HEAD
// this require once just say to inherit all from the defined page.
//it like defining and add reference where these file exists
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

    $account = new Account($con); //con is comming from config class

    if(isset($_POST["submitButton"])) {
        
        //FormSanitizer:: means call the form sanitizer class and run 
        //sanitizeFormString() string.  :: represent static fun property

        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]); // data is passsed to formsanitize.php to get 1st capital letter ..remove all space
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
        

        /* validation in account.php*/
        $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2); // calling register function in account.php . basicaly we are taking all input and passing it to validate it

        if($success) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php"); // if success is true then jump to index.php
        }
    }


    // this is used to store the session
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
    <body>
        
        <div class="signInContainer">
        <img  src="assets/images/register_back.jpg" style="width:70%;height:100%" id="background">;

            <div class="column">

                <div class="header">
                    <img src="assets/images/logo1.png" title="Logo" alt="Site logo" />
                    <h3>Sign Up</h3>
                    <span>to continue to Horizon Streaming Platform</span>
                </div>

                <form method="POST">

                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <input type="text" name="firstName" placeholder="First name" value="<?php getInputValue("firstName"); ?>" required>

                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName"); ?>" required>
                    
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

                    <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email"); ?>" required>

                    <input type="email" name="email2" placeholder="Confirm email" value="<?php getInputValue("email2"); ?>" required>
                    
                    <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                    <?php echo $account->getError(Constants::$passwordLength); ?>
                    <input type="password" name="password" placeholder="Password" required>

                    <input type="password" name="password2" placeholder="Confirm password" required>

                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>

                <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>

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
     
           <input type="text" name="firstName" placeholder="First name" required>
           <input type="text" name="lastName" placeholder="Last name" required>
           <input type="text" name="userName" placeholder="User name" required>
           <input type="email" name="email" placeholder="Email" required>
           <input type="email" name="email2" placeholder="Confirm Email" required>
           <input type="password" name="password" placeholder="Password" required>
           <input type="password" name="password2" placeholder="Confirm Password"required>

           <input type="submit" name="submitButton" Value="SUBMIT">



       </form>
       <a href="login.php" class="signInMessage">Already have an account? Sign it here! </a>
    
    
    </div>




 
</div>

         
</body>
>>>>>>> origin/master
</html>