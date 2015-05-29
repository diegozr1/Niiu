<!DOCTYPE html>
<html lang="es" ng-app="scotchApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Se parte del futuro de los demás, califica a tus maestros">
    <meta name="author" content="Diego Zamora">
    <link rel="icon" href="../../assets/img/favicon.png">

    <title>Niiu</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" />
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <link rel="stylesheet" href="../../assets/lib/sweet-alert.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">               
        input .chk
        {
          margin-left: 0px;
        }
    </style>
    <script>
      function checkboxlimit(checkgroup, limit){
        var checkgroup = checkgroup;
        var limit      = limit;
        for (var i=0; i<checkgroup.length; i++){
          checkgroup[i].onclick=function(){
          var checkedcount=0
          for (var i=0; i<checkgroup.length; i++)
            checkedcount+=(checkgroup[i].checked)? 1 : 0
            if(checkedcount>limit){
              sweetAlert("Ups...", "Solo puedes seleccionar "+limit+" opciones", "warning");              
              this.checked=false
            }else if(checkedcount==0){
              sweetAlert("Ups...", "Debes seleccionar "+limit+" opciones", "danger");
            }
          }
        }
      }
    </script>
  </head>

  <body ng-controller="mainController">
    <?php include_once("analyticstracking.php") ?>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="/">Inicio</a></li>
          <li><a href="/#universidades">Universidades</a></li>
          <li><a href="/#contacto">Contacto</a></li>
          <li><a href="/#quien">¿Quiénes somos?</a></li>
          <li><a href="/#aviso">Aviso Legal</a></li>
        </ul>
        <h3 class="text-muted"><img src="../../assets/img/app.png" width="50px"></h3>
      </div>
