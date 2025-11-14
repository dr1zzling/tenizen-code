<?php

require_once 'koneksi.php';
header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // generate OTP 6 digit
    $otp = rand(100000, 999999);

    // cek email
    $check = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {

        $response = [
            'status' => 'error',
            'message' => 'email sudah terdaftar'
        ];

    } else {

        $sql = "INSERT INTO user(username, email, password, otp) 
                VALUES('$username', '$email', '$password', '$otp')";

        if (mysqli_query($conn, $sql)) {

            $response = [
                'status' => 'success',
                'message' => 'user berhasil dibuat',
                'otp' => $otp
            ];

        } else {

            $response = [
                'status' => 'error',
                'message' => 'user gagal dibuat'
            ];
        }
    }

} else {

    $response = [
        'status' => 'error',
        'message' => 'Invalid request'
    ];
}

echo json_encode($response);
