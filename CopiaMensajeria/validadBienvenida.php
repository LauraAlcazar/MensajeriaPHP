<?php
/*
 * en esta pagina se valida la bienvenida
 *
 * si ha pulsado el botón de acceder, comprueba que el usuario esté registrado en la base de datos y su nick y contraseña son correctos,
 * si es asi, permite acceso a zona privada, sino te dice que es erroneo
 *
 * si se ha pulsado el boton registrar te lleva a la pagina de registro, donde un nuevo ususario puede darse de alta
 */
include ("Sesion.php");
include ('bValidarForm.php');
include ('ManejadorBD.php');
include ('Usuario.php');
$miPDO = new ManejadorBD();
$miSesion = new Sesion();

if (! isset($_REQUEST['bAcceso']) && ! isset($_REQUEST['bRegistro'])) {
    // Si no se ha pulsado ninguno Incluimos el formulario vacio
    include ('Bienvenida.php');
} elseif (isset($_REQUEST['bAcceso'])) {
    $errores = [];
    $error = false;
    
    $nick_control = recoge("nick_control");
    $contraseña_control = recoge("cotraseña_control");
    // Validaciones
    if (! cNick($nick_control)) {
        $error = true;
        $errores["nick_control"] = "El campo nick no es correcto";
    }
    
    if (! cContraseña($contraseña_control)) {
        $error = true;
        $errores["contraseña_control"] = "El campo contraseña no es correcto";
    }
    
    if (! $error) {
        // si no hay errores vamos a la pagina privada.
        // 1.Comprobamos que el usuario está registrado en la base de datos
        $miUsu = new Usuario($nick_control, $contraseña_control);
        $miPDO->conectarBD();
        if (false != $usuRegistrado = $miPDO->getUsuRegistrado($miUsu)) {
            $count = 0;
            // comprobamos la cotraseña
            if (password_verify($miUsu->get_pass(), $usuRegistrado->get_pass())) {
                $count ++;
            }
            if ($count > 0) {
                // abrimos la sesion
                $miSesion->__set('acceso', 1);
                $miSesion->__set('usuario', $nick_control);
                $miSesion->__set('tipo', $usuRegistrado->get_tipo());
                header("location:privada.php");
            } else {
                echo "usuario o contraseña no valido";
            }
        } else {
            echo "usuario o contraseña no valido";
        }
    }
    $miPDO->desconectarBD();
    include ('Bienvenida.php');
    // header('location:Bienvenida.php');
}
if (isset($_REQUEST['bRegistro'])) {
    // vamos a la pagina de registro para incluir al usuario en la base de datos
    header('location:Registro.php');
}
?>

