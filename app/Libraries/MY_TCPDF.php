<?php

namespace App\Libraries;

use TCPDF;

class MY_TCPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = ROOTPATH . 'public/assets/images/asmamii.png';
        /**
         * width : 50
         */
        $this->Image($image_file, '', '', 22);
        // Set font
        $this->SetFont('helvetica', 'B', 11);
        $this->SetX(20);
        $this->Cell(0, 5, 'ASOSIASI MAKANAN DAN MINUMAN', 0, 1, 'C', 0, '', 0);
        $this->SetFont('helvetica', 'B', 10);
        $this->SetX(20);
        $this->Cell(0, 5, 'KOTA BONTANG', 0, 1, 'C', 0, '', 0);
        // Title
        $this->SetFont('helvetica', '', 9);
        $this->SetX(20);
        $this->Cell(0, 5, 'JL. D.I. Panjaitan Gg. Piano 8 RT. 02 NO. 09', 0, 1, 'C', 0, '', 0);
        $this->SetX(20);
        $this->Cell(0, 5, 'Telp. 08125808409', 0, 1, 'C', 0, '', 0);

        // QRCODE,H : QR-CODE Best error correction
        // $this->write2DBarcode('https://sobatcdoing.com', 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');

        $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(15, 30, 195, 30, $style);
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
