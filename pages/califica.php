<?php include_once("sections/header.php"); ?>

<!--     body of every project     -->
   <div class="row panel panel-default">
	  <div class="col-md-12">
      <?php
  	   include_once("partials/evaluacion.php");
  		?>
    </div>
   </div>
      	<div class="row"  align = "center">    			
    			<form action="partials/guardaCalificacion.php" id="califica"  name = "califica" method="POST">
          <div class="col-md-6">
            <p>
              Selecciona los tres mas característicos
            </p>
    				<div class="col-md-6">
      					<div class="">
                  <label><img src="../assets/img/auto.png" width="100px" title="Estudia por tu cuenta" /></label>
                  <input type="checkbox" class="chk"  id="tipos" name="tipo1" value="auto" />
                </div>
                <div class="">
                  <label><img src="../assets/img/barco.png" width="100px" title="Es un barco" /></label>
                  <input type="checkbox" class="chk"  id="tipos" name="tipo2" value="barco" />
                </div>
                <div class="">
                  <label><img src="../assets/img/bomb.png" width="100px" title="Vas a tronar" /></label>
                  <input type="checkbox" class="chk"  id="tipos" name="tipo3" value="bomb" />
                </div>
                <div class="">
                  <label><img src="../assets/img/burro.png" width="100px" title="No aprenderás" /></label>
                  <input type="checkbox" class="chk"  id="tipos" name="tipo4" value="burro" />
                </div>
            </div>
            <div class="col-md-6">
              <div class="">
                <label><img src="../assets/img/cerebro.png" width="100px" title="Aprenderás mucho" /></label>
                <input type="checkbox" class="chk"  id="tipos" name="tipo5" value="cerebro" />
              </div>
              <div class="">
                <label><img src="../assets/img/ghost.png" width="100px" title="Falta muy seguido" /></label>
                <input type="checkbox" class="chk"  id="tipos" name="tipo6" value="ghost" />
              </div>
              <div class="">
                <label><img src="../assets/img/reloj.png" width="100px" title="Es muy puntual" /></label>
                <input type="checkbox" class="chk"  id="tipos" name="tipo7" value="reloj" />
              </div>
              <div class="">
                <label><img src="../assets/img/tarde.png" width="100px" title="Llega tarde" /></label>
                <input type="checkbox" class="chk"  id="tipos" name="tipo8" value="tarde" />
              </div>
            </div>
                <script type="text/javascript">                    
                  checkboxlimit(document.forms.califica.tipos, 3);
                </script>

              <br>
      	</div>
				<div class="col-md-6">
          <br><br><br><br><br>
					<div class="panel panel-default">	<!--  style="padding:15px; display:inline;" align="right" -->
						<div class="panel-heading">Calificar</div>
						<span class="star-rating">
		              <input type="radio" name="grade" value="1"><i></i>
		              <input type="radio" name="grade" value="2"><i></i>
		              <input type="radio" name="grade" value="3"><i></i>
		              <input type="radio" name="grade" value="4"><i></i>
		              <input type="radio" name="grade" value="5"><i></i>
		        </span>
		        
						<input type="hidden" name="id_teacher" value="<?php echo $_GET['id']?>">
						<textarea name="comment" class="form-control" rows="3" placeholder="¿Por qué esa calificación?" required></textarea>
						<br>
					</div>
				</div>
				
				<button class="btn btn-success" type="submit"><span class="fa fa-check"></span> Evaluar</button>
			</form>
      
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Comentarios
				<span class="pull-right">Calificacion</span>
			</div>
			<div class="panel-body">
          <li class="list-group-item">
						<?php
						  $tabl     = "grades";
						  $maestros = $api->getData($tabl, "id_teacher=$maestro" , "id_teacher,grade,comment");
						  if(isset($maestros)){
						  	foreach($maestros as $key => $teacher){
							    echo '<p><span class="fa fa-comment">&nbsp;</span>'.$teacher["comment"].' <span class="pull-right">'.$teacher["grade"].' <span></p> ';
							  }
						  }else{
						  	echo '<i class="text-center btn-block">No hay comentarios, ¡sé el primero!.</i>';
						  }
						?>
					</li>
			</div>
		</div>
	</div>

<?php include_once("sections/footer.php"); ?>
