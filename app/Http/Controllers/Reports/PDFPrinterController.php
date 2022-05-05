<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class PDFPrinterController extends Controller
{
    //
	protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function printPDF()
    {
    	$this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->Text(10, 10, "Hello World!");

        $this->fpdf->Output();

        exit;
    }


}
