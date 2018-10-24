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