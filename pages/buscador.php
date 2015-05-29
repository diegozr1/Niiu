<?php include_once("sections/header.php"); ?>
      
   <!--     body of every project     -->   
	<form action="buscador.php" method="POST">
	    <div class="input-group col-md-12">
	    
	      <input type="text" class="form-control" name ="nombre" placeholder="¡Busca el nombre de tu maestro!">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="submit">Buscar!</button>
	      </span>
	
	    </div><!-- /input-group -->
	</form>   
<br>


<div class="list-group">
   <a href="#" class="list-group-item active">
    	Nombre <span class="pull-right"> Departamento</span>
    </a>
  <?php 
  
    require_once('../ApiMySQL/ApiMySQL.class.php');
    error_reporting(0);
    $table 	= "teachers";
    $api 	= new ApiMySQL();
    $nombre	= $_POST['nombre'];
    //echo strtolower($nombre);
    $maestros 	= $api->search($table, "name=$nombre" , $nombre);
    
    
    if($maestros == null){
		echo "<h3>Profesor no encontrado</h3>";
	}else{
    
      foreach($maestros as $key => $notification){
        echo '<a  href="califica.php?id='.$notification["id_teacher"].'" class="list-group-item">'.$notification["name"].' <span class="pull-right" >'.$notification["institution"].' </span></a>      ';
      }
    }

?>
  
</div>



<?php include_once("sections/footer.php"); ?>