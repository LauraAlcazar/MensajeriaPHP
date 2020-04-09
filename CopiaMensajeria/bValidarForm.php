<?php

/*
 * Metodos:
 * sinTildes
 * sinEspacion
 * recoge
 * cTexto
 * cAarea
 * cNick
 * cContraseña
 * cContraseña2
 * cDestinatario
 * CEmail
 *
 */
function sinTildes($frase)
{
    $no_permitidas = array(
        "á",
        "é",
        "í",
        "ó",
        "ú",
        "Á",
        "É",
        "Í",
        "Ó",
        "Ú",
        "à",
        "è",
        "ì",
        "ò",
        "ù",
        "À",
        "È",
        "Ì",
        "Ò",
        "Ù"
    );
    $permitidas = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U",
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}

function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp = "";
    
    return $tmp;
}

function cTexto($text)
{
    $numCaracteres=mb_strlen($text);
    if (preg_match("/^[a-zÑñ ]+$/i", sinTildes($text)) && $numCaracteres<=30)
        return 1;
    else
        return 0;
}

/* valida los datos introducidos en el textarea */
function cArea($area)
{
    $numCaracteres=mb_strlen($area);
    if (htmlspecialchars(sinTildes($area)) && $numCaracteres<=1000) {
        return 1;
    } else
        return 0;
}

/* valida el nick */
function cNick($text)
{
    $numCaracteres=mb_strlen($text);
    if (preg_match("/^[A-Za-zÑñ ]{1,15}+$/", sinTildes($text)) &&  $numCaracteres<=20)
        return 1;
    else
        return 0;
}

/* valida una cotraseña */
function cContraseña($text)
{
    $numCaracteres=mb_strlen($text);
    if (preg_match("/^[A-Za-z0-9 ]{1,15}+$/", $text) && $numCaracteres<=20)
        return 1;
    else
        return 0;
}

/* valida la repetición de cotraseña, si no es igual a la primera da falso */
function cContraseña2($text1, $text2)
{
    if ($text1 === $text2)
        return 1;
    else
        return 0;
}

/* valida que el destinatario del mensaje esté en la base de datos */
function cDestinatario($destinatario)
{
    // include ('ManejadorBD.php');
    $miPDO = new ManejadorBD();
    $miPDO->conectarBD();
    $usuarios = array();
    $usuarios = $miPDO->muestraUsuRegist();
    $cont = 0;
    foreach ($usuarios as $value) {
        if ($value['id_usuario'] == $destinatario) {
            $cont ++;
        }
    }
    if ($cont > 0) {
        $miPDO->desconectarBD();
        return 1;
    } else {
        $miPDO->desconectarBD();
        return 0;
    }
}

/* valida que el email itroducido sea correcto */
function cEmail($sCorreo)
{
    $numCaracteres=mb_strlen($sCorreo);
    if($numCaracteres<=30)
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $sCorreo);
}

?>