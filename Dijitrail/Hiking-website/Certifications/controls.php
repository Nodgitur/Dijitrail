<?php

function blankInputEnroll($username, $email, $password, $conPassword){
    if(empty($username) || empty($email) || empty($password) || empty($conPassword)){
        $output = true;
    }
    else{
        $output = false;
    }
    return $output;
}

function usernameDenied($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $output = true;
    }
    else{
        $output = false;
    }
    return $output;
}

function emailDenied($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $output = true;
    }
    else{
        $output = false;
    }
    return $output;
}

//checking if passwords match
function passwordMatch($password, $conPassword)
{
    if($password !== $conPassword)
    {
        $output = true;
    }
    else{
        $output = false;
    }
    return $output;
}

function usernameExists($connection, $username, $email)
{
    $sql = "SELECT * FROM accounts WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($connection); //sql injection prevention

    mysqli_stmt_prepare($stmt, $sql);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../Enroll/enrolment.php?error=usernameexists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $outcomeData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($outcomeData))
    {
        mysqli_stmt_close($stmt);
        return $row;
    }
    else {
        $outcome = false;
        mysqli_stmt_close($stmt);
        return $outcome;
    }
    mysqli_stmt_close($stmt);
}

function createUser($connection, $username, $email, $password)
{
    $sql = "INSERT INTO accounts (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($connection); //sql injection prevention

    mysqli_stmt_prepare($stmt, $sql);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../Enroll/enrolment.php?error=usercreationfailure");
        exit();
    }

    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

    $error = mysqli_stmt_error($stmt);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $encryptedPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../AccessingAccount/signIn.php?error=$result");
    exit();
}

/* below are the functions for the
 * sign in webpage.
 *
 */


function blankInputSignIn($username, $password)
{
    if(empty($username) || empty($password))
    {
        $output = true;
    }
    else {
        $output = false;
    }
    return $output;
}

function signInUser($connection, $username, $password)
{
    $usernameExists = usernameExists($connection, $username, $username); //using the same parameter twice because function above will decide on either

    if($usernameExists === false)
    {
        header("location: ../AccessingAccount/signIn.php?error=incorrectsignininfo");
        exit();
    }

    //grabbing the hashed password from the database, and comparing the user entered password
    $hashedPassword = $usernameExists["password"];
    $certifyPassword = password_verify($password, $hashedPassword);

    if($certifyPassword === false)
    {
        header("location: ../AccessingAccount/signIn.php?error=incorrectsignininfo");
        exit();
    }
    else
    {
        $_SESSION["id"] = $usernameExists["id"]; //checking if id found in info entered and in database mirror each other
        $_SESSION["username"] = $usernameExists["username"]; //checking if username found in info entered and in database mirror each other
        header("location: ../Home/index.php?error=noerrors");
        exit();
    }
}