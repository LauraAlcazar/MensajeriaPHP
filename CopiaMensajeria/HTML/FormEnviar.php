<?php
?>
<h1>Enviar</h1>
<form action="validaEnvio.php" method="post">
	<input class="button" TYPE="submit" name="bVolver" VALUE="Volver"><br>
	Privado:<input  id='privado' type="radio" name="public" value="privado" checked>
	Publico:<input id='publico' type="radio" name="public" value="publico"><br>
	<br> Asunto: <input type="text" name="asunto" maxlength='30' /><br>
	<label id="labelDestinatario" style="display:initial">Destinatario:</label>

    <select id='destinatario' name="destinatario" style="display:initial">
    <?php
    foreach ($usuarios as $value) {
            echo "<option value='$value[id_usuario]'>$value[nick]</option>";
        }
    ?>
    </select>
    <br />
	<textarea name="cuerpo" cols="120" rows="10" maxlength='1000'></textarea><br>
	<p>Longitud maxima 1000 caracteres</p>
	<input class="button" TYPE="submit" name="bEnvio" VALUE="Enviar">
</form>
<script type="text/javascript" >
	publico.addEventListener("focus", ocultarCampo);
	function ocultarCampo(){
		destinatario.setAttribute("style","display:none");
		labelDestinatario.setAttribute("style","display:none");
	}
	privado.addEventListener("focus", desocultarCampo);
	function desocultarCampo(){
		destinatario.setAttribute("style","display:initial");
		labelDestinatario.setAttribute("style","display:initial");
	}
	
</script>