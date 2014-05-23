<?php

 $con=mysql_connect("localhost","root","");
 $db_found = mysql_select_db("sistema_seguridad_administracion");

//create query to select as data from your table
$select = "select u.usu_id_PK, u.usu_username, u.usu_nombre, u.usu_last_login, u.usu_fecha_creacion, s.sis_titulo from usuario u, sistema s, asignado a where u.usu_id_PK = a.usu_id_PK and a.sis_id_PK = s.sis_id_PK order by s.sis_titulo";

//run mysql query and then count number of fields
$export = mysql_query ( $select ) 
       or die ( "Sql error : " . mysql_error( ) );
$fields = mysql_num_fields ( $export );
$header = isset( $_GET['header'] )? $_GET['header']: false;
$data = isset( $_GET['data'] )? $_GET['data']: false;

//create csv header row, to contain table headers 
//with database field names
//for ( $i = 0; $i < $fields; $i++ ) {
//	$header .= mysql_field_name( $export , $i ) . ",";
//}

//$header .= mysql_field_name($export,0) . ",";
//$header .= mysql_field_name($export,1) . ",";
//$header .= mysql_field_name($export,2) . ",";
//$header .= mysql_field_name($export,3) . ",";
//$header .= mysql_field_name($export,4) . ",";


$header .= "ID" . ",";
$header .= "Username" . ",";
$header .= "Name" . ",";
$header .= "Last Login" . ",";
$header .= "Creation Date" . ",";
$header .= "System" . ",";


//this is where most of the work is done. 
//Loop through the query results, and create 
//a row for each
while( $row = mysql_fetch_row( $export ) ) {
	$line = '';
	//for each field in the row
	foreach( $row as $value ) {
		//if null, create blank field
		if ( ( !isset( $value ) ) || ( $value == "" ) ){
			$value = ",";
		}
		//else, assign field value to our data
		else {
			$value = str_replace( '"' , '""' , $value );
			$value = '"' . $value . '"' . ",";
		}
		//add this field value to our row
		$line .= $value;
	}
	//trim whitespace from each row

	$data .= trim( $line ) . "\n";
}
//remove all carriage returns from the data
$data = str_replace( "\r" , "" , $data );


$file_name = "Reportes-Usuarios-por-sistema";
//create a file and send to browser for user to download
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$file_name.".csv");
print "$header\n$data";
exit;

?>
