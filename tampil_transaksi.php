<?php
require_once('koneksi.php');

header('Content-Type: application/json');

$result = array();

// kalau user minta 1 data berdasarkan id
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE id = '$id'");
} else {
    // kalau tanpa id → ambil semua
    $query = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC");
}

while ($row = mysqli_fetch_assoc($query)) {
    $result[] = $row;
}

echo json_encode(['result' => $result]);
