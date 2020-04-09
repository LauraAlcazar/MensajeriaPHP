<?php
/* validamos los datos introducidos en el formulario de registro */
include ('ManejadorBD.php');
include ('bValidarForm.php');
include ("Sesion.php");
include ('Usuario.php');
$miSesion = new Sesion();
$miPDO = new ManejadorBD();

if (! isset($_REQUEST['bEnviar']) && ! isset($_REQUEST['bVolver'])) {
    // Si no se ha pulsado ninguno Incluimos el formulario vacio
    include ('Registro.php');
} elseif (isset($_REQUEST['bEnviar'])) {
    $errores = [];
    $error = false;
    
    $nick_control = recoge("nick_control");
    $contraseña_control = recoge("cotraseña_control");
    $contraseña_control2 = recoge("cotraseña_control2");
    $apellido_control = recoge("apellido_control");
    $email_control = recoge("email_control");
    // Validaciones
    if (! cNick($nick_control)) {
        $error = true;
        $errores["nick_control"] = "El campo nick no es correcto";
    }
    
    if (! cContraseña($contraseña_control)) {
        $error = true;
        $errores["contraseña_control"] = "El campo contraseña no es correcto, debe contener letras o números y de 1 a 15 caracteres";
    }
    if (! cContraseña2($contraseña_control2, $contraseña_control)) {
        $error = true;
        $errores["contraseña2_control"] = "Las contraseñas no coinciden";
    }
    if (! cNick($apellido_control)) {
        $error = true;
        $errores["apellido_control"] = "El campo apellido no es correcto";
    }
    if (! cEmail($email_control)) {
        $error = true;
        $errores["email_control"] = "El campo email no es correcto";
    }
    
    if (! $error) {
        // si no hay errores:
        // creamos un objeto usuario
        $miPDO->conectarBD();
        $fecha = date("Y/m/d", time());
        $miUsu = new Usuario($nick_control, $contraseña_control, $apellido_control, $email_control, $fecha, false);
        // incluimos al usuario en la bbdd.
        if ($miPDO->insertaUsu($miUsu) == true) {
            // si ha sido correctamente insertado
            $miPDO->desconectarBD();
            header('location:RegistroOk.php?');
        } else {
            ?>
<h2>Ha ocurrido un error o el usuario ya existe</h2>
<?php
        }
    }
    include ('Registro.php');
}
if (isset($_REQUEST['bVolver'])) {
    header('location:Bienvenida.php');
}

?>

