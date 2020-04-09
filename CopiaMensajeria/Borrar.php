<?php
// procedemos a borrar el mensaje publico
include ('ManejadorBD.php');
include ("Sesion.php");
include ('Mensaje.php');

$miPDO = new ManejadorBD();
$miSesion = new Sesion();

$id_mensaje = $_REQUEST['id_mensaje'];
if ($_SESSION['tipo']==true) {
    
    $miPDO->conectarBD();
    $msj = array();
    if ($miPDO->deleteMsj($id_mensaje)) {
        // no hago nada
    } else {
        echo "no es posible borrar el mensaje";
    }
    $miPDO->desconectarBD();
    header('location:privada.php');
}
?>