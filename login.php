<?php
    session_start();

    if(isset($_COOKIE["Id"]) && isset($_COOKIE["username"]))
    {
        $Id = $_COOKIE["Id"];
        $key= $_COOKIE["key"];

        $result = mysqli_query($conn,"SELECT username FROM user WHERE Id=$Id");
        $row=mysqli_fetch_assoc($result);

        if($key === hash("sha256",$row["username"]))
        {
            $_SESSION["login"]=true;
        }
    }
    require 'functions.php';

    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
        
        if(mysqli_num_rows($result)===1)
        {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row["password"]))
            {
                $_SESSION["login"]=true;

                if(isset($_POST["remember"]))
                {
                    setcookie("Id",$row["Id"],time()+60);
                    setcookie("key",hash(sha256,$row["username"]),time()+60);
                }

                header("Location:index.php");
                exit;
            }
        }
        $error=true;
    }
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <title>Form Login</title>
        <style>
            label{
                display:block;
            }
        </style>
    </head>
    <body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Halaman Utama</a>
         </li>
        <li class="nav-item">
            <a class="nav-link" href="./tambah_data.php">Tambah Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./registrasi.php">Registrasi</a>
        </li>
    </ul>
    <h1><center>Log In</h1>
            
        <?php if(isset($error)):?>
            <p style="color:red;font-style=bold">
            Username dan Password Salah</p>
        <?php endif?>

    <div class="container">      
    <table class="table table-grey">
    <thead>
    <form action="" method="post">
    <ul>
        <li>
            <label class="control-label col-sm-2" for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label class="control-label col-sm-2" for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label class="control-label col-sm-2" for="remember">Remember Me</label>
        </li>
        <br>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
    </form>
    </body>
</html>