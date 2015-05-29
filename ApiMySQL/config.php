<?php
	//Ajustes de Conexion con MYSQL
	$host = "localhost";
	$user = "niiucomm_root";
	$pass = "jaime_salvador12";
	$db_name = "niiucomm_niiu";

	$fields = array(
		"grades" => [
			"id_teacher" => "int",
			"grade" => "int",
			"comment" => "varchar",
			"tipo1"=>"varchar",
			"tipo2"=>"varchar",
			"tipo3"=>"varchar",
			"tipo4"=>"varchar",
			"tipo5"=>"varchar",
			"tipo6"=>"varchar",
			"tipo7"=>"varchar",
			"tipo8"=>"varchar"
		],
		"teachers" => [
			"id_teacher" => "int",
			"name" => "varchar",
			"institution" => "int",
			"deparment" => "varchar"
		],
		"institutions" => [
			"id_institution" => "int",
			"name" => "varchar"
		]
	);


	$tables = array(
		"grades",
		"teachers",
		"institutions"
	);
	
	$conexion = mysql_connect($host,$user,$pass);

	if(!mysql_select_db($db_name)) {
		print("Error al seleccionar base de datos");
		die();
	}
?>