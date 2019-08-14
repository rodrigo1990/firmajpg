<?php
session_start();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<!-- ESTILOS -->
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
    <div class="row">
        <div class="container-fluid">
            <img src="imagen/logo.svg" alt="" class="center-block">
        </div>
    </div>
</header>

<div class="container">
    <form action="processEstablecimiento.php" method="POST">
        <label for="establecimiento">Establecimiento</label>
        <input id="establecimiento" name="establecimiento" type="text" class="form-control" autocomplete="off">
        <div id="establecimiento-error" class="error">
            Ingrese un establecimiento
        </div>
        <br>
      
        <a class="btn btn-primary" onClick="ingresarEstablecimiento()">INGRESAR</a>

    </form>
</div>


  <div id="alert-cont"></div>


    


    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/alertar.js" type="text/javascript"></script>
      <script src="js/getVariablesFunction.js" type="text/javascript"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
        
            if($_GET['enviado']==true){

            alertar(' ¡ Establecimiento ingresado con exito ! ');
            }else if($_GET['enviado']=='false'){
                alertar(' ¡ Ingrese un establecimiento primero ! ');
            }


       });
        function ingresarEstablecimiento(){
            var establecimiento = $("#establecimiento").val();

            if(establecimiento.length<1){
                $("#establecimiento-error").fadeIn();
            }else{
                $("#establecimiento-error").fadeOut();

                $("form").submit();

               // window.location = "index.php"
            }

        }
    </script>    


</body>
</html>