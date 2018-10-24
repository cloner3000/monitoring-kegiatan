<?php
include("koneksi.php");
session_start();
if(isset($_SESSION['admin'])) {
    
?>
<html>
<head>
  <!-- KOMPONEN HEAD-->
  <?php include "komponen/komponen-head.php"; 
  include "koneksi.php";?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
  <!-- Navigation-->
  <?php include "komponen/menu.php"; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center">Data Kegiatan</h2>
      </div>
      <div class="card-body">
    
      <a href="laporan.php" target="_blank">
        <button class="btn btn-info btn-md float-right mb-5">
          <i class="fa fa-arrow-down"></i>
          Unduh Laporan
        </button>
      </a>

      <table id='tablePasien' class='display'>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Tanggal</th>
            <th>Alamat Kegiatan</th>
            <th>Asal dana</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th>Scan Visum</th>
            <th>Sertifikat</th>
            <th>Ubah</th>
          </tr>
        </thead>
        <tbody>

    
    <?php

    $sql = "select * from kegiatan where nidn = ".$_SESSION['admin']."";
    
    if($_SESSION['admin'] == '0414106701'){
      $sql = "select * from kegiatan";
    }

    $query = mysqli_query($con, $sql);
    $nomer = 1;
    if ($query) {

      while ($data = mysqli_fetch_array($query)) {
        
        echo"
        
              <tr>
                  <td>". $nomer ."</td>
                  <td>". $data['nama_kegiatan'] ."</td>
                  <td>". $data['tanggal'] ."</td>
                  <td>". $data['lokasi'] ."</td>
                  <td>". $data['asal_dana'] ."</td>
                  <td>". $data['keterangan'] ."</td>
                  
                  <td class='text-center'>
                    <a href=pdf-foto.php?file=".$data['id_kegiatan']." target='_blank'>
                      <i class='fa fa-sticky-note-o fa-2x'></i>
                    </a>
                  </td>
                  <td class='text-center'>
                    <a href=pdf-visum.php?file=".$data['id_kegiatan']." target='_blank'>
                      <i class='fa fa-sticky-note-o fa-2x'></i>
                    </a>
                  </td>
                  <td class='text-center'>
                    <a href=pdf-sertifikat.php?file=".$data['id_kegiatan']." target='_blank'>
                      <i class='fa fa-sticky-note-o fa-2x'></i>
                    </a>
                  </td>
                  <td class='text-center'>
                    ";
                    if($_SESSION['admin'] == $data['nidn']){
                      echo"
                      <a href=edit-data-kegiatan.php?id_kegiatan=".$data['id_kegiatan'].">
                        <i class='fa fa-pencil fa-2x'></i>
                      </a>
                      ";
                    }
                      
                    echo"
                  </td>
              </tr>
        ";
        $nomer++;
      }
    
    }
    else{
      echo "eror nich datanya ga muncul";
    }
    
    
    ?>
    
    
        </tbody>
      </table>
    <!-- ISI KONTEN -->
    
    
    

    <!-- ISI KONTEN SAMPE SINI-->
    </div>
    </div>
    </div>
    <!-- FOOTER -->
    <?php include "komponen/footer.php" ?>
    <!-- FOOTER SAMPE SINI-->
  </div>


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

    <!-- KOMPONEN JS -->
  <?php include "komponen/komponen-js.php" ?>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#tablePasien').DataTable();
    } );
  </script>


  </body>
</html>

<?php
}
else{
    header("location:masuk.php");
}
?>