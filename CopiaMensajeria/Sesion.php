<?php

class Sesion
{

    function __construct()
    {
        ini_set("session.use_cookies", 1);
        ini_set('session.use_only_cookies', 1);
        session_start();    
    }

    function __set($var, $valor)
    {
        $_SESSION[$var] = $valor;
    }

    function __get($var)
    {
        if (isset($_SESSION[$var])) {
            return $_SESSION[$var];
        } else {
            return null;
        }
    }

    // Métodos normales
    public function cerrarSesion()
    {
        session_destroy();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }
        unset($_SESSION);
    }

    public function sesionRegistrada($var)
    {
        if (isset($_SESSION[$var])) {
            return true;
        } else {
            return false;
        }
    }
}
?>