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
    if($_SESSION['admin'] == '0414106701'){
      $sql = "select * from dosen where nidn = ".$_GET['nidn']."";

      $query = mysqli_query($con, $sql);
      
      if ($query) {

        $data = mysqli_fetch_array($query);
        
        function checkLaki($jenkel){
          $check = '';
          if($jenkel === 'Laki - Laki'){
            $check = 'checked';
          }
          return $check;
        }
        function checkPerempuan($jenkel){
          $check = '';
          if($jenkel === 'Perempuan'){
            $check = 'checked';
          }
          return $check;
        }
        
          echo"
          <div class='container'>
          <div class='card'>
            <div class='card-header'>
              <h2 class='text-center'>Ubah Kegiatan</h2>
            </div>
            <div class='card-body'>
              <form method='POST' action='aksi.php?aksi=edit-dosen'>
                <div class='form-group'>
                  <label for='nidn'>NIDN</label>
                  <input type='text' class='form-control' id='nidn' name='nidn' aria-describedby='emailHelp' placeholder='NIDN' required readonly value='".$data['nidn']."'>
                </div> 
                <div class='form-group'>
                  <label for='nama_dosen'>Nama Dosen</label>
                  <input type='text' class='form-control' id='nama_dosen' name='nama_dosen' aria-describedby='emailHelp' autofocus required value='".$data['nama_dosen']."'>
                </div> 
                <div class='form-group'>
                  <label for='institusi'>Institusi</label>
                  <input type='text' class='form-control' id='institusi' name='institusi' aria-describedby='emailHelp' required value='".$data['institusi']."'>
                </div>
                <div class='form-group'>
                  <label for='fakultas'>Fakultas</label>
                  <input type='text' class='form-control' id='fakultas' name='fakultas' aria-describedby='emailHelp' required value='".$data['fakultas']."'>
                </div>
                <div class='form-group'>
                  <label for='jurusan'>Jurusan</label>
                  <input type='text' class='form-control' id='jurusan' name='jurusan' aria-describedby='emailHelp' required value='".$data['jurusan']."'>
                </div>
                  <div class='form-group'>
                  <label for='jenis_kelamin'>Jenis Kelamin</label><br>

                    <label for='laki'>Laki-laki</label>
                      <input type='radio' id='laki' name='jenis_kelamin' value='Laki - Laki' ".checkLaki($data['jenis_kelamin']).">
                    &nbsp;&nbsp;&nbsp;
                    <label for='perempuan'>Perempuan</label>
                      <input type='radio' id='perempuan' name='jenis_kelamin' value='Perempuan' ".checkPerempuan($data['jenis_kelamin'])."><br><br>
                </div> 
                <div class='form-group'>
                  <label for='tanggal_lahir'>Tanggal Lahir</label>
                  <input type='date' class='form-control' id='tanggal_lahir' name='tanggal_lahir' aria-describedby='emailHelp' required value='".$data['tanggal_lahir']."'>
                </div>
                  
                
                        
                  <!-- Simpan Modal -->
                  <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLabel'>Ubah Data Dosen</h5>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <div class='modal-body'>
                          Apakah Anda Yakin Akan Mengubah Data Ini?
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                          <button type='submit' class='btn btn-primary'>Ubah</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            
            <div class='form-row'>
              <div class='form-group col-md-12'>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Ubah</button>
                
                <a href='daftar_dosen.php' class='mt-5 ml-3'>Batal</a>
              ";
              if($data['nidn'] != '0414106701'){
                echo"
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
                          <a href='aksi.php?aksi=hapus-dosen&nidn=".$data['nidn']."'><button type='submit' class='btn btn-danger'>Hapus</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  ";
                }
                echo"

              </div>
            </div>
            
          </div>
          </div>
          </div>
        ";
        
      }
    }
    else{
      echo"Mohon Akses Halaman Data Dosen Terlebih Dahulu";
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