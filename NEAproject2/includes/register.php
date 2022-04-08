<?php
//require the database connection
require_once "connection.php";
//Checking if the user is trying to access this view pressing
//the 'submit' within './register.html'
if(isset($_POST["submit"])){
    //User is trying to register to website => create variables based on 
    //user information 
    //from the register form in ./register.html
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Selecting all the username fields from the database
    //to then check if the user is trying to register using any
    //of them.
    $sql_username = "SELECT * FROM users WHERE username='$username'";
    $result_username = mysqli_query($conn, $sql_username);
    //Check if the password the user has inserted is the same as the 
    //'confirm_passowrd' input
    if($password){

        //check if username IS already is use 
        //(> 0 means that there is already a user with that username)
        if(mysqli_num_rows($result_username) > 0){
            //Send the user to a page, saying that "there is already a user with 
            //that username"
            echo "Username Taken";
        }

        //check if email and username aren't already in use 
        //(== 0 means that there isn't a user with that username & emaill)
        if((mysqli_num_rows($result_username) == 0)) {

            //Create a query for that'll insert the data into the user table
            $sql = "INSERT INTO users (username, userPassword) 
                VALUES ('$username','$password')";

            if(mysqli_query($conn, $sql)){
                //Direct to login page
                header("Location: http://localhost/NEAproject2/login.html");
            } else {
                echo "ERROR: Register data wasn't stored in the database table";
            }
        } 
    }
}