<?php 
    require_once('koneksi.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $result = array();

    $query = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    echo json_encode(array('result' => $result));
?>