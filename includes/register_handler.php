<?php

/**
 * Registration Logic
 * @package Communicate
 * @author Tristan Elliott
 */


// Handeling the form input data.

$fname = "";// First Name
$lname = "";// Last Name
$em = "";// Email
$em2 = "";// Confirm Email
$password = "";// Password
$password2 = "";// Confirm Password
$date = "";// Sign up date
$error_array = array();// Holds Error Messages

if(isset($_POST['register_button'])){
    // Registration Form Values

    // First Name
    $fname = strip_tags($_POST['reg_fname']); // Removes HTML Tags.
    $fname = str_replace(' ', '', $fname); // Removes Spaces.
    $fname = ucfirst(strtolower($fname));// Removes Uppercase Letters.
    $_SESSION['reg_fname'] = $fname; // Stores the first name into session variable.


    // Last Name
    $lname = strip_tags($_POST['reg_lname']); // Removes HTML Tags.
    $lname = str_replace(' ', '', $lname); // Removes Spaces.
    $lname = ucfirst(strtolower($lname)); // Removes Uppercase Letters.
    $_SESSION['reg_lname'] = $lname; // Stores the last name into session variable.

    // Email
    $em = strip_tags($_POST['reg_email']); // Removes HTML Tags.
    $em = str_replace(' ', '', $em); // Removes Spaces.
    $em = ucfirst(strtolower($em)); // Removes Uppercase Letters.
    $_SESSION['reg_email'] = $em; // Stores the email into session variable.

    // Confirm Email
    $em2 = strip_tags($_POST['reg_email2']); // Removes HTML Tags.
    $em2 = str_replace(' ', '', $em2); // Removes Spaces.
    $em2 = ucfirst(strtolower($em2)); // Removes Uppercase Letters.
    $_SESSION['reg_email2'] = $em2; // Stores the confirmation email into session variable.

    // Password
    $password = strip_tags($_POST['reg_password']); // Removes HTML Tags.
    $_SESSION['reg_password'] = $password; // Stores the password into session variable.

    // Confirm Password
    $password2 = strip_tags($_POST['reg_password2']); // Removes HTML Tags.
    $_SESSION['reg_password2'] = $password2; // Stores the confirmation password into session variable.

    // Sign Up Date
    $date = date("Y-m-d");

    // Checking if the emails match.
    if($em == $em2) {
        // Checking if the user put a valid email address.
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);
            // Checking if the email address already exists.
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
            // Count the number of rows returned.
            $num_rows = mysqli_num_rows($e_check);
            if($num_rows > 0){
                array_push($error_array, "Email already in use");
            }
        } else {
            array_push($error_array, "Invalid Format!");
        }
    } else {
        array_push($error_array, "Emails Dont Match!");
    }

    // Validating the first name field.
    if(strlen($fname) > 255 || strlen($fname) < 2) {
        array_push($error_array, "Your first name must be between 2 and 255 characters");
    }

    // Validating the last name field.
    if(strlen($lname) > 255 || strlen($lname) < 2) {
        array_push($error_array, "Your last name must be between 2 and 255 characters");
    }

    // Checking if the passwords are a match.
    if($password != $password2){
        array_push($error_array, "Your passwords do not match.");
    } else {
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            array_push($error_array, "Your password can only contain english characters or numbers");
        }
    }
    // Checking the password length is correct.
    if(strlen($password) > 255 || strlen($password) < 8) {
        array_push($error_array, "Your password must be between 8 and 255 characters");
    }

    // If the array is empty
    if(empty($error_array)){
        $password = md5($password); // Encrypt the password.
        // Generate the username by concatenating the first and last name
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        $i = 0;
        // Check if the username exists and add a number to the username.
        while(mysqli_num_rows($check_username_query) != 0){
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        }

        // Profile picture assignment
        $rand = rand(1, 2);
        if($rand == 1)
            $profile_pic = "./assets/images/avatar.png";
        else if($rand == 2)
            $profile_pic = "./assets/images/avatar.png";

        $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
        array_push($error_array, "You are registered and can now login!");

        // Clear the form once signup is complete.
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";
    }

}
