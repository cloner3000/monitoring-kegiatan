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
    <?php

    $sql = "select * from kegiatan where id_kegiatan = ".$_GET['id_kegiatan']."";

    $query = mysqli_query($con, $sql);
    
    if ($query) {

      $data = mysqli_fetch_array($query);
    
    
        echo"
        <div class='container'>
        <div class='card'>
          <div class='card-header'>
            <h2 class='text-center'>Ubah Kegiatan</h2>
          </div>
          <div class='card-body'>
          <form method='POST' action='aksi.php?aksi=edit-kegiatan' enctype='multipart/form-data' >
            
            <input type='hidden' class='form-control' id='id_kegiatan' name='id_kegiatan' value='".$data['id_kegiatan']."'>
            <input type='hidden' class='form-control' id='nidn' name='nidn' value='".$data['nidn']."'>
            
            <div class='form-group'>
              <label for='nama_kegiatan'>Nama Kegiatan</label>
              <input type='text' class='form-control' id='nama_kegiatan' name='nama_kegiatan' aria-describedby='emailHelp' value=".$data['nama_kegiatan']." autofocus required>
            </div> 
            <div class='form-group'>
              <label for='tanggal'>Tanggal</label>
              <input type='date' class='form-control' id='tanggal' name='tanggal' aria-describedby='emailHelp'  value=".$data['tanggal']." required>
            </div> 
            <div class='form-group'>
              <label for='lokasi'>Lokasi Kegiatan</label>
              <input type='text' class='form-control' id='lokasi' name='lokasi' aria-describedby='emailHelp'  value=".$data['lokasi']." required>
            </div>
            <div class='form-group'>
              <label for='asal_dana'>Asal Dana di Terima</label>
              <input type='text' class='form-control' id='asal_dana' name='asal_dana' aria-describedby='emailHelp'  value=".$data['asal_dana']." required>
            </div>
            <div class='form-group'>
              <label for='keterangan'>Keterangan</label>
              <textarea class='form-control' id='keterangan' name='keterangan' aria-describedby='emailHelp' required>".$data['keterangan']."</textarea>
            </div>
            <div class='form-row'>
              <div class='form-group col-md-4'>
                <label for='foto'>Foto</label>
                <input type='file' name='pdf_foto' id='pdf_foto' accept='application/pdf' class='form-control'>
                <p class='mt-2'>".$data['foto']."</p>
              </div>
              <div class='form-group col-md-4'>
                <label for='foto'>Scan Visum</label>
                <input type='file' name='pdf_visum' id='pdf_visum' accept='application/pdf' class='form-control'>
                <p class='mt-2'>".$data['pdf_visum']."</p>
              </div>
              <div class='form-group col-md-4'>
                <label for='foto'>Sertifikat</label>
                <input type='file' name='pdf_sertifikat' id='pdf_sertifikat' accept='application/pdf' class='form-control'>
                <p class='mt-2'>".$data['pdf_sertifikat']."</p>
              </div>
            </div>
            
                    
              <!-- Simpan Modal -->
              <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title' id='exampleModalLabel'>Ubah Kegiatan</h5>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                    <div class='modal-body'>
                      Apakah Anda Yakin Akan Mengubah Data Ini?
                    </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                      <button type='submit' class='btn btn-primary'>Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
          
          <div class='form-row'>
            <div class='form-group col-md-12'>
              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Ubah</button>
              
              <a href='monitoring_kegiatan.php' class='mt-5 ml-3'>Batal</a>

              <button type='button' class='btn btn-danger float-right' data-toggle='modal' data-target='#modalHapus'>Hapus</button>

              
                    
              <!-- Hapus Modal -->
              <div class='modal fade' id='modalHapus' tabindex='-1' role='dialog' aria-labelledby='modalHapuslabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title' id='modalHapuslabel'>Hapus Kegiatan</h5>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                    <div class='modal-body'>
                      Apakah Anda Yakin Akan Menghapus Data Ini?
                    </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                      <a href='aksi.php?aksi=hapus-kegiatan&id_kegiatan=".$data['id_kegiatan']."'><button type='submit' class='btn btn-danger'>Hapus</button></a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>
        </div>
        </div>
        </div>
      ";
      
    }
    ?>

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