<?php

class ManejadorBD
{

    var $db;


    function conectarBD()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=mensajeria", "root", "");
            $this->db->exec("set names utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage();
        }
    }

    function desconectarBD()
    {
        $this->db = NULL;
    }

    /* funcion que registra un usuario en la base de datos, en la tabla de usuarios */
    function insertaUsu($usu)
    {
        // obtener nick y cotraseña del usuario
        $pass = $usu->get_pass();
        $nickUsu = $usu->get_nick();
        $apellido = $usu->get_apellido();
        $email = $usu->get_email();
        $fechaAlta = $usu->get_fechaAlta();
        $tipo = $usu->get_tipo();
        try {
            // Preparamos consulta
            $stmt = $this->db->prepare("INSERT INTO usuarios (contraseña, nick, apellido, email, fecha, tipo) VALUES (?, ?, ?, ? ,? ,?)");
            // encriptar cotraseña previamente a la inserción
            $cotraseña_encript = password_hash($pass, PASSWORD_DEFAULT);
            $cotraseña = $cotraseña_encript;
            $nick = $nickUsu;
            
            $stmt->bindParam(1, $cotraseña);
            $stmt->bindParam(2, $nick);
            $stmt->bindParam(3, $apellido);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $fechaAlta);
            $stmt->bindParam(6, $tipo);
            
            $stmt->execute();
            
            if ($stmt->rowCount() == 1) {
                $cuenta = $stmt->rowCount();
                return true;
            } else
                return false;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000)
                return false;
            else
                return false;
        }
    }

    /* funcion que sirve para verificar si el usuario esta regitrado */
    function getUsuRegistrado($usu)
    {
        try {
            $nick = $usu->get_nick();
            $consulta = "SELECT * FROM usuarios where nick=:nick";
            $stmt = $this->db->prepare($consulta);
            $stmt->bindParam(':nick', $nick);
            $stmt->execute();
            $fila = $stmt->fetch();
            $miUsu=$this->componeUsu($fila);
            //$miUsu = new Usuario($fila['nick'], $fila['contraseña'], $fila['apellido'], $fila['email'], $fila['fecha'], $fila['tipo'], $fila['id_usuario']);
            return $miUsu;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage(); // getCodeMessage();
            // echo "<p>Error: " . $e->getCode();
            return false;
        }
    }
    /*compone una objetos usuario con cada registro devuelto por la base de datos*/
    function componeUsu($fila){
         $miUsu = new Usuario($fila['nick'], $fila['contraseña'], $fila['apellido'], $fila['email'], $fila['fecha'], $fila['tipo'], $fila['id_usuario']);
         return $miUsu;
    }
    /* funcion que me devuelve un usuario pasandole un id */
    function getUsuFromId($idUsu)
    {
        try {
            $id = $idUsu;
            $consulta = "SELECT * FROM usuarios where id_usuario=:id";
            $stmt = $this->db->prepare($consulta);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $fila = $stmt->fetch();
            $miUsu=$this->componeUsu($fila);
            //$miUsu = new Usuario($fila['nick'], $fila['contraseña'], $fila['apellido'], $fila['email'], $fila['fecha'], $fila['tipo'], $fila['id_usuario']);
            return $miUsu;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage(); // getCodeMessage();
            // echo "<p>Error: " . $e->getCode();
            return false;
        }
    }
    
    /*le pasamos el nick de un usuario y devuelve el usu*/
    function getUsuFromNick($nick)
    {
        try {
            $nick = $nick;
            $consulta = "SELECT * FROM usuarios where nick=:nick";
            $stmt = $this->db->prepare($consulta);
            $stmt->bindParam(':nick', $nick);
            $stmt->execute();
            $fila = $stmt->fetch();
            $miUsu=$this->componeUsu($fila);
            //$miUsu = new Usuario($fila['nick'], $fila['contraseña'], $fila['id_usuario']);
            return $miUsu;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage(); // getCodeMessage();
            // echo "<p>Error: " . $e->getCode();
            return false;
        }
    }

    /* funcion que registra un mensaje en la tabla de mensaje */
    function insertaMsj($msj)
    {
        $fecha = $msj->get_fecha();
        $cuerpo = $msj->get_cuerpo();
        $asunto = $msj->get_asunto();
        $leido = $msj->get_leido();
        $destinatario = $msj->get_enviador();
        $id_respuesta = $msj->get_id_respuesta();
        
        try {
            // Preparamos consulta
            $stmt = $this->db->prepare("INSERT INTO mensaje (asunto, fecha_mensaje, cuerpo, leido, id_usuario, id_respuesta) VALUES (?, ?, ?, ?, ?, ?)");
            // encriptar cotraseña previamente a la inserción
            $stmt->bindParam(1, $asunto);
            $stmt->bindParam(2, $fecha);
            $stmt->bindParam(3, $cuerpo);
            $stmt->bindParam(4, $leido);
            $stmt->bindParam(5, $destinatario);
            $stmt->bindParam(6, $id_respuesta);
            
            $stmt->execute();
            
            if ($stmt->rowCount() == 1) {
                $cuenta = $stmt->rowCount();
                return true;
            } else
                return false;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000)
                return false;
            else
                return false;
        }
    }

    /* funcion que inserta un mensaje privado en la tabla de recibe */
    function insertaMsjRecibidos($msj, $idLast, $destinatario)
    {
        // necesito el id del $msj (el id del último mensaje) y el id del usuario que recibe el msj
        $destinatario = $destinatario;
        try {
            // Preparamos consulta
            $stmt = $this->db->prepare("INSERT INTO recibe (id_mensaje,id_usuario) VALUES (?, ?)");
            // encriptar cotraseña previamente a la inserción
            $stmt->bindParam(1, $idLast);
            $stmt->bindParam(2, $destinatario);
            
            $stmt->execute();
            
            if ($stmt->rowCount() == 1) {
                $cuenta = $stmt->rowCount();
                return true;
            } else
                return false;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000)
                return false;
            else
                return false;
        }
    }

    /* obtiene el indice del último mensaje enviado */
    function getIdLast()
    {
        try {
            $idLast = 0;
            $consulta = "SELECT MAX(id_mensaje) FROM mensaje";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            $idLast = $stmt->fetch();
            return $idLast;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }

    /* devuelve un array de los usuarios registrados en la base de datos */
    function muestraUsuRegist()
    {
        try {
            $usuarios = array();
            $consulta = "SELECT * FROM usuarios order by nick";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($fila = $stmt->fetch()) {
                $usuarios[] = array(
                    "id_usuario" => "$fila[id_usuario]",
                    "nick" => "$fila[nick]"
                );
            }
            return $usuarios;
            $miPDO->desconectarBD($db);
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }

    /*compone un objetos mensaje con cada registro devuelto por la base de datos*/
    function componeMensaje($fila){
        $miMnesaje = new Mensaje($fila['fecha_mensaje'], $fila['cuerpo'], $fila['leido'], $fila['asunto'], $fila['id_usuario'], $fila['id_respuesta'], $fila['id_mensaje']);
        return $miMnesaje;
    }
    
    /* muestra los mensajes que ha recibido un usuario en concreto, los que tienen respuesta los agurupa */
    function mostrarRecibidos($idUsu)
    {
        try {
            $msj = array();
            $consulta = "SELECT (select IfNull(m.id_respuesta, m.id_mensaje)) as agrupadora, m.* FROM mensaje m inner join recibe r on m.id_mensaje = r.id_mensaje where r.id_usuario = $idUsu group by agrupadora order by fecha_mensaje desc";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($fila = $stmt->fetch()) {
                $miMnesaje=$this->componeMensaje($fila);
                $msj[] = $miMnesaje;
            }
            return $msj;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }
    /* muestra los mensajes que ha enviado un usuario en concreto, los que tienen respuesta los agrupa */
    function mostrarEnviados($idUsu)
    {
        try {
            $msj = array();
            $consulta = "SELECT (select IfNull(m.id_respuesta, m.id_mensaje)) as agrupadora, m.* FROM mensaje m where id_usuario = $idUsu group by agrupadora order by fecha_mensaje desc ";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($fila = $stmt->fetch()) {
                $miMnesaje=$this->componeMensaje($fila);
                $msj[] = $miMnesaje;
            }
            return $msj;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }
    /* devuelve un mensaje en concreto a partir de su id */
    function getMensaje($idMensaje)
    {
        try {
            $msj = array();
            $consulta = "SELECT * FROM mensaje where id_mensaje=$idMensaje";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            $fila = $stmt->fetch();
            $miMnesaje=$this->componeMensaje($fila);
            $msj[] = $miMnesaje;
            return $msj;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }
    /* devuelve los mensajes que coinciden con el id_respuesta */
    function getMensaje2($idRespuesta)
    {
        try {
            $msj = array();
            $consulta = "SELECT * FROM mensaje where id_respuesta=$idRespuesta or id_mensaje=$idRespuesta";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while($fila = $stmt->fetch()){
                $miMnesaje=$this->componeMensaje($fila);
                $msj[] = $miMnesaje;
            }
            return $msj;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }

    /*obtiene los mensajes publicos */
    function mostarPublicos()
    {
        try {
            $msj = array();
            $consulta = "SELECT m.* FROM mensaje m left join recibe r on m.id_mensaje=r.id_mensaje where r.id_usuario IS NULL order by fecha_mensaje desc";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($fila = $stmt->fetch()) {
                $miMnesaje=$this->componeMensaje($fila);
                $msj[] = $miMnesaje;
            }
            return $msj;
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }

    /* borra un mensaje a partir de su id correspondiente */
    function deleteMsj($id)
    {
        try {
            $consulta = "DELETE FROM mensaje where id_mensaje=$id";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }

    /* pone en la base de datos un mensaje como leido */
    function msjLeido($id)
    {
        try {
            $consulta = "UPDATE `mensaje` SET `leido` = '1' WHERE `mensaje`.`id_mensaje` =$id or id_respuesta=$id";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
        } catch (PDOException $e) {
            // echo "<p>Error: " . $e->getMessage();
            return false;
        }
    }
}
?>