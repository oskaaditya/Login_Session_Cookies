<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }

    require 'functions.php';
    $id=$_GET["Id"];
    //var_dump($id);
    $mhs=query("SELECT * FROM mahasiswa WHERE Id=$id")[0];
    //var_dump($mhs[0]["Nama"]);
    //cek apakah button submit sudah ditekan / belum
   if(isset($_POST['submit']))
   {
        if(edit($_POST)>0)
        {
            echo "
            <script>
                alert('Data Berhasil Diperbaharui');
                document.location.href='index.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal Diperbaharui');
                document.location.href='edit.php';
            ";
            echo "<br>";
            echo mysqli_error($conn);
        }
   }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>

        <title>Update Data</title>
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
        <h1><center>Update Data Mahasiswa</h1>
        <div class="container">      
        <table class="table table-grey">
        <thead>
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <li>
                <input type="hidden" name="Id" value="<?= $mhs["Id"] ?>">
                <input type="hidden" name="GambarLama" value="<?= $mhs["Gambar"]; ?>">
            </li>
            <ul>
                <li>
                    <label class="control-label col-sm-2" for="Nama">Nama :</label>
                    <input type="text" name="Nama" id="Nama" value="<?= $mhs["Nama"]; ?>">
                </li>
                <li>
                    <label class="control-label col-sm-2" for="Nim">Nim :</label>
                    <input type="text" name="Nim" id="Nim" required value="<?= $mhs["Nim"]; ?>">
                </li>
                <li>
                    <label class="control-label col-sm-2" for="Email">Email :</label>
                    <input type="text" name="Email" id="Email" required value="<?= $mhs["Email"]; ?>">
                </li>
                <li>
                    <label class="control-label col-sm-2" for="Jurusan">Jurusan :</label>
                    <input type="text" name="Jurusan" id="Jurusan" required value="<?= $mhs["Jurusan"]; ?>">
                </li>
                <li>
                    <label class="control-label col-sm-2" for="Gambar">Gambar :</label>
                    <img src="img/<?= $mhs["Gambar"]; ?>" alt="" height="100" width="100"><br>
                    <input type="file" name="Gambar" id="Gambar">
                </li>
                <li>
                    <button type="submit" name="submit">Update</button>
                </li>
            </ul>
        </form>
    </body>
</html>