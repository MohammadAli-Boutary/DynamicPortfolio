<?php 

echo "hey guys";
$error_code;
$success= false;

if(isset($_POST['username']) && isset($_POST['password'])){
    echo $_POST['username'];
    $usernames = array('john.wick','john.cena','john.kurose');
    $passwords = array('test1','test2','test3');
    
    for ($i = 0 ; $i < 3 ; $i++){
        if($usernames[$i] == $_POST['username'] && $passwords[$i] == $_POST['password']){
            $success = true;
            break;
        }
    }
}
else{
    echo "window.href.location = 'index.php?error_code = 1' ";
}
echo $success;
if($success){
    echo "<script> window.href.location = 'tests.html'";
}
else{
    echo "<script> window.href.location = 'index.php?error_code=0'";
}

?>

<!-- browser can only parse css, html and JS -->