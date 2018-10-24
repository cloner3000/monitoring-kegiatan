<?php
require('fpdf.php');

session_start();
class PDF extends FPDF{
  function Header()
  {
      // Select Arial bold 15
      $this->SetFont('Arial','B',18);
      // Move to the right
      $this->Cell(40);
      // Framed title
      $this->Cell(200,10,'Laporan Kegiatan',0,0,'C');
      // Line break
      $this->Ln(20);
  }

  // Load data
  function LoadData()
  {
    include("koneksi.php");


    $data = array();

    $sql = "select *, dosen.nama_dosen from kegiatan 
            INNER JOIN dosen ON kegiatan.nidn = dosen.nidn 
            where nidn = ".$_SESSION['admin']."";
    if($_SESSION['admin'] == '0414106701'){
      $sql = "select *, dosen.nama_dosen from kegiatan 
              INNER JOIN dosen ON kegiatan.nidn = dosen.nidn ";
    }

    $query = mysqli_query($con, $sql);
    $nomer = 1;
    if ($query) {

      while ($d = mysqli_fetch_array($query)) {
        $r = $nomer . ";" . $d['nidn'] . ";" . $d['nama_dosen'] . ";" . $d['nama_kegiatan'] . ";" . $d['tanggal'] . ";" . $d['lokasi'] . ";" . $d['asal_dana'] . ";" . $d['keterangan'];
        $data[] = explode(';',$r);
        $nomer++;
      }
      
      return $data;
    }
  }
  
  // Colored table
  function FancyTable($header, $data)
  {
      // Colors, line width and bold font
      $this->SetFillColor(46, 49, 49);
      $this->SetTextColor(255);
      $this->SetDrawColor(228, 233, 237);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');
      $this->Cell(1);
      // Header
      $w = array(7, 25, 55, 50, 20, 45, 35, 45);
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i], 1 ,0,'C',true);
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = false;
      foreach($data as $row)
      {
          $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
          $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
          $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
          $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
          $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
          $this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
          $this->Cell($w[6],6,$row[6],'LR',0,'L',$fill);
          $this->MultiCell( $w[7], 6, $row[7],'LR', 'L', $fill);
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
}

$pdf = new PDF();
// Column headings
$header = array('No', 'NIDN', 'Nama Dosen', 'Nama Kegiatan', 'Tanggal', 'Alamat Kegiatan', 'Asal Dana', 'Keterangan');
// Data loading
$data = $pdf->LoadData();

$pdf->SetFont('Arial','',9);
$pdf->AddPage('L', 'A4');
$pdf->FancyTable($header,$data);
$pdf->Output('I', 'Laporan-Kegiatan.pdf');
?>