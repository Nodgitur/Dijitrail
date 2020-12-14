<?php

//checking if user signed up before accessing the login page
if(isset($_POST["signin_action"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once '../Database/db.php';
    require_once 'controls.php';

    if(blankInputSignIn($username, $password) === true){
        header("location: ../AccessingAccount/signIn.php?error=blankinput");
        exit();
    }

    signInUser($connection, $username, $password);
}
else{
    header("location: ../AccessingAccount/signIn.php");
}
