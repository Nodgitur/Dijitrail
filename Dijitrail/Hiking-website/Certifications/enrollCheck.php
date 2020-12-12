<?php
echo ('will register');

if(isset($_POST["enroll_action"])) {

    echo ('Did register');

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
    if(usernameDeniedEnroll($username) !== false){
        header("location: ../Enroll/enrolment.php?error=usernamedenied");
        exit();
    }
    if(emailDeniedEnroll($email) !== false){
        header("location: ../Enroll/enrolment.php?error=emaildenied");
        exit();
    }
    if(passwordMatchEnroll($password, $conPassword) !== false){
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
