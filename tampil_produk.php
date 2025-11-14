<?php
require_once('koneksi.php');

header('Content-Type: application/json');

$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY idproduk DESC");

$result = array();

while ($row = mysqli_fetch_assoc($query)) {
    $result[] = $row;
}

echo json_encode(['result' => $result]);
