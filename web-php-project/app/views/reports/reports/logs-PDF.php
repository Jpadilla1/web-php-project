<?php
require('../app/views/reports/reports/includes/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Logs Report',0,1,'C');
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

$pdf->AddCol('usu_id_PK_FK',30,'ID','C');
$pdf->AddCol('vit_codigo',30,'Code','C');
$pdf->AddCol('vit_nemonic',30,'Nemonic','C');
$pdf->AddCol('vit_accion',80,'Action','C');
$pdf->AddCol('vit_fecha',30,'Date','C');
$prop=array('HeaderColor'=>array(255,255,255),
			'color1'=>array(255,255,255),
			'color2'=>array(255,255,255),
			'padding'=>2);
$pdf->Table('select usu_id_PK_FK, vit_codigo, vit_nemonic, vit_accion, vit_fecha from vitacora order by usu_id_PK_FK limit 0,10',$prop);
$downloadfilename = 'logs';
$pdf->Output('generated/'.$downloadfilename.".pdf"); 
Redirect::to('generated/'.$downloadfilename.".pdf");
?>