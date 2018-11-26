<?php
    //Buat Koneksi
    $conn=mysqli_connect("localhost","root","","phpdatabase");

    if(isset($_POST['submit']))
    {
        //Ambil data dari Form
        $nama=$_POST["Nama"];
        $nim=$_POST["Nim"];
        $email=$_POST["Email"];
        $jurusan=$_POST["Jurusan"];
        $gambar=$_POST["Gambar"];

        //Query insert data
        $query= "INSERT INTO mahasiswa VALUES
                ('','$nama','$nim','$email','$jurusan','$gambar')";
        mysqli_query($conn,$query);

        //Cek Status Data
        //var_dump(mysqli_affected_rows($conn));
        if(mysqli_affected_rows($conn) > 0)
        {
            echo "Data Berhasil Disimpan";
        }
        else
        {
            echo "Gagal!";
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
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post">
    <ul>
        <li>
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" id="Nama">
        </li>
        <li>
            <label for="NIM">NIM</label>
            <input type="text" name="NIM" id="NIM">
        </li>
        <li>
            <label for="Email">Email</label>
            <input type="text" name="Email" id="Email">
        </li>
        <li>
            <label for="Jurusan">Jurusan</label>
            <input type="text" name="Jurusan" id="Jurusan">
        </li>
        <li>
            <label for="Gambar">Gambar</label>
            <input type="text" name="Gambar" id="Gambar">
        </li>
        <li>
            <button type="submit" name="submit">Tambah</button>
        </li>
    </ul>
    </form>
</body>
</html>