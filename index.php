<?php
session_start();


if(!isset($_SESSION['establecimiento'])){
    header('Location: establecimiento.php?enviado=false');
}


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
<body onload="InitThis();">

<div class="container">
    <form action="process.php" method="POST">
        <label for="nombre">Nombre y apellido</label>
        <input id="nombre" name="nombre" type="text" class="form-control" autocomplete="off">
        <div id="nombre-error" class="error">
            Ingrese un nombre valido
        </div>
        <br>
        <label for="fecha">Fecha de nacimiento</label>
        <input id="fecha" name="fecha" type="date" class="form-control" autocomplete="off">
        <div id="fecha-error" class="error">
            Ingrese una fecha de nacimiento
        </div>
        <br>
        <label for="documento">Documento</label>
        <input id="documento" name="documento" type="number" class="form-control" autocomplete="off">
        <div id="documento-error" class="error">
            Ingrese un documento valido
        </div>
        <br>
        <label for="email">Email</label>
        <input id="email" name="email" type="text" class="form-control" autocomplete="off">
        <div id="email-error" class="error">
            Ingrese un email valido
        </div>
        <input type="hidden" id="imagen" name="imagen">
        <br>


        <div align="center">
            <canvas id="myCanvas" width="500" height="283" style="border:2px solid black;"></canvas>
            <br /><br />
            <div id="firma-error" class="error">
                Ingrese una firma
            </div>
            <a class="btn btn-primary" onclick="javascript:clearArea();return false;">Reestablecer hoja</a>
           <!--   <a class="text-center center-block" onClick="descargar()" id="downloadLnk" download="" style="cursor:pointer;">Download as image</a>-->
        </div>
            <div class="radio">
                        
                <label for="">
                    <input type="radio" value="si" name="terminos" class="" checked>
                   <a href="terminos.php" target="_blank"> Acepto los terminos y condiciones</a>
                </label>
                        
            </div>
            <br>

        


        <a class="btn btn-primary" onClick="validar()">ENVIAR</a>

    </form>
</div>


  <div id="alert-cont"></div>


    


    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/alertar.js" type="text/javascript"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
    <script>

        var soloLetrasYEspacios= /^[a-zA-Z\s]*$/; 
    var soloNumeros=/^[0-9]*$/;
    var nombre_esta_validado=false;
    var fecha_esta_validado = false;
    var dni_esta_validado=false;
    var email_esta_validado=false;
    var emailValido=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var draw = false;

       $(document).ready(function(){
            
            $("canvas").attr('width',''+$(".container").width()+'');


            if($_GET['enviado']){

            alertar(' ¡ Gracias por participar ! ');
            }


       });



    


    $("#nombre").keyup(function(){

        var nombre=$("#nombre").val();

        if(nombre.length<4||nombre.search(soloLetrasYEspacios)){

            $("#nombre-error").fadeIn();

            nombre_esta_validado=false;

        }else{

            $("#nombre-error").fadeOut();

            nombre_esta_validado=true;

        }

    });




        $("#documento").keyup(function(){

            var dni=$("#documento").val();

            var maxChars = 8;

            if ($(this).val().length > maxChars) {

                $(this).val($(this).val().substr(0, maxChars));

                var dni=$(this).val();

            }

          if(dni.length<7||dni.length>8||dni.search(soloNumeros)){

                dni_esta_validado=false;

                $("#documento-error").fadeIn();

            }else{

                dni_esta_validado=true;

                $("#documento-error").fadeOut();
            }

    });


     $("#email").keyup(function(){

      var email=$("#email").val();

      if(email.length<3||email.search(emailValido)){

        $("#email-error").fadeIn();
       
        email_esta_validado=false;                    

        }else{
        
        $("#email-error").fadeOut();

        email_esta_validado=true;

        }

    });


     $("#fecha").on('keyup change', function(){

      var fecha=$("#fecha").val();

      if(fecha.length<10){

        $("#fecha-error").fadeIn();
       
        fecha_esta_validado=false;                    

        }else{
        
        $("#fecha-error").fadeOut();

        fecha_esta_validado=true;

        }

    });


    

 </script>
 <script>

    function validar(){

        if(nombre_esta_validado==false){
            $("#nombre-error").fadeIn();
        }else{
            $("#nombre-error").fadeOut();
        }

        if(dni_esta_validado==false){
            $("#documento-error").fadeIn();
        }else{
            $("#documento-error").fadeOut();
        }

        if(email_esta_validado==false){
            $("#email-error").fadeIn();
        }else{
            $("#email-error").fadeOut();
        }



        if(draw ==false){
            $("#firma-error").fadeIn();
            console.log(draw)
        }else{
            $("#firma-error").fadeOut();
            console.log(draw)
        }


        if(fecha_esta_validado == false){
            $("#fecha-error").fadeIn();
        }else{
            $("#fecha-error").fadeOut();   
        }

      if(nombre_esta_validado==true&&dni_esta_validado==true&&email_esta_validado==true&&fecha_esta_validado==true&&draw==true){
                
                descargar();
                
                $("body").append('<div id="preloader-mailing" ><div class="spinner-sm spinner-sm-1" id="status"> </div></div>');
                    
                $("form").submit();
            
            }   
    }



 </script>
 <script src="js/canvas_functions.js" type="text/javascript"></script>
  <script src="js/getVariablesFunction.js" type="text/javascript"></script>
</body>
</html>