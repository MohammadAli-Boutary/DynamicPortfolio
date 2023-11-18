<?php
$username = $_POST["username"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$password1 = $_POST["password"];
$password2 = $_POST["confirmpass"];
$sex = $_POST["sex"];
$dob = $_POST["DOB"];

// Create new user data
$newUserData = array(
    "username" => $username,
    "firstname" => $firstname,
    "lastname" => $lastname,
    "password" => $password1,
    "sex" => $sex,
    "DOB" => $dob
);

$filepath = 'user_data.json';

// Read existing JSON data from the file
$currentData = file_get_contents($filepath);

// Decode JSON data to PHP array
$existingData = json_decode($currentData,true);

// Append new user data to the existing array
$existingData[] = $newUserData;

// Encode the merged array back to JSON
$jsonData = json_encode($existingData);

// Write updated JSON data back to the file
file_put_contents($filepath, $jsonData);
?>
