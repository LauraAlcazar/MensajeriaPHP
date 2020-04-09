<?php
/*validamos los botones que se han pulsado en la zona privada*/
include ('bValidarForm.php');
include ('bGeneral.php');
include ("Sesion.php");
cabecera('cuerpo');
$miSesion = new Sesion();

if (! isset($_REQUEST['bSalir']) && ! isset($_REQUEST['bEnviarMsj'])) {
    // Si no se ha pulsado ninguno Incluimos el formulario vacio
    include ('privada.php');
}elseif(isset($_REQUEST['bEnviarMsj'])){
    header('location:Enviar.php');
}
if(isset($_REQUEST['bSalir'])){
    $miSesion->cerrarSesion();
    header('location:Bienvenida.php');
}
pie();
?>