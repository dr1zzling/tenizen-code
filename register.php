<?php 

require_once 'koneksi.php';
if ($_SERVER['REQUSET_METHOD'] == "POST") {

    //mengambil data user dari table user
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = md5($_POST['password']);

    //validasi apakah email nya ada/tidak ada 
    $check = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

    if(mysqli_num_rows( $check) > 0){
        echo "email sudah terdaftar";
    }else{
        $sql = "INSERT INTO user(username, email, password) VALUES('$username', '$email','$password')";
        if(mysqli_query( $conn, $sql)){
            echo "user berhasil dibuat";
        }else {
            echo "user gagal dibuat";
        }
    }

}else {
    echo "Invalid request";
}

?>