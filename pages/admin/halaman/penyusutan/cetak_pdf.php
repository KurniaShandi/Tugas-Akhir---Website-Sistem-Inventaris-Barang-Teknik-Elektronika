<?php

require "../../../../library/fpdf/fpdf.php";
require "../../../../config/koneksi.php";

class myPDF extends FPDF {
    function header(){
        $this->SetTitle('Laporan Penyusutan', true);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(276, 5, 'Laporan Penyusutan Inventaris Barang', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 16);
        $this->Cell(276, 10, 'Depertement Teknik Elektronika', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(276, 10, 
                'Dari Tanggal : '.date('d, M Y', strtotime($_POST['dari_tanggal'])).' - '.date('d, M Y', strtotime($_POST['sampai_tanggal'])).''
                , 0, 0, 'L');
        $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Halaman '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    function headerTable(){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20, 10, 'No.', 1, 0, 'C');
        $this->Cell(20, 10, 'Kode', 1, 0, 'C');
        $this->Cell(60, 10, 'Tanggal Penyusutan', 1, 0, 'C');
        $this->Cell(60, 10, 'Jumlah Penyusutan', 1, 0, 'C');
        $this->Cell(60, 10, 'Keterangan Penyusutan', 1, 0, 'C');
        $this->Cell(60, 10, 'Kode Barang', 1, 0, 'C');
        $this->Ln();
    }

    function viewTable($koneksi){
        $this->SetFont('Times', '', 12);

        $nomor = 1;
        if (isset($_POST['cetak_pdf'])) {
            $dari = $_POST['dari_tanggal'];
            $sampai = $_POST['sampai_tanggal'];

            $sql = "SELECT * FROM penyusutan WHERE tglSusut BETWEEN '$dari' AND '$sampai'
            ORDER BY id ASC ";
            $query = mysqli_query($koneksi, $sql);
        }
        $total = 0;
        while ($data = mysqli_fetch_array($query)) {
            $this->Cell(20, 10, $nomor++, 1, 0, 'C');
            $this->Cell(20, 10, $data['id'], 1, 0, 'C');
            $this->Cell(60, 10, $data['tglSusut'], 1, 0, 'C');
            $this->Cell(60, 10, $data['jmlSusut'], 1, 0, 'C');
            $this->Cell(60, 10, $data['ketSusut'], 1, 0, 'C');
            $this->Cell(60, 10, $data['kdBarang'], 1, 0, 'C');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($koneksi);
$pdf->Output('I', 'Laporan Peminjaman ' . date('d, M Y', strtotime($_POST['dari_tanggal'])) . ' - ' . date('d, M Y', strtotime($_POST['sampai_tanggal'])) . '.pdf');


?>