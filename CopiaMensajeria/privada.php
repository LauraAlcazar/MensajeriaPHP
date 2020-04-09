<?php
/*en esta pagina el usuario puede:
 * enviar mensajes
 * ver su bandeja de entrada y pulsar al botón de ver mensaje
 * salir
 *  */
include ('ManejadorBD.php');
//include ('bValidarForm.php');
include('Mensaje.php');
include ("Sesion.php");
include('bGeneral.php');
include('Usuario.php');
$miPDO = new ManejadorBD();
$miSesion = new Sesion();
cabecera("privada");
//compruebo si la sesión está activa
if ($miSesion->sesionRegistrada('acceso')==false) {
    //si la sesión no está activa
    header("Location:Bienvenida.php");
}

if (isset($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
}
?>
<div>Bienvenido <?php echo $miSesion-> __get('usuario')?></div>
<h1>Página Privada</h1>
<form action="validaPrivada.php" method="post">
	<input class="button" TYPE="submit" name="bEnviarMsj"VALUE="EnviarMensaje"> 
	<input class="button" TYPE="submit" name="bSalir" VALUE="Salir"> <br>
	<h2>Mensajes Recibidos</h2>
</form>
<?php
//bandeja de etrada
$msj = array();
$miPDO->conectarBD();
//obtengo el objeto usuario que esta registrado en la base de datos para poder obtener sus mensajes recibidos
$miUsu = new Usuario($_SESSION['usuario']);
if(false!=$Usu=$miPDO ->getUsuRegistrado($miUsu)){
    //obtengo si id
    $idUsu=$Usu->get_id();
}
else{
    echo "usuario no encotrado";
}
//le paso el id del usuario de la sesion y obtengo los mensajes que ha recibido
if(false!=$msj=$miPDO -> mostrarRecibidos($idUsu)){
    echo "<table>";
    echo "<tr><b><td><b>Asunto</b></td><td><b>Fecha</b></td><td><b>Remitente</b></td><td><b>Aceso</b></td></b></tr>";
    foreach ($msj as $value) {
        $id_respuesta=$value->get_id_respuesta();
        $id_mensaje=$value->get_id();
        //obtengo el usuario que se corresponde con el enviador
        $UsuarioEnviador=$miPDO->getUsuFromId($value->get_enviador());
        //obtengo su nick
        $nick=$UsuarioEnviador->get_nick();
        //si el mensaje no esta leido lo pongo en negrita
        if(($value->get_leido())==false){
            echo "<tr>";
            echo "<td><b>".$value->get_asunto()."<b></td><td><b>".$value->get_fecha()."<b></td><td><b>".$nick."<b></td>";
            echo "<td><a href=cuerpoMensaje.php?id_mensaje=$id_mensaje&id_respuesta=$id_respuesta>Ver Mensaje</a></td>";
            echo "</tr>";
        }else{
            echo "<tr>";
            echo "<td>".$value->get_asunto()."</td><td>".$value->get_fecha()." </td><td>".$nick."</td>";
            echo "<td><a href=cuerpoMensaje.php?id_mensaje=$id_mensaje&id_respuesta=$id_respuesta>Ver Mensaje</a></td>";
            echo "</tr>";
        }
    }
echo "</table>";
}
else{
    echo "No hay mensajes disponibles en la bandeja de entrada";
}



?> <h2>Mensajes Enviados</h2> <?php 


//mensajes enviados
if(false!=$msj=$miPDO -> mostrarEnviados($idUsu)){
    echo "<table>";
    echo "<tr><b><td><b>Asunto</b></td><td><b>Fecha</b></td><td><b>Remitente</b></td><td><b>Aceso</b></td></b></tr>";
    foreach ($msj as $value) {
        $id_mensaje=$value->get_id();
        
        $id_respuesta=$value->get_id_respuesta();
            echo "<tr>";
            echo "<td>".$value->get_asunto()."</td><td>".$value->get_fecha()." </td><td>$_SESSION[usuario]</td>";
            echo "<td><a href=cuerpoMensaje.php?id_mensaje=$id_mensaje&id_respuesta=$id_respuesta>Ver Mensaje</a></td>";
            echo "</tr>";
    }
    echo "</table>";
}
else{
    echo "No hay mensajes disponibles en la bandeja de salida";
}

//si es el admin tambien dispondra de los mensajes del foro en zona privada

if($_SESSION['tipo']==true){
    ?><h2>Mensajes Del foro</h2><?php 
    $msj = array();
    $msj=$miPDO -> mostarPublicos();
    echo "<table>";
    echo "<tr><b><td><b>Asunto</b></td><td><b>Mensaje</b></td><td><b>Fecha</b></td><td><b>Remitente</b></td><td><b>Acción</b></td></tr>";
    foreach ($msj as $value) {
        $id_mensaje=$value->get_id();
        $UsuarioEnviador=$miPDO->getUsuFromId($value->get_enviador());
        $nick=$UsuarioEnviador->get_nick();
            echo "<tr>";
            echo "<td>".$value->get_asunto()."</td><td>".$value->get_cuerpo()."</td><td>".$value->get_fecha()." </td><td>".$nick."</td>";
            echo "<td><a href=Borrar.php?id_mensaje=$id_mensaje>Borrar</a></td>";
            echo "</tr>"; 
    }
    echo "</table>";
}
$miPDO->desconectarBD();
pie();
?>