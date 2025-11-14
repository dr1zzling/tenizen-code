<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $tanggallahir = $_POST['tanggallahir'];
    $foto_base64 = $_POST['foto'];
    
    $imageData = base64_decode($foto_base64);
    $namafile = $nis . "_siswa.jpg";
    $filePath = "upload/" . $namafile;

    if(file_put_contents($filePath, $imageData)){
        require_once('koneksi.php');

        $sql = "INSERT INTO siswa(nis, name, gender, tanggallahir, foto)
        VALUES('$nis', '$name', '$gender', '$alamat', '$tanggallahir', '$namafile')";

        if(mysqli_query($conn, $sql)){
            echo "berhasil menyimpan data";
        }else{
            echo"gagal menyimpan data: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }else {
        echo "gagal menyimpan foto";
    }

}

?>