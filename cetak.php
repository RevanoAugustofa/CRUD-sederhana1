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

    <h1>Cetak Data Pekerja Minimarket</h1>
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

              </tr>

            <?php } ?>


       </tbody>
    </table>

    <footer>
        <p>Copyright &copy; 2024</p>
    </footer>
</body>
</html>

<?php
	include('koneksi.php');
	require 'vendor/autoload.php';
	 
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	 
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	 
	$sheet->setCellValue('A3', 'NO');
	$sheet->setCellValue('B3', 'NAMA ');
	$sheet->setCellValue('C3', 'TANGGAL');
	$sheet->setCellValue('D3', 'TELEPON');
	$sheet->setCellValue('E3', 'JABATAN');
	$sheet->setCellValue('F3', 'GAJI POKOK');
	$sheet->setCellValue('G3', 'JAM LEMBUR');
	$sheet->setCellValue('H3', 'TOTAL GAJI');
	$sheet->setCellValue('I3', 'JENIS KELAMIN');
	$sheet->setCellValue('J3', 'ALAMAT');
	 
	$sql_tampil             = "SELECT * FROM tbl_pekerja
	                            ORDER BY id_pekerja DESC";
	$proses_tampil          = mysqli_query($connection,$sql_tampil);

	$i                    = 4;
	$id                   = 1;

	while($row = mysqli_fetch_array($proses_tampil))
	{
	    $sheet->setCellValue('A'.$i, $id);
		$sheet->setCellValue('B'.$i, $row['nama']);
		$sheet->setCellValue('C'.$i, $row['tgl_lahir']);
		$sheet->setCellValue('D'.$i, $row['no_hp']);
		$sheet->setCellValue('E'.$i, $row['jabatan']);
		$sheet->setCellValue('F'.$i, $row['gaji']);
		$sheet->setCellValue('G'.$i, $row['lembur']);
		$sheet->setCellValue('H'.$i, $row['total']);
		$sheet->setCellValue('I'.$i, $row['jenis_kelamin']);
		$sheet->setCellValue('j'.$i, $row['alamat']);
		$i++; 
		$id++;
	}
	 
	$writer = new Xlsx($spreadsheet);
	$writer->save('Laporan_data.xlsx');
	echo "<script>window.location = 'Laporan_data.xlsx'</script>";

?>