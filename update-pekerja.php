<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id     = $_POST['id'];
$nama = $_POST['nama'];
$lahir = $_POST['tgl_lahir'];
$hp = $_POST['no_hp'];
$jabatan = $_POST['jabatan'];
$gaji = $_POST['gaji'];
$lembur = $_POST['lembur'];
$total= $_POST['total'];
$kelamin = $_POST['jenis_kelamin'];
$foto = $_POST['foto'];


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
                    //query update data ke dalam database berdasarkan ID
                    $query = "UPDATE tbl_pekerja 
                            SET  nama = '$nama', 
                                tgl_lahir='$lahir', 
                                no_hp='$hp', 
                                jabatan='$jabatan', 
                                gaji='$gaji', 
                                lembur='$lembur', 
                                total='$total', 
                                jenis_kelamin='$kelamin', 
                                foto='$nama_foto'
                            WHERE id_pekerja = '$id'";

                    //kondisi pengecekan apakah data berhasil diupdate atau tidak
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