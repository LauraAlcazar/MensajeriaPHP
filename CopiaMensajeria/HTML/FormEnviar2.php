<?php

?>

<h1>Enviar</h1>
<form action="validaEnvio.php?id_mensaje=<?php echo $id_mensaje?>" method="post">
	<input class="button" TYPE="submit" name="bVolver" VALUE="Volver"><br>
	<br> Asunto: <input type="text" name="asunto" maxlength='30' value="<?php echo $asunto?>" ><br>
	<label >Destinatario:</label>
    <select name="destinatario">
    <?php
    echo "<option value='$remitente'name='id_mensaje'>$nickRemitente</option>";
    ?>
    </select>
    <br />
	<textarea name="cuerpo" cols="120" rows="10" maxlength='1000'>Re:</textarea><br>
	<p>Longitud maxima 1000 caracteres</p>
	<input class="button" TYPE="submit" name="bEnvio2" VALUE="Enviar">
</form>
