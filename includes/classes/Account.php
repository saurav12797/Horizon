<?php

// this class will be communication with database and is for VALIDATION OF FORM 
class Account {

    private $con;
    private $errorArray = array(); // set empty array

    public function __construct($con) { // constructor which will automatically execute when a connection is established from config.php
        $this->con = $con;
    }
      // validating all
    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmails($em, $em2); 
        $this->validatePasswords($pw, $pw2);

        if(empty($this->errorArray)) { //check if this error message is empty then
            return $this->insertUserDetails($fn, $ln, $un, $em, $pw); //then insert the valuse in databse
        }

        return false;
    }

    //Hashing turns your password (or any other piece of data) into a short string of letters and/or numbers using an encryption algorithm. If a website is hacked, the hackers don't get access to your password. Instead, they just get access to the encrypted “hash” created by your password



    //this is login page hashing and it check the hash value with data in database

    public function login($un, $pw) {
        $pw = hash("sha512", $pw);

        //SHA-512 is a hashing algorithm that performs a hashing function on some data given to it. Hashing algorithms are used in many things such as internet security, digital certificates and even blockchains.

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un AND password=:pw"); //sql query to check if any other username exists or not
        $query->bindValue(":un", $un); // first copy and then bind reducdes sql injecttion
        $query->bindValue(":pw", $pw);

        $query->execute();

        if($query->rowCount() == 1) { // means only 1 user exits
            return true;
        }
         //this-> as we are accensing this instance of class
        array_push($this->errorArray, Constants::$loginFailed);
        //in place of constant we can write "first name is wrong length"
        return false;
    }


      // this function is to insert data into database
    private function insertUserDetails($fn, $ln, $un, $em, $pw) {
        
        $pw = hash("sha512", $pw);
        
        $query = $this->con->prepare("INSERT INTO users (firstName, lastName, username, email, password)
                                        VALUES (:fn, :ln, :un, :em, :pw)");
        $query->bindValue(":fn", $fn);
        $query->bindValue(":ln", $ln);
        $query->bindValue(":un", $un);
        $query->bindValue(":em", $em);
        $query->bindValue(":pw", $pw);

        //bound value to placeholder..which is the name in database

        return $query->execute();



       // bindValue() function is an inbuilt function in PHP which is used to bind a value to a parameter. This function binds a value to corresponding named or question mark placeholder in the SQL which is used to prepare the statement.





    }

    private function validateFirstName($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }
//Constants::$firstNameCharacters means access the constant class called the first name character and display its value




    private function validateLastName($ln) {
        if(strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }

    private function validateUsername($un) {
        if(strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un);

        $query->execute();
        
        if($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }

    private function validateEmails($em, $em2) {
        if($em != $em2) { // email u inserted dont match email and confirm email
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }

        //em returns false if FILTER_VALIDATE_EMAIL doent match. just check its vald email or not

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em", $em);

        $query->execute();
        
        if($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    private function validatePasswords($pw, $pw2) { // if both password and reenter password doesnt match
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDontMatch);
            return;
        }

        if(strlen($pw) < 5 || strlen($pw) > 25) {
            array_push($this->errorArray, Constants::$passwordLength);
        }
    }


    //this geterror() is send to register.php to display the error
    public function getError($error) { //takes $this->errorarray
        if(in_array($error, $this->errorArray)) // this means if the $error generated is in $this->array then return error message
        
        {
            return "<span class='errorMessage'>$error</span>"; // using span to style it in red color
            //retuurning this error just below name in register.php
        }
    }

}  //in_array is predefined which check if this exits in array or not

//we have used Constants:: everywhere to display message and created constants.php so that we need not to write same error mesaage again and again. hence we just write it once in constant.php and call it whenever we need. we can also individtually write error message no issue
?>

