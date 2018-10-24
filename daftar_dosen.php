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
        <h2 class="text-center">Data Dosen</h2>
      </div>
      <div class="card-body">
      <table id='tablePasien' class='display'>
        <thead>
          <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Institusi </th>
            <th>Fakultas </th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

    
    <?php

    $sql = "select * from dosen";
    $query = mysqli_query($con, $sql);
    $nomer = 1;
    if ($query) {

      while ($data = mysqli_fetch_array($query)) {
        
        echo"
        
              <tr>
                  <td>". $nomer ."</td>
                  <td>". $data['nidn'] ."</td>
                  <td>". $data['nama_dosen'] ."</td>
                  <td>". $data['institusi'] ."</td>
                  <td>". $data['fakultas'] ."</td>
                  <td>". $data['jurusan'] ."</td>
                  <td>". $data['jenis_kelamin'] ."</td>
                  <td>". $data['tanggal_lahir'] ."</td>
                  <td class='text-center'>

                      <a href=edit-data-dosen.php?nidn=".$data['nidn'].">
                        <i class='fa fa-pencil fa-2x'></i>
                      </a>
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