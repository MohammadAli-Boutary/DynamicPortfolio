<?php 
if(isset($_GET['error_code'])){
    $error_code = $_GET['error_code'];
    if($error_code == 0){
        echo "<script> alert('Missing arguments'); </script>";
    }
    else if($error_code == 1){
        echo "<script>alert('Wrong username or password.');</script>";
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
            padding-top: 30px;
            font-family: sans-serif;
            background: #0080A5;
            position: relative;
        }


        html,
        body {
            height: 100%;
        }

        .page-content {
            padding: 30px;
        }

        .title {
            text-align: left;
        }

        h1 {
            margin: 0;
        }

        input {
            margin-bottom: 20px;
            width: 90%;
            border: 1px solid black;
            border-radius: 5px;
            padding: 15px;
            margin-top: 10px;
            background-color: transparent;
        }

        label {
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-container {
            padding: 40px;
            width: 25%;
            border-radius: 5px;
            background-color: white;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .redirect {
            margin-bottom: 30px;
        }

        .redirect span {
            font-size: 14px;
            color: #888;
        }

        .redirect a {
            color: blueviolet;
        }

        #submitbtn,
        #cancelbtn {
            padding: 10px;
            width: 40%;
            color: white;
            background-color: #1F6BA7;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: auto;
        }

        #submitbtn:hover,
        #cancelbtn:hover {
            border: 1px solid #883EFF;
            background-color: transparent;
            color: #883EFF;
        }

        #submitbtn {
            margin-right: 10px;
        }

        .buttons {
            text-align: left;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>

    <header id="header" style="background-color:#4DA8DA">
        <div class="dropdown-menu">
            <span><i class="icon" ></i>MENU</span>
            <div class="menu-items">
                <ul>
                    <a class="link" href="">
                        <li>Home</li>
                    </a>
                    <a class="link" href="">
                        <li>My Account</li>
                    </a>
                    <a class="link" href="">
                        <li>Settings</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>


    <div class="page-content">
        <div class="form-container">
            <div class="title">
                <h1>Login</h1>
            </div>
            <div class="redirect">
                <span>Don't have an account yet?</span>
                <a href="signup.html" style="color:#4DA8DA" target="_blank" title="Sign Up Page">Sign Up</a>
            </div>
            <div class="form">
                <form style="margin-top: 10px;" action="BE/signin.php" name="form-login" method="POST" >
                    <!-- we use labels for phones = click on label, input is also clicked, ex checkbox -->
                    <label style="margin-bottom: 30px;" for="username">Username: </label> <br>
                    <input name="username" type="text" id="username">
                    <div class="u-error">
                        
                    </div>
                    <label for="password">Password:</label> <br>
                    <input name="password" type="password" id="password">
                    <dir class="p-error"></dir><br>
                    <div class="buttons">
                        <button onclick="formlogin()" type="button" id="submitbtn">Submit</button>
                        <button id="cancelbtn" type="button" onclick="formcancel()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function formlogin() {
           var form = document.querySelector("form[name='form-login']");
           var username = form.elements['username'].value;
           var password = form.elements['password'].value;
           if(username =='' || password ==''){
            alert("Please fill in all fields");
           }
           else{
            form.submit();
           }

        }

        function formcancel() {
            var usr = document.querySelector("#username");
            var pass = document.getElementById("password");
            usr.value = '';
            pass.value = '';
        }

    </script>

</body>

</html>