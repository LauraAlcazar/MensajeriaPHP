<?php

class Mensaje
{

    var $id;

    var $fecha;

    var $cuerpo;

    var $leido;

    var $asunto;

    var $enviador;
    
    var $id_respuesta;

    function __construct($fecha, $cuerpo, $leido, $asunto, $enviador,$id_Respuesta=NULL, $id = -1)
    {
        $this->fecha = $fecha;
        $this->cuerpo = $cuerpo;
        $this->leido = $leido;
        $this->asunto = $asunto;
        $this->enviador = $enviador;
        $this->id = $id;
        $this->id_respuesta=$id_Respuesta;
    }

    function get_fecha()
    {
        return $this->fecha;
    }

    function get_cuerpo()
    {
        return $this->cuerpo;
    }

    function get_leido()
    {
        return $this->leido;
    }

    function set_leido($var)
    {
        return $this->leido = $var;
    }

    function get_asunto()
    {
        return $this->asunto;
    }

    function get_enviador()
    {
        return $this->enviador;
    }

    function get_id()
    {
        return $this->id;
    }
    function get_id_respuesta()
    {
        return $this->id_respuesta;
    }
}
?>