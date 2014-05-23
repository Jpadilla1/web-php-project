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
$pdf->AddCol('usu_id_PK',25,'ID','C');
$pdf->AddCol('usu_username',40,'Username','C');
$pdf->AddCol('usu_nombre',30,'Name','C');
$pdf->AddCol('usu_last_login',30,'Last Login','C');
$pdf->AddCol('usu_fecha_creacion',30,'Creation Date','C');
$pdf->AddCol('sis_titulo',30,'System','C');
$prop=array('HeaderColor'=>array(255,255,255),
			'color1'=>array(255,255,255),
			'color2'=>array(255,255,255),
			'padding'=>2);
$pdf->Table('select u.usu_id_PK, u.usu_username, u.usu_nombre, u.usu_last_login, u.usu_fecha_creacion, s.sis_titulo from usuario u, sistema s, asignado a where u.usu_id_PK = a.usu_id_PK and a.sis_id_PK = s.sis_id_PK order by s.sis_titulo limit 0,10' ,$prop);
$downloadfilename = 'users-by-system';
$pdf->Output('generated/'.$downloadfilename.".pdf"); 
Redirect::to('generated/'.$downloadfilename.".pdf");
?>