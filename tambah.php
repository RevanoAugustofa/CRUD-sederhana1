<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <!-- judul -->
        <div class="title">Tambah Data</div>
    <form method="post" action="proses-simpan.php" name="tampil" enctype="multipart/form-data">
        <!-- input tambah -->
        <div class="input_tambah">
            <div class="t-nama">
                <label for="">Nama</label><br>
                <input type="text" name="nama" id="nama" required >
            </div>
            <!-- input tgl lahir -->
            <div class="t-nama">
                <label for="">Tanggal Lahir</label> <br>
                <input type="date" name="tgl_lahir" id="tgl_lahir" required> <br>
            </div>
            <!-- input no hp -->
            <div class="t-nama">
                <label for="">No Hp</label> <br>
                <input type="number" name="no_hp" id="no_hp" required onchange="validNoHP()"> <br>
            </div>
            <!-- input jabatan -->
            <div class="t-nama">
                <label for="">Jabatan</label><br>
                <select name="jabatan" id="jabatan" onchange="hitunggaji()">
                    <option value=""></option>
                    <option value="1">Kepala Toko</option>
                    <option value="2">Bagian gudang</option>
                    <option value="3">Kasir</option>
                </select>
            </div>
            <!-- input gaji pokok -->
            <div class="t-nama">
                <label for="">Gaji Pokok</label> <br>
                <input type="number" name="gaji" id="gaji" readonly><br>
            </div>
            <!-- input lembur -->
            <div class="t-nama">
                <label for="">Lama Lembur</label> <br>
                <input type="number" name="lembur" id="lembur" onchange="gajipokok()"><br>
            </div>
            <!-- input gaji lembur -->
            <div class="t-nama">
                <label for="">Total Gaji</label> <br>
                <input type="number" name="total" id="total" readonly><br>
            </div>
            <!-- input jenis kelamin -->
            <div class="t-nama">
                <label for="">Jenis Kelamin</label><br>
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki">
                <label for="">Laki-laki</label><br>
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                <label for="">Perempuan</label><br>
            </div>
            <!-- input alamat -->
            <div class="t-nama">
                <label for="">Alamat :</label> <br>
                <textarea name="alamat" id="alamat" required></textarea> <br>
            </div>

            <!-- input file foto -->
            <div class="t-nama">
                <label for="">Foto :</label> <br>
                <input type="file" name="foto" id="foto" required> <br>
                <p class="peringatan">*Ukuran foto/file max 4Mb</p>
            </div>
            <!-- tombol submit -->
                <button type="submit" id="submit">Submit</button>
         

        </div>
    </form>
</div>

    <script stype="text/javascript">
        function hitunggaji(){
            var jbt = parseInt(document.tampil.jabatan.value);
            var gaji2 = 0;
       
        if(jbt == 1){
            gaji2 = 4000000;
        }else if(jbt == 2){
            gaji2 = 3000000;
        }else{
            gaji2 = 2000000;
        }
        document.tampil.gaji.value = gaji2;

    }
        function gajipokok() {
        var lamalembur = parseInt(document.tampil.lembur.value);
		var gaji2 = parseInt(document.tampil.gaji.value);

        var totalgaji = lamalembur * 12000   + gaji2 ;

		document.tampil.total.value = totalgaji;
	}


    function validNoHP(){
        var surel = document.tampil.no_hp.value;
        if (surel.length!=12){
        window.alert("Masukkan 12 angka ");
    }
    }
    </script>
    
</body>

</html>