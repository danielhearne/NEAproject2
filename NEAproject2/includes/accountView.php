<?php

session_start();

require_once 'connection.php';

    //checking if session value exists 
    if(isset($_SESSION['id']))
    {
        //fetches user data and queries database for results. If data exists, return data
        $id = $_SESSION['id'];
        $query = "select * from users where id = '$id' limit 1";

        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: http://localhost\NEAproject2\login.html");
    die;

echo "Logged in with <br> username: ".$username."<br> password: ".$password;
