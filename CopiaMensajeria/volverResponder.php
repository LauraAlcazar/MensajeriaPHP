<?php
/*
 * pagina para validar los botones que se han pulsado en pa lagina de cuerpoMnesaje,
 * donde esta el mensaje en concreto que queremos ver
 */
include ('bValidarForm.php');
if (! isset($_REQUEST['bVolver']) && ! isset($_REQUEST['bResponder'])) {
    include ('cuerpoMensaje.php');
} elseif (isset($_REQUEST['bVolver'])) {
    include ('privada.php');
    // si queremos responder al mensaje vamos a Enviar2
}
if (isset($_REQUEST['bResponder'])) {
    // necesito pasar el remitente
    $id_mensaje = $_REQUEST['id_mensaje'];
    header('location:Enviar2.php?id_mensaje=' . $id_mensaje);
}
?>