<?php

  require_once('../ApiMySQL/ApiMySQL.class.php');

		  $api     = new ApiMySQL();
		  $table   = "teachers";
		  $maestro = $_GET["id"];

		  if (empty($_GET["id"])) {
		    header("Location: http://www.niiu.com.mx/");
		  }

		  $maestros = $api->getData($table, "id_teacher=$maestro" , "name,institution,department");

	    foreach($maestros as $key => $teacher){
	      echo '<h3><span class="fa fa-user">&nbsp;</span>'.$teacher["name"].'  <span class="pull-right">'.$teacher["department"].'</span></h3> <h5> '.$teacher["institution"].' <h5> ';
	    }

		  //Start the average calculate
		  $tabla    = "grades";
		  $maestros = $api->getData($tabla, "id_teacher=$maestro" , "*");
     
      //Everything is set to null

		  $calif             = NULL;
		  $NumeroComentarios = NULL;
		  $promedioGeneral   = NULL;
      $masterTipos       = "";
      $auto    = null;
      $barco   = null;
      $bomb    = null;
      $burro   = null;
      $cerebro = null;
      $ghost   = null;
      $reloj   = null;
      $tarde   = null;
      //If there are  grades for the teachers
		  if(isset($maestros)){
        // por cada teacher en maestros cuenta las calificaciones para cada uno
		  	foreach($maestros as $key => $teacher){
			    $calif             += $teacher["grade"];          
			    $NumeroComentarios += 1;
          //Conteo de calificaciones de los maestros
          if($teacher["tipo1"]=='auto')   { $auto++;}
          if($teacher["tipo2"]=='barco')  { $barco++;}
          if($teacher["tipo3"]=='bomb')   { $bomb++;}
          if($teacher["tipo4"]=='burro')  { $burro++;}
          if($teacher["tipo5"]=='cerebro'){ $cerebro++;}
          if($teacher["tipo6"]=='ghost')  { $ghost++;}
          if($teacher["tipo7"]=='reloj')  { $reloj++;}
          if($teacher["tipo8"]=='tarde')  { $tarde++;}          
			  }

		    print " <b>Valoracion Promedio </b>". round($promedioGeneral=$calif/$NumeroComentarios, 0);
        
        $lista = [
            "auto"    => $auto,
            "barco"   => $barco,
            "bomb"    => $bomb,
            "burro"   => $burro,
            "cerebro" => $cerebro,
            "ghost"   => $ghost,
            "reloj"   => $reloj,
            "tarde"   => $tarde,
        ];
       
        $MasAltos = '';
        $Mayor = array_search(max($lista), $lista);
        $MasAltos .= '<img src="../assets/img/'.$Mayor.'.png" alt="" width="100px"alt="" />';
        
        unset($lista[$Mayor]);        
        $Mayor = array_search(max($lista), $lista);
        $MasAltos .= '<img src="../assets/img/'.$Mayor.'.png" alt="" width="100px"alt="" />';

        unset($lista[$Mayor]);
        $Mayor = array_search(max($lista), $lista);
        $MasAltos .= '<img src="../assets/img/'.$Mayor.'.png" alt="" width="100px"alt="" />';

        
      print ' <h1 align="center">
              &#8226;&nbsp;&#8226;&nbsp;&#8226;&nbsp;&#8226;
              &#8226;&nbsp;&#8226;&nbsp;&#8226;&nbsp;&#8226;
              &#8226;&nbsp;&#8226;&nbsp;&#8226;&nbsp;&#8226;
              '.$MasAltos.'
              &#8226;&nbsp;&#8226;&nbsp;&#8226;&nbsp;&#8226;
              &#8226;&nbsp;&#8226;&nbsp;&#8226;&nbsp;&#8226;
              &#8226;&nbsp;&#8226;&nbsp;&#8226;&nbsp;&#8226;
              &nbsp;&#8226;</h1>
            ';
		}