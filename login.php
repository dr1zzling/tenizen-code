<?php

header('Content-type: appication/json');
error_reporting(0);
include 'koneksi.php';
$email = $_POST['email'];
$password = md5($_POST['password']);

//query cek user
$sql = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    echo json_encode(
        value: [
            "status" => "sukses",
            "message" => "siti berhasil", //login berhasil
            "data" => [
                "id" => $user['iduser'],
                "username" => $user ['username'],
                "email" => $user ['email'],
                //password tidak ditampilkan
            ]
        ]
            );
}else {
    echo json_encode(value: [
        "status" => "error",
        "message" => "email atau password salah"
        
    ]);
}

?>