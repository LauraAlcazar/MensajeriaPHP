<?php
/*Esta se abre cuando queremos responder a un mensaje,
 * indicando si es publico o privado
 * el asunto
 * el destinatario, el mismo que ha envidoel mensaje que se quiere responder
 * y el cuerpo
 *
 * esta pagina lleva a validaEnvio para verificar que todo esté correcto
 * */
include_once ('ManejadorBD.php');
include_once ('bGeneral.php');
include_once ('Usuario.php');
include_once ('Mensaje.php');
include_once ("Sesion.php");
cabecera("Envio");
$miPDO = new ManejadorBD();
if(!isset($miSesion)){
    $miSesion = new Sesion();
}
$id_mensaje = $_REQUEST['id_mensaje'];

/*if (isset($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
}*/
if ($miSesion->sesionRegistrada('acceso')==false) {
    //si la sesión no está activa
    header("Location:Bienvenida.php");
}

if(isset($_REQUEST['error'])){
    echo $_REQUEST['error'];
}
$remitente=0;
$msj = array();
$miPDO->conectarBD();
if (false != $msj = $miPDO->getMensaje($id_mensaje)) {
    foreach ($msj as $value) {
        $remitente=$value->get_enviador();
        $asunto=$value->get_asunto();
    }
} else {
    echo "no hay remitente";
}

$nickRemitente="no hay";
if (false != $usu = $miPDO->getUsuFromId($remitente)) {
    $nickRemitente=$usu->get_nick();
} else {
    echo "no hay remitente";
}
$miPDO->desconectarBD();
include('HTML/FormEnviar2.php');
pie();
?>