<?php
class FormSanitizer {

     // its static just mean we dont need instance to call it
     //like $fromsanitize=new from sanitzer() xx dont have to write this

    public static function sanitizeFormString($inputText) {
        $inputText = strip_tags($inputText); 
        // stips remove htmls tags  to prevent hacking 


        $inputText = str_replace(" ", "", $inputText); 
        // remove spaces when we write name in login or sign up
        //$inputText = trim($inputText); to remove space from beg. and end
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }

    public static function sanitizeFormUsername($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    public static function sanitizeFormPassword($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }

    public static function sanitizeFormEmail($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

}
?>