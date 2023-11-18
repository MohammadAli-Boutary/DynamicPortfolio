<?php

$username = $_POST["username"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$password1 = $_POST["password"];
$password2 = $_POST["confirmpass"];
$sex = $_POST["sex"];
$dob = $_POST["DOB"];

$userdata = array(
    "username" => $username,
    "firstname" => $firstname,
    "lastname" => $lastname,
    "password" => $password1,
    "sex"=> $sex,
    "DOB" => $dob
);

$json_data = json_encode($userdata);

$filepath = 'user_data.json';

file_put_contents($filepath,$json_data);

?>