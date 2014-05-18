<?php 
$con=mysql_connect("localhost","root","");
$db_found = mysql_select_db("sistema_seguridad_administracion");
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysql_query("SELECT * FROM usuario ". 
  "WHERE usu_username='". $username ."' AND usu_password='". $password ."';") or die(mysql_error());

while ($row = mysql_fetch_array($query)) {
    if ($row['usu_username'] == $username && $row['password'] = $password)
    {
    	session_start();
    	$_SESSION['username'] = $username;
    	$_SESSION['user_id'] = $row['usu']	
    	header("Location: ../index.php");
    }
}
header("Location: ../index1.php");

?>