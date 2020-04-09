<?php
include ('ManejadorBD.php');
include ('bValidarForm.php');
include ('bGeneral.php');
include_once ("Sesion.php");
include ('Usuario.php');
include ('Mensaje.php');
cabecera('validaEnvio');
$miSesion = new Sesion();
$miPDO = new ManejadorBD();

if ((! isset($_REQUEST['bEnvio']) && ! isset($_REQUEST['bEnvio2'])) && ! isset($_REQUEST['bVolver'])) {
    include ('Enviar.php');
} elseif (isset($_REQUEST['bEnvio']) || isset($_REQUEST['bEnvio2'])) {
    $errores = [];
    $error = false;
    
    $asunto = recoge("asunto");
    $destinatario = recoge("destinatario");
    $cuerpo = recoge("cuerpo");
    $public = recoge("public");
    // Validaciones
    if (! cTexto($asunto)) {
        $error = true;
        $errores["asunto"] = "El campo asunto no es correcto";
    }
    
    if (! cDestinatario($destinatario)) {
        $error = true;
        $errores["destinatario"] = "El campo destinatario no es correcto";
    }
    if (! cArea($cuerpo)) {
        $error = true;
        $errores["cuerpo"] = "El campo cuerpo no es correcto";
    }
    
    if (! $error) {
        // si no hay errores enviamos el mensaje
        if ((isset($_REQUEST['bEnvio']))) {
            $miPDO->conectarBD();
            $fecha = date("Y/m/d H:i:s", time());
            $enviador = $miPDO->getUsuFromNick($_SESSION['usuario']);
            $idEnviador = $enviador->get_id();
            $miMensaje = new Mensaje($fecha, $cuerpo, false, $asunto, $idEnviador);
            if ($miPDO->insertaMsj($miMensaje) == true) {
                // si ha sido correctamente insertado
                echo "ha sido enviado correctamente";
                ?>
<form action="privada.php" method="post">
	<input class="button" TYPE="submit" name="bVolver" VALUE="Volver"><br>
</form>
<?php
                // si el mensaje es privado debemos insertar en la tabla de recibidos
                if ($public == "privado") {
                    $idLast = $miPDO->getIdLast();
                    foreach ($idLast as $value) {
                        $idLast = $value;
                    }
                    if ($miPDO->insertaMsjRecibidos($miMensaje, $idLast, $destinatario) == true) {} else {
                        ?>
<h2>Ha ocurrido un error1</h2>
<?php
                    }
                }
            } else {
                ?>
<h2>Ha ocurrido un error</h2>
<?php
            }
            $miPDO->desconectarBD();
        } else {
            $miPDO->conectarBD();
            $fecha = date("Y/m/d H:i:s", time());
            $enviador = $miPDO->getUsuFromNick($_SESSION['usuario']);
            $idEnviador = $enviador->get_id();

            //obtenemos el mensaje correspondiente a su id
            $mensajeAResponder=$miPDO->getMensaje($_REQUEST['id_mensaje']);
            //DE ESE OBJETO MENSAJE OBTENEMOS SU ID_RESPUESTA
            $id_respuesta=null;
            foreach ($mensajeAResponder as $value) {
                $id_respuesta=$value->get_id_respuesta();
            }
            //SI NO TIENE ID_RESPUESTA, LE ASIGNAMOS EL ID DEL MENSAJE
            if($id_respuesta==null){
                $id_respuesta=$_REQUEST['id_mensaje'];
            }
            $miMensaje = new Mensaje($fecha, $cuerpo, false, $asunto, $idEnviador,$id_respuesta);
            if ($miPDO->insertaMsj($miMensaje) == true) {
                // si ha sido correctamente insertado
                echo "ha sido enviado correctamente";
                ?>
<form action="privada.php" method="post">
	<input class="button" TYPE="submit" name="bVolver" VALUE="Volver"><br>
</form>
<?php               //he insertamos también en la tabla de recibidos
                    $idLast = $miPDO->getIdLast();
                    foreach ($idLast as $value) {
                        $idLast = $value;
                    }
                    if ($miPDO->insertaMsjRecibidos($miMensaje, $idLast, $destinatario) == true) {} else {
                        ?>
<h2>Ha ocurrido un error1</h2>
<?php
                    }
            } else {
                ?>
<h2>Ha ocurrido un error</h2>
<?php
            }
            $miPDO->desconectarBD();
        }
        // volvemos a la pagina de Enviar
    } elseif (isset($_REQUEST['bEnvio'])) {
        include ('Enviar.php');
        // esto es para el enviar2
    } else {
        $id_mensaje = $_REQUEST['id_mensaje'];
        //$miSesion->__set('id_mensaje', $id_mensaje);
       header("location:Enviar2.php?id_mensaje=$id_mensaje&error=mensaje erroneo");
        //include('Enviar2.php');
    }
}
if (isset($_REQUEST['bVolver'])) {
    header('location:privada.php');
}
pie();
?>