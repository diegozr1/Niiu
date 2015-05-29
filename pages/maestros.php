<?php include_once("sections/header.php"); ?>
<!-- body of every project -->
      <form action="buscador.php" method="POST">
        <div class="input-group col-md-12">        
          <input type="text" class="form-control" name ="nombre" placeholder="¡Busca a tu maestro!">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">¡Buscar!</button>
          </span>
        </div><!-- /input-group -->
      </form>    
      <ul class="nav nav-tabs">
        <?php     
          require_once('../ApiMySQL/ApiMySQL.class.php');

          $api           = new ApiMySQL();    
          $escuela       = 'CUCEI';
          $departamentos = $api->Departments($escuela);  
          $i             = 0;  

            foreach($departamentos as $key => $nombre){
              $i++;
              echo '<li><a data-toggle="tab" href="#'.$i.'">'.$nombre[0].'</a></li>';
            }      
         ?>            
      </ul>
      <?php 
          $tabl              = "teachers";
          $escuela           = $_GET['id'];
          $ColumnasSeleccionadas = "id_teacher, name, institution";
          $Fisica            = $api->getData($tabl, "institution='Fisica'" ,                            $ColumnasSeleccionadas);
          $Matematicas       = $api->getData($tabl, "institution='Matematicas'",                        $ColumnasSeleccionadas);              
          $Quimica           = $api->getData($tabl, "institution='Quimica'",                            $ColumnasSeleccionadas);
          $Farmacobiologia   = $api->getData($tabl, "institution='Farmacobiologia'",                    $ColumnasSeleccionadas);
          $Industrial        = $api->getData($tabl, "institution='Ingenieria Industrial'",              $ColumnasSeleccionadas);              
          $Topografia        = $api->getData($tabl, "institution='Ingenieria Civil y Topografia'",      $ColumnasSeleccionadas);              
          $IngenieriaQuimica = $api->getData($tabl, "institution='Departamento de Ingenieria Quimica'", $ColumnasSeleccionadas);              
          $Electrica         = $api->getData($tabl, "institution='Mecanica Electrica'",                 $ColumnasSeleccionadas);
          $Papel             = $api->getData($tabl, "institution='Celulosa y Papel'",                   $ColumnasSeleccionadas);
          $Proyectos         = $api->getData($tabl, "institution='Ingenieria de Proyectos'",            $ColumnasSeleccionadas);
          $Electronica       = $api->getData($tabl, "institution='Electronica'",                        $ColumnasSeleccionadas);
          $Computacionales   = $api->getData($tabl, "institution='Ciencias Computacionales'",           $ColumnasSeleccionadas);
      ?>
      <div class="tab-content">      
          <div id="1" class="tab-pane fade in active">
            <?php 
                foreach ($Fisica as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="2" class="tab-pane fade ">
            <?php 
                foreach ($Matematicas as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="3" class="tab-pane fade ">
            <?php 
                foreach ($Quimica as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="4" class="tab-pane fade ">
            <?php 
                foreach ($Farmacobiologia as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="5" class="tab-pane fade ">
            <?php 
                foreach ($Industrial as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="6" class="tab-pane fade ">
            <?php 
                foreach ($Topografia as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="7" class="tab-pane fade ">
            <?php 
                foreach ($IngenieriaQuimica as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="8" class="tab-pane fade ">
            <?php 
                foreach ($Electrica as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="9" class="tab-pane fade ">
            <?php 
                foreach ($Papel as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="10" class="tab-pane fade ">
            <?php 
                foreach ($Proyectos as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="11" class="tab-pane fade ">
            <?php 
                foreach ($Electronica as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
          <div id="12" class="tab-pane fade ">
            <?php 
                foreach ($Computacionales as $key => $maestro) {
                 echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      '; 
                }
             ?>
          </div>
      </div>
<!--
<div class="list-group">
    <a href="#" class="list-group-item active">
    	Maestros <span class="pull-right"> Departamento</span>
    </a>  
    <?php 
    /* Retorna todos
              $maestros = $api->getData($tabl, "institution=$escuela" , "id_teacher, name,department,institution");      
              */
    /*
      require('../ApiMySQL/ApiMySQL.class.php');
      $table    = "teachers";
      $api      = new ApiMySQL();
      $escuela  = $_GET['id'];
      $maestros = $api->getData($table, "institution=$escuela" , "id_teacher, name,department,institution");      
    	foreach($maestros as $key => $maestro){
    	   echo '<a href="califica.php?id='.$maestro["id_teacher"].'" class="list-group-item">'.$maestro["name"].' <span class="pull-right" >'.$maestro["institution"].' </span></a>      ';
    	}
      */
    ?>
</div>
 -->


<?php include_once("sections/footer.php"); ?>
