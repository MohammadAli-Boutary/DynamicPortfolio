<?php
session_start();
if(!isset($_SESSION['key'])){
    header('Location: signinpage.php');
}
else{
    $filepath = 'user_data.json';
    $json_data = file_get_contents($filepath);
    $data_arrays = json_decode($json_data,true);
    $user_data = $data_arrays[$_SESSION['key']];
    $username = $user_data['username'];
}

if (isset($_GET['error_code'])) {
    $error_code = $_GET['error_code'];
    if ($error_code == 0) {
        echo "<script> alert('Missing arguments'); </script>";
    } else if ($error_code == 1) {

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <link rel="stylesheet" href="icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to my Portal</title>
    <style>
        body {
            margin: 0;
            padding-top: 40px;
            font-family: sans-serif;
            background: white;
            position: relative;
        }

        html,
        body {
            height: 100%;
        }

        .page-content {
            height: 100%;
            position: relative;
        }



        .welcome_section {
            background-image: url("bg2.jpg");
            height: 100%;
            background-repeat: no-repeat;
            background-size: 40%;
            background-position: right 100px bottom 120px;
            padding: 10px;
            padding-left: 40px;
        }

        .page-content h1 {
            top: 20%;
            font-size: 90px;
            color: #59E4A8;
            font-weight: 500;
            margin-bottom: -10%;
            margin-top: 30%;
            transform: translateY(-50%);

        }

        #header {
            background-color: #1C2E36;
            text-align: right;
            z-index: 2;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .welcome-message{
            width: 35%;
            position: absolute;
            padding: 20px;
        }
        .welcome-message p{
            line-height: 30px;
            margin-top: 30px;
            color: #1C2E36;
            margin-bottom: 100px;
        }
        .view-gallery{
            padding: 10px;
            width: 40%;
            border-radius: 5px;
            background-color: #59E4A8;
            font-size: 17px;
            color: #1C2E36;
            font-weight: bold;
            border: 1px solid #1C2E36;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .view-gallery:hover{
            background-color: #D5F8E5;
        }

        #header span{
            margin-right: 20px;
            color:#59E4A8 ;
        }
        #header a{
            color:#1C2E36;
            padding: 8px;
            border-radius: 5px;
            text-decoration: none;
            background-color: #59E4A8;
        }
    </style>
</head>

<body>

    <header id="header">
        
        <span>
            <?php echo "Welcome " . $username; ?>
        </span>
        <span>
            <a href="logout.php">Logout</a>
        </span>

    </header>


    <div class="page-content">
        <section class="welcome_section">
            <div class="welcome-message">
                <h1>WELCOME</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis delectus ex doloribus perferendis. Adipisci totam placeat, et autem atque recusandae ab sed voluptatem qui dolorum officiis eius voluptate quaerat omnis.</p>
                <a  href="Gallery.php" type="button" class="view-gallery" >View Gallery</a>
            </div>
    </div>



</body>

</html>