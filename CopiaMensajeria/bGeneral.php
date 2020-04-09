<?php
/*
 * METODOS:
 * cabecera, con el css de la aplicación
 * pie
 */
function cabecera($titulo) // el archivo actual
{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>
				<?php
    echo $titulo;
    ?>
			
			</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/style.css" title="style" />
</head>
<body>
<?php
}

function pie()
{
    echo "</body>
	</html>";
}

?>
