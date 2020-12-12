<?php

session_start();

//creating variables
$username = "";
$email = "";
$flaws = array();

//linking database
$db = mysqli_connect('onnjomlc4vqc55fw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com', 'zzh9ipcx4q2axcja', 'q9ftbyspaefuwmkd', 'ebael4c49y30hjon') or die ("Database failure");

//enroll users
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$conPassword = mysqli_real_escape_string($db, $_POST['conPassword']);

//certify form
if(empty($username)) {array_push($flaws, "A valid username is needed");}
if(empty($email)) {array_push($flaws, "A valid email is needed");}
if(empty($password)) {array_push($flaws, "A valid password is needed");}
if($password != $conPassword) {array_push($flaws, "Passwords need to match");}

//checking for account with same username and/or email
$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$outcome = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($outcome);

if($user) {
    if ($user['username'] === $username)array_push($flaws, "Username taken");
    if ($user['email'] === $email)array_push($flaws, "Email has already been registered");
}

//if no errors have been found, enroll user into database
if(count($flaws) == 0){
    $password = md5(password); //password encryption
    $inquiry = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    //running queries in database, then completing the session with the username, and finally displaying a success message
    mysqli_query($db,$inquiry);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Everything looks good, you have signed in!";

    header('location: index.php');
}