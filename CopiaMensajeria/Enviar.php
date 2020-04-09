<?php
/*pagina que permite enviar un mensaje,
 * indicando si es publico o privado
 * el asunto
 * el destinatario, dando opción de escoger uno de los ususarios registrados en la base de datos
 * y el cuerpo
 * 
 * esta pagina lleva a validaEnvio para verificar que todo esté correcto
 * */
include_once ('ManejadorBD.php');
include_once ('bGeneral.php');
include_once ("Sesion.php");

cabecera("Envio");
$miPDO = new ManejadorBD();
if(!isset($miSesion)){
    $miSesion = new Sesion();
}
if ($miSesion->sesionRegistrada('acceso')==false) {
    //si la sesión no está activa
    header("Location:Bienvenida.php");
}
   
if (isset($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
}
$miPDO->conectarBD();
$usuarios = array();
$usuarios=$miPDO->muestraUsuRegist();
$miPDO->desconectarBD();
include('HTML/FormEnviar.php');
pie();
?>