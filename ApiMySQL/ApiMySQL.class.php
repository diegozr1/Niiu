<?php

	/*
		Author: Renato Gutierrez Salas, Diego Zamora Rodriguez
		Contact: www.renatogutierrez.com, www.diegozamora.tk
	*/
	
	class ApiMySQL{

		private $conection;

		/*Arrays*/
		private $tables,
				$fields;

		/*
			$tables = [
				"usuarios",
				"productos"
			];

			$fields = [
				"usuarios" => [
					"id" => "int",
					"nombre" => "varchar",
					"apellido_p" = "varchar",
					"apellido_m" = "varchar",
					"edad" = "int"
				],
				"productos" => [
					"id_usuario" => "int",
					"nombre_producto" => "varchar",
					"descripcion" => "text",
					"precio" => "float"
				]
			];
	
		*/

		public function __construct(){
			require_once(__DIR__ . "/config.php");
			$this->conection = $conexion;
			$this->tables = $tables;
			$this->fields = $fields;
		}

		public function isConnected(){
			$connected = false;
			if($this->conection) $connected = true;

			return $connected;
		}

		public function insert($table, $paqueteElemento){
			/*
				INPUT
					$table = "usuarios";
					$paqueteElemento = [
						"id" => "int",
						"nombre" => "varchar",
						"apellido_p" = "varchar",
						"apellido_m" = "varchar",
						"edad" = "int"
					];

				OUTPUT
					$success = boolean;
			*/
			$success = false;

			$masterSQL = "INSERT INTO $table (*FIELDS*) VALUES (*VALUES*)";
			$namesFields = "";
			$valuesFields = "";
			
			foreach($this->fields[$table] as $nameField => $typeField){
				$namesFields .= "$nameField,";
				if($typeField == "varchar" || $typeField == "text"){
					$valuesFields .= "'".$paqueteElemento[$nameField]."',";
				}
				else{
					$valuesFields .= $paqueteElemento[$nameField].",";
				}
			}

			$namesFields = substr($namesFields, 0, -1);
			$valuesFields = substr($valuesFields, 0, -1);

			$masterSQL = str_replace("*FIELDS*", $namesFields, $masterSQL);
			$masterSQL = str_replace("*VALUES*", $valuesFields, $masterSQL);

			if(mysql_query($masterSQL, $this->conection)){
				$success = true;
			}
			
			return $success;
		}

		public function update($table, $paqueteElemento, $filter){
			/*
				INPUT
					$table = "usuarios";
					$paqueteElemento = [
						"id" => "int",
						"nombre" => "varchar",
						"apellido_p" = "varchar",
						"apellido_m" = "varchar",
						"edad" = "int"
					];
					$filter = "id=2"; || $filter = "nombre='Renato'";

				OUTPUT
					$success = boolean;
			*/

			$success = false;

			$masterSQL = "UPDATE $table SET *FIELDS_VALUES* WHERE $filter";
			$fieldsWithValues = "";

			foreach($this->fields[$table] as $nameField => $typeField){
				$actualValue = $paqueteElemento[$nameField];

				if($actualValue != NULL){
					if($typeField == "varchar" || $typeField == "text"){
						$fieldsWithValues .= "$nameField='".$actualValue."',";
					}
					else{
						$fieldsWithValues .= "$nameField=".$actualValue.",";
					}
				}
			}

			$fieldsWithValues = substr($fieldsWithValues, 0, -1);

			$masterSQL = str_replace("*FIELDS_VALUES*", $fieldsWithValues, $masterSQL);

			if(mysql_query($masterSQL, $this->conection)){
				$success = true;
			}

			return $success;
		}

		public function delete($table, $filter){
			/*
				INPUT
					$table = "usuarios";
					$filter = "id=2"; || $filter = "nombre='Renato'";

				OUTPUT
					$success = boolean;
			*/

			$success = false;

			$masterSQL = "DELETE FROM $table WHERE $filter";

			if(mysql_query($masterSQL, $this->conection)){
				$success = true;
			}

			return $success;
		}

		public function getData($table, $filter, $specificFields = NULL){
			/*
				INPUT 
					$table = "usuarios";
					$filter = "id=2"; || $filter = "nombre='Renato'";
					$specificFields = "id,nombre,edad";

				OUTPUT
					$retrievedData = [
						0 => [
							"nombre" => "Renato",
							"edad" => 19
						],
						1 => [
							"nombre" => "Luis",
							"edad" => 21
						]
					];
			*/

			$retrievedData = NULL;

			$masterSQL = "SELECT * FROM $table";
			if($filter != "*")  $masterSQL .= " WHERE $filter";
			
			if($specificFields != NULL){
				$masterSQL = str_replace("*", $specificFields, $masterSQL);
			}

			$search = mysql_query($masterSQL, $this->conection);

			while($element = mysql_fetch_array($search)){
				$retrievedData[] = $element;
			}			
			return $retrievedData;
			
		}
		public function Search($table, $filter, $search){
			/*
				INPUT 
					$table = "usuarios";
					$filter = "id=2"; || $filter = "nombre='Renato'";
					$specificFields = "id,nombre,edad";

				OUTPUT
					$retrievedData = [
						0 => [
							"nombre" => "Renato",
							"edad" => 19
						],
						1 => [
							"nombre" => "Luis",
							"edad" => 21
						]
					];
			*/

			$retrievedData = NULL;

			$masterSQL = "SELECT * FROM $table WHERE name LIKE '%".$search."%'";						
			
			$search = mysql_query($masterSQL, $this->conection);

			while($element = mysql_fetch_array($search)){
				$retrievedData[] = $element;
			}

			return $retrievedData;
			
		}

		public function Departments($escuela){
			$retrievedData = NULL;
			
			$masterSQL = "SELECT DISTINCT institution FROM teachers where department = '".$escuela."';";			
			
			
			$host = "localhost";
			$user = "niiucomm_root";
			$pass = "jaime_salvador12";

			$conexion = mysql_connect($host,$user,$pass);
			
			$resultado = mysql_query($masterSQL, $conexion);
			
			while($element = mysql_fetch_array($resultado)){
				$retrievedData[] = $element;
			}
			return $retrievedData;
		}

	}

?>