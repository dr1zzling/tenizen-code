<?php 

$server = "localhost";
$user = "root";
$password = "";
$database = "tenizencode";

$conn = mysqli_connect( $server,  $user,  $password,  $database);

if (mysqli_connect_errno()){
    echo "Gagal terhubung ke database: " .mysqli_connect_error();
}

?>