<?php
/*
 * es la pagina de inicio donde se da la bienvenida al susuario y puede ver los mensajes publicos (foro)
 * desde aqui el ususario puede acceder a su zona privada o regitrarse en la base de datos
 */
include_once ('bGeneral.php');
include_once ('ManejadorBD.php');
include_once ('Mensaje.php');
include_once ('Usuario.php');
cabecera("bienvenida");
$miPDO = new ManejadorBD();
// cookie que muestra la ultima conexión o entrada a la pagina
$fecha = date("d/m/Y h:i:s", time());
setcookie("ultimaConex", "Tu última conexión fue: " . $fecha . "<br>", time() + 60 * 60 * 24 * 7);
if (isset($_COOKIE['ultimaConex'])) {
    echo $_COOKIE['ultimaConex'];
}

if (isset($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
    
include('HTML/FormBienvenida2.php');
}


else{
    include ('HTML/FormBienvenida.html');
}
// mostrar los mensajes publicos (foro)
$msj = array();
$miPDO->conectarBD();
$msj = $miPDO->mostarPublicos();
echo "<table>";
echo "<tr><b><td><b>Asunto</b></td><td><b>Mensaje</b></td><td><b>Fecha</b></td><td><b>Remitente</b></td></tr>";
foreach ($msj as $value) {
    echo "<tr>";
    // obtengo el usuario que se corresponde con el enviador
    $UsuarioEnviador = $miPDO->getUsuFromId($value->get_enviador());
    // obtengo su nick
    $nick = $UsuarioEnviador->get_nick();
    echo "<td>" . $value->get_asunto() . "</td><td>" . $value->get_cuerpo() . "</td><td>" . $value->get_fecha() . " </td><td>" . $nick . "</td>";
    echo "</tr>";
}
echo "</table>";
$miPDO->desconectarBD();
pie();
?>