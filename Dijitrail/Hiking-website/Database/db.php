<?php

$serverDb = "onnjomlc4vqc55fw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$usernameDb = "zzh9ipcx4q2axcja";
$passwordDb = "q9ftbyspaefuwmkd";
$nameDb = "ebael4c49y30hjon";

echo ("started execution");

$connection = mysqli_connect($serverDb, $usernameDb, $passwordDb, $nameDb);

if(!$connection){
    die("Database failed due to: " .mysqli_connect_error());
}
