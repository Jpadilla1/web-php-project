<?php 

require_once '../app/init.php';

$app = new App;

// $user = DB::getInstance()->query("SELCT * FROM usuario");

// $user = DB::getInstance()->get('usuario');

// $user = DB::getInstance()->get('usuario', array('usuario', '=', 'admin'));

// DB::getInstance()->delete('usuario');

// DB::getInstance()->delete('usuario', array('usuario', '=', 'admin'));

// $user = DB::getInstance()->insert('usuario', array(
// 		'usu_id_PK' => '1111',
// 		'usu_username' => 'dale',
// 		'usu_password' => '1234',
// 		'usu_nombre' => 'dale',
// 		'usu_last_login' => date('Y-m-d'),
// 		'usu_intentos_fallidos' => 0,
// 		'usu_fecha_creacion' => date('Y-m-d'),
// 		'usu_fecha_expiracion' => date('Y-m-d'),
// 		'usu_fecha_cambio_password' => date('Y-m-d'),
// 		'usu_flag_cambio_password' => 0,
// 		'usu_cantidad_dias_password' => 1000,
// 		'cat_id_FK' => '001'
// 	));

// $user = DB::getInstance()->update('usuario', 1111, 'usu_id_PK', array(
//  		'usu_password' => '123',
// 	));


// if ($user) {
// 	echo 'Success';
// }

?>