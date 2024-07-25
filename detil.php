<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

    *{
        margin: 0;
        padding: 0;
    }
    th{
    background-color: #f2f2f2;
   
    }

    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    h1{
        padding-left: 15%;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    table{
        border-collapse: collapse;
        margin-left: auto;
        margin-right: auto;
        width: 85%;
    }
    nav{
        justify-content: space-around;
        background-color: #17202A;
        padding: 15px;
        color: #f2f2f2;
        top: 0;

    }
    footer{
    background-color: #f2f2f2;
    padding: 10px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
    }



    .tengah{
        text-align: center;
    }
    ul{
        list-style-type: none;
        justify-content: flex-end;
        display: flex;
     }  
    
     li{
        padding-left: 13px;
        border-radius: 8px;
        margin-top: -20px;
        padding-right: 13px;
        padding-top: 8px;
        padding-bottom: 8px;
     }
     h2{
        margin-bottom: -10px;
     }

    li:hover{
        background-color: darkorange;
    }

    a{
        text-decoration: none;
        color: #f2f2f2;
    }
    img{
        width: 100px;
    }
</style>
<body>
    <nav>
      <h2>Data Pekerja Minimarket</h2>
            <ul>   
                <a href="tampil.php"><li class="opsi"> Tampil Data</li></a>
                <a href="tambah.php"> <li class="opsi">Tambah Data</li></a>
                <a href="cetak.php"><li class="opsi"> Cetak Data</li></a>
                <a href="detil.php"><li class="opsi"> Detil Data</li></a>
                <a href="halaman.php"><li class="opsi"> Halaman Utama</li></a>
            </ul>
    </nav>

    <h1>Detail Data</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Telepon</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Jam Lembur</th>
                <th>Total Gaji</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Foto</th>
                
            </tr>
        </thead>
       <tbody>
            <?php 
                  include('koneksi.php');
                  $no = 1;
                  $query = mysqli_query($connection,"SELECT * FROM tbl_pekerja");
                  while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                  <td class="tengah"><?php echo $no++ ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td class="tengah"><?php echo $row['tgl_lahir'] ?></td>
                  <td class="tengah"><?php echo $row['no_hp'] ?></td>
                  <td class="tengah"><?php echo $row['jabatan'] ?></td>
                  <td><?php echo $row['gaji'] ?></td>
                  <td class="tengah"><?php echo $row['lembur'] ?></td>
                  <td><?php echo $row['total'] ?></td>
                  <td class="tengah"><?php echo $row['jenis_kelamin'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><img src="foto/<?php echo $row['foto'] ?>" alt=""></td>

              </tr>

            <?php } ?>


       </tbody>
    </table>

    <footer>
        <p>Copyright &copy; 2024</p>
    </footer>
</body>
</html>