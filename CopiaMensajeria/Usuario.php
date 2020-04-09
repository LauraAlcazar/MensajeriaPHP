<?php

class Usuario
{

    var $pass;

    var $nick;

    var $id;

    var $apellido;

    var $email;

    var $fechaAlta;

    var $tipo;

    function __construct($nick, $pass = -1, $apellido = "", $email = "", $fechaAlta = -1, $tipo = false, $id = -1)
    {
        $this->pass = $pass;
        $this->nick = $nick;
        $this->id = $id;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->fechaAlta = $fechaAlta;
        $this->tipo = $tipo;
    }

    function get_pass()
    {
        return $this->pass;
    }

    function get_nick()
    {
        return $this->nick;
    }

    function get_id()
    {
        return $this->id;
    }

    function get_apellido()
    {
        return $this->apellido;
    }

    function get_email()
    {
        return $this->email;
    }

    function get_fechaAlta()
    {
        return $this->fechaAlta;
    }

    function get_tipo()
    {
        return $this->tipo;
    }
}
?>