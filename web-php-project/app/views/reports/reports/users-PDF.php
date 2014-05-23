<?php
require('../app/views/reports/reports/includes/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
	function Header()
	{
		//Title
		$this->SetFont('Arial','',18);
		$this->Cell(0,6,'User Report',0,1,'C');
		$this->Ln(10);
		//Ensure table header is output
		parent::Header();
	}
}

//Connect to database
mysql_connect('localhost:3306','root','');
mysql_select_db('sistema_seguridad_administracion');

$pdf=new PDF();
$pdf->AddPage();
$pdf->AddCol('usu_id_PK',40,'ID','C');
$pdf->AddCol('usu_username',40,'Username','C');
$pdf->AddCol('usu_nombre',40,'Name','C');
$pdf->AddCol('usu_last_login',40,'Last Login','C');
$pdf->AddCol('usu_fecha_creacion',40,'Creation Date','C');
$prop=array('HeaderColor'=>array(255,255,255),
			'color1'=>array(255,255,255),
			'color2'=>array(255,255,255),
			'padding'=>2);
$pdf->Table('select usu_id_PK, usu_username, usu_nombre,usu_last_login,usu_fecha_creacion from usuario order by '. $data['orderby'] .' limit 0,10' ,$prop);
$downloadfilename = 'users';
$pdf->Output('generated/'.$downloadfilename.".pdf"); 
Redirect::to('generated/'.$downloadfilename.".pdf");
?>