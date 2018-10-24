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
        <h2 class="text-center">Kegiatan</h2>
      </div>
      <div class="card-body">
      <form method="POST" action="aksi.php?aksi=kegiatan" enctype="multipart/form-data" >
        <?php
        echo"<input type='hidden' class='form-control' id='nidn' name='nidn' aria-describedby='emailHelp' value='".$_SESSION['admin']."'>";
        ?>
        <div class="form-group">
          <label for="nama_kegiatan">Nama Kegiatan</label>
          <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" aria-describedby="emailHelp" placeholder="Masukan Nama kegiatan" autofocus required>
        </div> 
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="emailHelp" required>
        </div> 
        <div class="form-group">
          <label for="lokasi">Lokasi Kegiatan</label>
          <input type="text" class="form-control" id="lokasi" name="lokasi" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="asal_dana">Asal Dana di Terima</label>
          <input type="text" class="form-control" id="asal_dana" name="asal_dana" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan" aria-describedby="emailHelp" required></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="foto">Foto</label>
            <input type="file" name="pdf_foto" id="pdf_foto" accept="application/pdf" class="form-control">
          </div>
          <div class="form-group col-md-4">
            <label for="foto">Scan Visum</label>
            <input type="file" name="pdf_visum" id="pdf_visum" accept="application/pdf" class="form-control">
          </div>
          <div class="form-group col-md-4">
            <label for="foto">Sertifikat</label>
            <input type="file" name="pdf_sertifikat" id="pdf_sertifikat" accept="application/pdf" class="form-control">
          </div>
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

    <!-- ISI KONTEN SAMPE SINI-->
    </div>
    </div>
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