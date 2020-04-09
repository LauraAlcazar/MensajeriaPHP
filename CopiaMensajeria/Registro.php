<?php
/**Formulario donde el usuario rellena sus datos para darse de alta en la base de datos
 * o volver si se ha equivocado
 * */
include ('bGeneral.php');
cabecera("registro");
if (isset($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }

    include('HTML/FormRegistro2.php');
}
else{
    include('HTML/FormRegistro.html');
}
pie();
?>