<?php
require('../app/views/reports/reports/includes/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
	function Header()
	{
		//Title
		$this->SetFont('Arial','',18);
		$this->Cell(0,6,'Systems Report',0,1,'C');
		$this->Ln(10);
		//Ensure table header is output
		parent::Header();
	}
}

//Connect to database
mysql_connect('localhost','root','');
mysql_select_db('sistema_seguridad_administracion');

$pdf=new PDF();
$pdf->AddPage();
$pdf->AddCol('sis_id_PK',40,'ID','C');
$pdf->AddCol('sis_titulo',40,'Title','C');
$pdf->AddCol('sis_descripcion',80,'Description','C');
$prop=array('HeaderColor'=>array(255,255,255),
			'color1'=>array(255,255,255),
			'color2'=>array(255,255,255),
			'padding'=>2);
$pdf->Table('select sis_id_PK,  sis_titulo, sis_descripcion from sistema order by sis_id_PK limit 0,10',$prop);
$downloadfilename = 'systems';
$pdf->Output('generated/'.$downloadfilename.".pdf"); 
Redirect::to('generated/'.$downloadfilename.".pdf");
?>