<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }
    
    require 'functions.php';

    if(isset($_POST['register']))
    {
        if(registrasi($_POST)>0)
        {
            echo"
            <script>
                alert('User Berhasil Ditambahkan');
            </script>
            ";
        }else
        {
            echo mysqli_error($conn);
        }
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
        <title>Form Registrasi</title>
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
    <h1><center>Halaman Registrasi</h1>
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
            <label class="control-label col-sm-2" for="password2">Konfirmasi Password :</label>
            <input type="password" name="password2" id="password2" required>
        </li>
        <li>
            <button type="submit" name="register">Registrasi</button>
        </li>
    </ul>
    </form>
    </body>
</html>