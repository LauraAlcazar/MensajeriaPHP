<?php
/*Pgina donde se le indica al usuario que sus datos han sido guardados correctamente
 *  y se le da la opción de volver a la pagina de bienvenida para poder acceder a su zona privada*/
include ('bGeneral.php');
cabecera("registroOk");
if (! isset($_REQUEST['bVolver'])) {
include('HTML/RegistroOk.html');
}
pie();
?>