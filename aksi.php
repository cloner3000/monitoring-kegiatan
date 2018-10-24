<?php
include "koneksi.php";

switch($_GET['aksi']){
  
    case"masuk_admin":
    session_start();
		require_once("koneksi.php");
		$user = mysqli_real_escape_string($con, $_POST['nidn']);
		$pass = mysqli_real_escape_string($con, md5(md5($_POST['password'])));  
		$cekuser = mysqli_query($con, "SELECT * FROM dosen WHERE nidn = '$user'");
		$jumlah = mysqli_num_rows($cekuser);
		$hasil = mysqli_fetch_array($cekuser);  
		if($jumlah == 0) {

            header('location:masuk.php');
            
        } else {
            if($pass <> $hasil['password']) {
                header('location:masuk.php');
                
            } else {
                
                $_SESSION['admin'] = "$user";
                header('location:index.php');    
                
                
            }	
		}	
	break;
        
	case"keluar_admin":
		session_start();
		unset($_SESSION['admin']);
		header("location:masuk.php");
	break;

  case"kegiatan":
        
  $nidn = $_POST['nidn'];
  $nama_kegiatan = $_POST['nama_kegiatan'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];
  $asal_dana = $_POST['asal_dana'];
  $keterangan = $_POST['keterangan'];
  
  $dirFoto="file/pdf_foto/".$nidn."/";
  $namaFoto=$_FILES['pdf_foto']['name'];
  $tempFoto=$_FILES['pdf_foto']['tmp_name'];
  move_uploaded_file($tempFoto,$dirFoto.$namaFoto);
  
  $dirVisum="file/pdf_visum/".$nidn."/";
  $namaVisum=$_FILES['pdf_visum']['name'];
  $tempVisum=$_FILES['pdf_visum']['tmp_name'];
  move_uploaded_file($tempVisum,$dirVisum.$namaVisum);
  
  $dirSertifikat="file/pdf_sertifikat/".$nidn."/";
  $namaSertifikat=$_FILES['pdf_sertifikat']['name'];
  $tempSertifikat=$_FILES['pdf_sertifikat']['tmp_name'];
  move_uploaded_file($tempSertifikat,$dirSertifikat.$namaSertifikat);

mysqli_query($con, "insert into kegiatan values(
  '',
  '$nidn',
  '$nama_kegiatan',
  '$tanggal',
  '$lokasi',
  '$asal_dana',
  '$keterangan',
  '$namaFoto',
  '$namaVisum',
  '$namaSertifikat'
  )")
or die(mysqli_error($con));
  
  
header("location:monitoring_kegiatan.php");
  

break;

case"dummy-data-kegiatan":
  for($i=0; $i<15; $i++){
    
    mysqli_query($con, "insert into kegiatan values(
      '',
      '00000033',
      'nama_kegiatan',
      '10/10/2010',
      'lokasi',
      'asal_dana',
      'keterangan',
      'namaFoto',
      'namaVisum',
      'namaSertifikat'
      )")
    or die(mysqli_error($con));
    
  }
break;
        
case"edit-kegiatan":
        
  $id_kegiatan = $_POST['id_kegiatan'];
  $nidn = $_POST['nidn'];
  $nama_kegiatan = $_POST['nama_kegiatan'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];
  $asal_dana = $_POST['asal_dana'];
  $keterangan = $_POST['keterangan'];
      
    $sql = "update kegiatan set 
            nama_kegiatan = '".$nama_kegiatan."',
            tanggal = '".$tanggal."',
            lokasi = '".$lokasi."',
            asal_dana = '".$asal_dana."',
            keterangan = '".$keterangan."'
            where id_kegiatan = '".$id_kegiatan."'";
    
    mysqli_query($con, $sql) 
    or die(mysqli_error($con));

    
  
  $dirFoto="file/pdf_foto/".$nidn."/";
  $namaFoto=$_FILES['pdf_foto']['name'];
  $tempFoto=$_FILES['pdf_foto']['tmp_name'];
  
  $dirVisum="file/pdf_visum/".$nidn."/";
  $namaVisum=$_FILES['pdf_visum']['name'];
  $tempVisum=$_FILES['pdf_visum']['tmp_name'];
  
  $dirSertifikat="file/pdf_sertifikat/".$nidn."/";
  $namaSertifikat=$_FILES['pdf_sertifikat']['name'];
  $tempSertifikat=$_FILES['pdf_sertifikat']['tmp_name'];
    
		if(!empty($namaFoto)){
      
      $sql = "update kegiatan set 
              foto = '".$namaFoto."'
              where id_kegiatan = '".$id_kegiatan."'";
      
      mysqli_query($con, $sql) 
      or die(mysqli_error($con));

      move_uploaded_file($tempFoto,$dirFoto.$namaFoto);
    }
    
		if(!empty($namaVisum)){
      
      $sql = "update kegiatan set 
              pdf_visum = '".$namaVisum."'
              where id_kegiatan = '".$id_kegiatan."'";
      
      mysqli_query($con, $sql) 
      or die(mysqli_error($con));

      move_uploaded_file($tempVisum,$dirVisum.$namaVisum);
    }
    
		if(!empty($namaSertifikat)){
      
      $sql = "update kegiatan set 
              pdf_sertifikat = '".$namaSertifikat."'
              where id_kegiatan = '".$id_kegiatan."'";
      
      mysqli_query($con, $sql) 
      or die(mysqli_error($con));

      move_uploaded_file($tempSertifikat,$dirSertifikat.$namaSertifikat);
    }
  
    
header("location:monitoring_kegiatan.php");
    
  
break;
        
case"hapus-kegiatan":
    
    $id_kegiatan = $_GET["id_kegiatan"];
    mysqli_query($con, "delete from kegiatan where id_kegiatan = $id_kegiatan") or die(mysqli_error($con));
    
    header("location:monitoring_kegiatan.php");
break;

case"dosen":
        
  $nidn = $_POST['nidn'];
  $nama_dosen = $_POST['nama_dosen'];
  $institusi = $_POST['institusi'];
  $fakultas = $_POST['fakultas'];
  $jurusan = $_POST['jurusan'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $password = mysqli_real_escape_string($con, md5(md5('admin123')));

  $folderfoto = "file/pdf_foto/".$nidn;
  $foldersertifikat = "file/pdf_sertifikat/".$nidn;
  $foldervisum = "file/pdf_visum/".$nidn;

  mkdir($folderfoto, 0777, true);
  mkdir($foldersertifikat, 0777, true);
  mkdir($foldervisum, 0777, true);

  mysqli_query($con, "insert into dosen values(

    '$nidn',
    '$nama_dosen',
    '$institusi',
    '$fakultas',
    '$jurusan',
    '$jenis_kelamin',
    '$tanggal_lahir',
    '$password'
    )")
  or die(mysqli_error($con));
    
    
  header("location:daftar_dosen.php");
  

break;

case"edit-dosen":
  
  $nidn = $_POST['nidn'];
  $nama_dosen = $_POST['nama_dosen'];
  $institusi = $_POST['institusi'];
  $fakultas = $_POST['fakultas'];
  $jurusan = $_POST['jurusan'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tanggal_lahir = $_POST['tanggal_lahir'];

  $sql = "update dosen set 
          nama_dosen = '".$nama_dosen."',
          institusi = '".$institusi."',
          fakultas = '".$fakultas."',
          jurusan = '".$jurusan."',
          jenis_kelamin = '".$jenis_kelamin."',
          tanggal_lahir = '".$tanggal_lahir."'
          where nidn = '".$nidn."'";
  
  mysqli_query($con, $sql) 
  or die(mysqli_error($con));

  header("location:daftar_dosen.php");
break;

case"hapus-dosen":
  $nidn = $_GET["nidn"];
  mysqli_query($con, "delete from dosen where nidn = $nidn") or die(mysqli_error($con));

  header("location:daftar_dosen.php");
  
break;

}


?>