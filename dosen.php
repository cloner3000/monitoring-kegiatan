<?php
include("koneksi.php");
session_start();
if(isset($_SESSION['admin'])) {
    
?>
<html>
<head>
  <!-- KOMPONEN HEAD-->
  <?php include "komponen/komponen-head.php"; ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
  <!-- Navigation-->
  <?php include "komponen/menu.php"; ?>


  <div class="content-wrapper">
    
    <!-- ISI KONTEN -->
    <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center">Pendaftaran Dosen</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="aksi.php?aksi=dosen">
          <div class="form-group">
            <label for="nidn">NIDN</label>
            <input type="text" class="form-control" id="nidn" name="nidn" aria-describedby="emailHelp" placeholder="NIDN" autofocus required>
          </div> 
          <div class="form-group">
            <label for="nama_dosen">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="emailHelp" required>
          </div> 
          <div class="form-group">
            <label for="institusi">Institusi</label>
            <input type="text" class="form-control" id="institusi" name="institusi" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label for="fakultas">Fakultas</label>
            <input type="text" class="form-control" id="fakultas" name="fakultas" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" aria-describedby="emailHelp" required>
          </div>
            <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label><br>

            <label for="laki">Laki-laki</label>
              <input type="radio" id="laki" name="jenis_kelamin" value="Laki - Laki" checked>
            &nbsp;&nbsp;&nbsp;
            <label for="perempuan">Perempuan</label>
              <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan"><br><br>
        </div> 
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" aria-describedby="emailHelp" required>
          </div>
            
          
            
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Simpan</button>

                  
            <!-- Simpan Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda Yakin Akan Menyimpan Data Ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
    </div>
   

    <!-- ISI KONTEN SAMPE SINI-->

    <!-- FOOTER -->
    <?php include "komponen/footer.php" ?>
    <!-- FOOTER SAMPE SINI-->
  </div>



  <!-- KOMPONEN JS -->
  <?php include "komponen/komponen-js.php" ?>
  
  </body>
</html>

<?php
}
else{
    header("location:masuk.php");
}
?>