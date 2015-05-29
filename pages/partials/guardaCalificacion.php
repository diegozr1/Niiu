<?php 
	require_once('../../ApiMySQL/ApiMySQL.class.php');
	$api 		= new ApiMySQL();
	/*
	$table 		= "grades";
	$newElement = $_POST;
	*/
	
	/*
	echo $_POST["comment"];
	*/
	
	if(!isset($_POST["grade"])){
		$_POST["grade"]=0;
	}
	
	$statusInserted = $api->insert("grades", $_POST);
	//print_r($newElement);
	/*
	if($statusInserted){
		echo "Success Insert " .  $newElement['comment'];
	}
	else{
		echo "Error Insert " . $newElement['comment'];
	}
	*/
	header("Location: http://www.niiu.com.mx/#universidades");
?>