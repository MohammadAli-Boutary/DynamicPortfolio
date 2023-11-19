<?php 
session_start();

$error_code;
$success= false;

if(isset($_POST['username']) && isset($_POST['password'])){
    $username =  $_POST['username'];
    $password = $_POST['password'];
    
    $filepath = '../user_data.json';
    $json_data = file_get_contents($filepath);
    $userData = json_decode($json_data,true);
    foreach($userData as $key => $value){
        if (is_array($value) && isset($value['username'])) { 
            $potential_username = $value['username'];
            $potential_password = $value['password'];
            if($potential_username === $username && $potential_password === $password){
                $success = true;
                $matchedkey = $key;
                break;
            }
        }

    }

}
else{
    echo "<script>window.href.location = 'index.php?error_code = 1'</script> ";
}



if($success){
    $_SESSION['key'] = $matchedkey; 
    $url = "../index.php?key=" . urlencode($matchedkey);
    header("Location: $url");
}
else{
    header('Location: ../signinpage.php?error_code=1');
}


?>

<!-- browser can only parse css, html and JS -->