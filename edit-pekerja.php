<?php 
  
  include('koneksi.php');
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM tbl_pekerja WHERE id_pekerja = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Guru</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT 
            </div>
            <div class="card-body">
              <form action="update-pekerja.php" name="tampil" method="POST" enctype="multipart/form-data">

              
              <div class="form-group">
                <!-- id di hidden kan -->
                <label>Nama Guru</label>
                <input type="hidden" name="id" value="<?php echo $row['id_pekerja'] ?>">

                <!-- input tambah -->
                <div class="input_tambah">
                        <div class="t-nama">
                            <label for="">Nama</label><br>
                            <input type="text" name="nama" id="nama"  value="<?php echo $row['nama'] ?>" required >
                        </div>
                        <!-- input tgl lahir -->
                        <div class="t-nama">
                            <label for="">Tanggal Lahir</label> <br>
                            <input type="date" name="tgl_lahir" id="tgl_lahir"  required> <br>
                        </div>
                        <!-- input no hp -->
                        <div class="t-nama">
                            <label for="">No Hp</label> <br>
                            <input type="number" name="no_hp" id="no_hp" value="<?php echo $row['no_hp'] ?>" required onchange="validNoHP()"> <br>
                        </div>
                        <!-- input jabatan -->
                        <div class="t-nama">
                            <label for="">Jabatan</label><br>
                            <select name="jabatan" id="jabatan" value="<?php echo $row['jabatan'] ?>" onchange="itunggaji()">
                                <option value=""></option>
                                <option value="1">Kepala Toko</option>
                                <option value="2">Bagian gudang</option>
                                <option value="3">Kasir</option>
                            </select>
                        </div>
                        <!-- input gaji pokok -->
                        <div class="t-nama">
                            <label for="">Gaji Pokok</label> <br>
                            <input type="number" name="gaji" id="gaji" value="<?php echo $row['gaji'] ?>" readonly><br>
                        </div>
                        <!-- input lembur -->
                        <div class="t-nama">
                            <label for="">Lama Lembur</label> <br>
                            <input type="number" name="lembur" id="lembur" value="<?php echo $row['lembur'] ?>" onchange="gajipokok()"><br>
                        </div>
                        <!-- input gaji lembur -->
                        <div class="t-nama">
                            <label for="">Total Gaji</label> <br>
                            <input type="number" name="total" id="total" value="<?php echo $row['total'] ?>" readonly><br>
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
                            <textarea name="alamat" id="alamat" value="<?php echo $row['alamat'] ?>" required></textarea> <br>
                        </div>

                        <!-- input file foto -->
                        <div class="t-nama">
                            <label for="">Foto :</label> <br>
                            <input type="file" name="foto" id="foto" required> <br>
                        </div>
                        <!-- tombol submit -->
                            <button type="submit" id="submit">Submit</button>
                    

                            </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      <script stype="text/javascript">
            function itunggaji(){
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