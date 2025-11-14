<?php 
require_once('koneksi.php');
$sql = "SELECT * FROM siswa";
$res = mysqli_query($conn,$sql);
$result = array();

while($row = mysqli_fetch_assoc($res)){
    $foto_path = "upload/" . $row['foto'];
    $foto_base64 = file_exists($foto_path) ? base64_encode(file_get_contents($foto_path)) : "" ;

    $result[] = array(
        "nis" => $row['nis'],
        "name" => $row['name'],
        'gender' => $row['gender'],
        'alamat' => $row['alamat'],
        'tanggallahir' => $row['tanggallahir'],
        'foto' => $foto_base64
    );
};

header('Content-type: application/json');
echo json_encode(array('result' => $result));