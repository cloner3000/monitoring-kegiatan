
<?php
include "koneksi.php";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <?php
    
    $query = mysqli_query($con, "select nidn, nama_dosen from dosen where nidn = '".$_SESSION['admin']."'");
    $nidn = mysqli_fetch_array($query);

    echo"<p class='judul'>". $nidn['nidn']." - ". $nidn['nama_dosen']."</p>";
    ?>
    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
        <?php 
      
          if($nidn['nidn'] == '0414106701'){
            echo "
              
            <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Pendaftaran Dosen'>
              <a class='nav-link' href='dosen.php'>
                <i class='fa fa-fw fa-user-circle'></i>
                <span class='nav-link-text'>Pendaftaran Dosen</span>
              </a>
            </li>

            <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Data Dosen'>
              <a class='nav-link' href='daftar_dosen.php'>
                <i class='fa fa-fw fa-id-card'></i>
                <span class='nav-link-text'>Data Dosen</span>
              </a>
            </li>
            ";
          }
          
          
        ?>
        
            
        <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Riwayat Kegiatan'>
          <a class='nav-link' href='monitoring_kegiatan.php'>
            <i class='fa fa-fw fa-history'></i>
            <span class='nav-link-text'>Riwayat Kegiatan</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kegiatan">
          <a class="nav-link" href="kegiatan.php">
            <i class="fa fa-fw fa-map-marker"></i>
            <span class="nav-link-text">Kegiatan</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
        </li>  -->
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#modalLogout">
            <i class="fa fa-fw fa-sign-out"></i>Keluar</a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Logout Modal-->
    <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Keluar Panel Admin</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Apakah Anda Yakin Akan Keluar Dari Panel Admin Ini?.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-danger" href="aksi.php?aksi=keluar_admin">Keluar</a>
          </div>
        </div>
      </div>
    </div>