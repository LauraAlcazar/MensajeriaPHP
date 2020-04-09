<?php
?>
<h1>Registro</h1>
<form action=validaRegistro.php method="post">
	Nick: <input type="text" name="nick_control" maxlength='20' value="<?php echo $nick_control?>" > <br> 
	Contraseña: <input type="password" name="cotraseña_control" maxlength='20'/> <br> 
	Repita Contraseña: <input type="password" name="cotraseña_control2" /> <br> 
	Apellido: <input type="text" name="apellido_control" maxlength='20' value="<?php echo $apellido_control?>" > <br>
	Email: <input type="email" name="email_control" maxlength='20' value="<?php echo $email_control?>" > <br>
	<input class="button" TYPE="submit" name="bEnviar" VALUE="Enviar">
	<input class="button" TYPE="submit" name="bVolver" VALUE="Volver">
</form>
