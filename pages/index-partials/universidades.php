<div class="list-group">
  <a href="#" class="list-group-item active">
  Universidades
  </a>
  <?php 
    require_once('../../ApiMySQL/ApiMySQL.class.php');
    $table    = "institutions";
    $api      = new ApiMySQL();
    $maestros = $api->getData($table, "*" , "id_institution, name");
    foreach($maestros as $key => $notification){
      echo '<a href="pages/maestros.php?id='.$notification["id_institution"].'" class="list-group-item">'.$notification["name"].'';
    }
  ?>
</div>