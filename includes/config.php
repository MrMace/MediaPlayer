<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 1/16/2018
 * Time: 7:14 PM
 */


ob_start();
//session start
session_start();


//add a little additional security
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "mediaplayer";


$timezone = date_default_timezone_set("America/Indiana/Indianapolis");


//loop through the db array and turn them into Const
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
//connect to database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//check if connected.
//if ($connection) {
//
//
//    echo "<script>console.log('Data Base is Connected')</script>";
//}

?>
