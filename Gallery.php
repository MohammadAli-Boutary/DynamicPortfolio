<?php
session_start();
if (!isset($_SESSION['key'])) {
    header('Location: signinpage.php');
} else {
    $filepath = 'user_data.json';
    $json_data = file_get_contents($filepath);
    $data_arrays = json_decode($json_data, true);
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
            padding-top: 80px;
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


        #header span {
            margin-right: 20px;
            color: #59E4A8;
        }

        #header a {
            color: #1C2E36;
            padding: 8px;
            border-radius: 5px;
            text-decoration: none;
            background-color: #59E4A8;
        }

        .gallery-container {
            padding: 80px;
        }

        .gallery-container img {
            width: 200px;
            height: 200px;
            margin-right: 30px;
        }

        .img-container {
            object-fit: cover;
            float: left;
        }

        .image-form-container {
            padding: 30px;
        }

        .input {
            padding: 10px;
        }

        input[type="file"] {
            display: none;
        }

        .custom-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            margin-right: 15px;
            background-color: #1C2E36;
            color: #59E4A8;
        }


        input[type="submit"] {
            padding: 6px 12px;
            background-color: #59E4A8;
            color:#1C2E36;
            cursor: pointer;
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

        <div class="image-form-container">
            <form name="upload-form" action="upload.php" class="uploadform" method="post" enctype="multipart/form-data">
                <label class="custom-upload" id="imagelabel" for="image">Add an image
                </label>
                <input id="image" class="input" type="file" onchange="updateLabel(this)" name="image"
                        accept="image/*">
                <input type="submit" value="Upload Image">
            </form>
        </div>

        <div class="gallery-container">
            <div class="img-container">
                <img src="Gallery/luffy1.jpeg" alt="">
            </div>
            <div class="img-container">
                <img src="Gallery/luffy.jpg" alt="">
            </div>

        </div>

    </div>

    <script>
        function updateLabel(input) {
            var label = input.value.split('\\').pop(); 
            var labelElement = document.getElementById("imagelabel"); 

            if (label) {
                labelElement.textContent = 'Selected: ' + label;
            } else {
                labelElement.textContent = 'Custom upload';
            }
        }

        </script>
        <script>

        function submitImage(){
            var form = document.querySelector("form[name='upload-form']");
            var image = form.elements["image"].value;

            if(image == ''){
                alert('Please upload an image.');
            }
        }
    </script>



</body>

</html>