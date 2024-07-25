<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tbl_pekerja WHERE id_pekerja= '$id'";

if($connection->query($query)) {
    header("location: tampil.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>