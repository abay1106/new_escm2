<?php

    // require_once('tcpdf/config/lang/eng.php');
    require_once('tcpdf/tcpdf.php');


    class pdf_helper extends TCPDF {

        //Page header
        public function Header() {
            // Logo
            $image_file = FCPATH.'assets/img/logopdf.png';
            $this->setJPEGQuality(90);
            $this->Image($image_file, 120, 0, 200, 28, 'PNG', '', 'T', true, 300, 'C', false, false, 0, false, false, false);
            // $this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP-30, PDF_MARGIN_RIGHT);
            // Set font
            $this->SetFont('helvetica', 'B', 20);
            // Title
            // $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');

        }
        
       
     
    }