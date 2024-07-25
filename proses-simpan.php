<?php

//include koneksi database
include('koneksi.php');

//get data dari form

$nama = $_POST['nama'];
$lahir = $_POST['tgl_lahir'];
$hp = $_POST['no_hp'];
$jabatan = $_POST['jabatan'];
$gaji = $_POST['gaji'];
$lembur = $_POST['lembur'];
$total= $_POST['total'];
$kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];


//proses upload
$nama_foto =$_FILES['foto']['name'];
$explode_foto= explode('.',$nama_foto);
$ekstensi_foto=$explode_foto[1];
$ukuran_foto =$_FILES['foto']['size'];
$tmp_foto =$_FILES['foto']['tmp_name'];
$ekstensi_boleh = array('jpg', 'png', 'jpeg');
$ukuran_boleh = 1028000;
$direktori_foto='foto/';





if(in_array($ekstensi_foto, $ekstensi_boleh)){
    if($ukuran_foto <= $ukuran_boleh){
        // upload
        if(move_uploaded_file($tmp_foto, $direktori_foto . $nama_foto)){
                        
            //query insert data ke dalam database
            $query = "INSERT INTO tbl_pekerja (nama, tgl_lahir, no_hp, jabatan, gaji, lembur, total, jenis_kelamin, alamat, foto) 
            VALUES ('$nama', '$lahir','$hp','$jabatan','$gaji','$lembur','$total','$kelamin','$alamat','$nama_foto')";

             //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
            if($connection->query($query)){
                //redirect ke halaman tampil.php 
                header("location: tampil.php");

            } else {
                //pesan error gagal insert data
                echo "Data Gagal Disimpan!";
            }
         }

        
    } else {
        echo "<script>alert('ukuran file terlalu besar'); window.location='tambah.php'</script>";
    }

}

?>