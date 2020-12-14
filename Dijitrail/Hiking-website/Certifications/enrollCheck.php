<?php

if(isset($_POST["enroll_action"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conPassword = $_POST["conPassword"];

    require_once '../Database/db.php';
    require_once 'controls.php';

    //error handlers
    if(blankInputEnroll($username, $email, $password, $conPassword) !== false){
        header("location: ../Enroll/enrolment.php?error=blankinput");
        exit();
    }
    if(usernameDenied($username) !== false){
        header("location: ../Enroll/enrolment.php?error=usernamedenied");
        exit();
    }
    if(emailDenied($email) !== false){
        header("location: ../Enroll/enrolment.php?error=emaildenied");
        exit();
    }
    if(passwordMatch($password, $conPassword) !== false){
        header("location: ../Enroll/enrolment.php?error=passwordsarenotmatching");
        exit();
    }
    if(usernameExists($connection, $username, $email) !== false){
        header("location: ../Enroll/enrolment.php?error=usernamealreadyexists");
        exit();
    }
    createUser($connection, $username, $email, $password);
}

else{
    header("location: ../AccessingAccount/signIn.php");
}
