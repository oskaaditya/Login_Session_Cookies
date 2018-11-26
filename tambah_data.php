<?php
   session_start();
   if(!isset($_SESSION["login"]))
   {
       echo $_SESSION["login"];
       header("Location:login.php");
       exit;
   }
    require 'functions.php';

    if(isset($_POST['submit']))
    {
        //var_dump($_POST);
        //var_dump($_FILES);
        //die();

        if(tambah($_POST)>0)
        {
            echo "
            <script>
                alert('Data Berhasil Disimpan');
                document.location.href='index.php';
            </script>

            ";
        }else{
            echo "
            <script>
                alert('Data Gagal Disimpan');
                document.location.href='tambah_data.php';
            </script>";
            echo "<br>";
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
    <title>Tambah Data</title>
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
    <h1><center>Tambah Data Mahasiswa</h1>
    <div class="container">      
    <table class="table table-grey">
    <thead>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label class="control-label col-sm-2" for="Nama">Nama</label>
            <input type="text" name="Nama" id="Nama">
        </li>
        <li>
            <label class="control-label col-sm-2" for="Nim">Nim</label>
            <input type="text" name="Nim" id="Nim" required>
        </li>
        <li>
            <label class="control-label col-sm-2" for="Email">Email</label>
            <input type="text" name="Email" id="Email" required>
        </li>
        <li>
            <label class="control-label col-sm-2" for="Jurusan">Jurusan</label>
            <input type="text" name="Jurusan" id="Jurusan" required>
        </li>
        <li>
            <label class="control-label col-sm-2" for="Gambar">Gambar</label>
            <input type="file" name="Gambar" id="Gambar" required>
        </li>
        <li>
            <button type="submit" name="submit">Tambah</button>
        </li>
    </ul>
    </form>
</body>
</html>