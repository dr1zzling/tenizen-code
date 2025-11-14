<?php

header('Content-Type: application/json');
include 'koneksi.php';
error_reporting(0);

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    echo json_encode([
        "status" => "sukses",
        "message" => "login berhasil",
        "data" => [
            "id" => $user['id'],
            "username" => $user['username'],
            "email" => $user['email']
        ]
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "email atau password salah"
    ]);
}

?>
