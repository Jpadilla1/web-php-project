<?php
require('../app/views/reports/reports/includes/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
	function Header()
	{
		//Title
		$this->SetFont('Arial','',18);
		$this->Cell(0,6,'Category Report',0,1,'C');
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
$pdf->AddCol('cat_id_PK',40,'ID','C');
$pdf->AddCol('cat_titulo',40,'Title','C');
$pdf->AddCol('cat_descripcion',80,'Description','C');
$prop=array('HeaderColor'=>array(255,255,255),
			'color1'=>array(255,255,255),
			'color2'=>array(255,255,255),
			'padding'=>2);
$pdf->Table('select cat_id_PK, cat_titulo, cat_descripcion from categoria order by cat_id_PK limit 0,10',$prop);
$downloadfilename = 'categories';
$pdf->Output('generated/'.$downloadfilename.".pdf"); 
Redirect::to('generated/'.$downloadfilename.".pdf");
?>