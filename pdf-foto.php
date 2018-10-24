<?php

include("koneksi.php");
session_start();
if(isset($_SESSION['admin'])) {

  if($_GET['file']){

    $sql = "select nidn, foto from kegiatan where id_kegiatan = ".$_GET['file']."";

    $query = mysqli_query($con, $sql);
    $nomer = 1;
    if ($query) {
    
      $data = mysqli_fetch_array($query);
      
      echo "<iframe src='file/pdf_foto/".$data['nidn']."/".$data['foto']."' width=\"100%\" style=\"height:100%\"></iframe>";
    
    } else{
      echo "gaada datanya beb";
    }
      
  } else{
    header("location:404.html");
  }
}
else{
    header("location:masuk.php");
} 

?>