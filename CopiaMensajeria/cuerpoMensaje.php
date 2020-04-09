<?php
/* se muestra el emnsaje y se dan las opciones de volver o de responder */
include_once ('ManejadorBD.php');
include_once ('bGeneral.php');
include_once ('Usuario.php');
include_once ('Mensaje.php');
include_once ("Sesion.php");

cabecera('cuerpo');
$miPDO = new ManejadorBD();
if (! isset($miSesion)) {
    $miSesion = new Sesion();
}

if ($miSesion->sesionRegistrada('acceso') == false) {
    // si la sesión no está activa
    header("Location:Bienvenida.php");
}

// conectamos con la base de datos para poder extraer el ensaje que queremos ver
$miPDO->conectarBD();
$id_mensaje = $_REQUEST['id_mensaje'];
$id_respuesta = $_REQUEST['id_respuesta'];
?>

<h1>Mensaje</h1>
<div id="cuerpo"><?php
$msj = array();
$idCorrecto = 0;
if ($id_respuesta != null) {
    $idCorrecto = $id_respuesta;
} else {
    $idCorrecto = $id_mensaje;
}

if (false != $msj = $miPDO->getMensaje2($idCorrecto)) {    
    foreach ($msj as $value) {
        echo "--------" . $value->get_fecha() . "-------<br>";
        echo $value->get_cuerpo() . "<br>";
        $idEnviador = $value->get_enviador();
    }
} else {
    echo "no es posible ver el cuerpo del mensaje";
}

// marco el mensaje como leido en la base de datos simpre que no sea el usuario enviador
$usu = $miPDO->getUsuFromId($idEnviador);
$nick = $usu->get_nick();
if ($_SESSION['usuario'] != $nick) {
    $miPDO->msjLeido($id_mensaje);
    $miPDO->desconectarBD();
}
?></div>
<form action="volverResponder.php?id_mensaje=<?php $id_mensaje?>"
	method="post">
	<input class="button" TYPE="submit" name="bVolver" VALUE="Volver"> <input
		class="button" TYPE="submit" name="bResponder" VALUE="Responder"> <br>
	<input type="text" style="visibility: hidden;" name="id_mensaje"
		value=<?php echo $id_mensaje?> />
</form>
<?php
pie();
?>