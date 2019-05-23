<?php
require_once "modelo.php";
require_once "session.php";

$enlace = mysqli_connect("127.0.0.1", "usuario", "lechuza", "sibw");

class BD {

  public function __construct(){
    //echo 'Esto funka';
  }

  function select_menu() {
    $select = "SELECT * FROM menu";
    $result = mysqli_query($GLOBALS['enlace'], $select);
    $i = 0;
    $vector = array();

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $vector[$i] = $row;
            $i++;
        }
    }
    return $vector;
  }

  function select_evento() {
   $select = "SELECT * FROM evento";
   $result = mysqli_query($GLOBALS['enlace'],$select);
   $i = 0;
   $vector = array();

   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $vector[$i] = $row;
           $i++;
       }
   }
   return $vector;
  }
    
function select_comentario($id) {
    $result = array();    
    $select = "SELECT * FROM comentarios WHERE id_evento=?";

    /* crear una sentencia preparada */
    if ($stmt = mysqli_prepare($GLOBALS['enlace'], $select)) {

    /* ligar parámetros para marcadores */
    mysqli_stmt_bind_param($stmt, "i", $id);

    /* ejecutar la consulta */
    mysqli_stmt_execute($stmt);

    /* ligar variables de resultado */
    $meta = $stmt->result_metadata();

    while ($field = $meta->fetch_field()) {
        $params[] = &$row[$field->name];
    }

    call_user_func_array(array($stmt, 'bind_result'), $params);

    while ($stmt->fetch()) {
        foreach($row as $key => $val) {
            $c[$key] = $val;
        }
        $result[] = $c;
    }
    
    /* cerrar sentencia */
    mysqli_stmt_close($stmt);
  }
    
    /* cerrar conexión */
    //mysqli_close($GLOBALS['enlace']);
    
  return $result;
}

function getEvento($id){
        $select = "SELECT * FROM evento WHERE id=?";
        
        /* crear una sentencia preparada */
        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $select)) {

        /* ligar parámetros para marcadores */
        mysqli_stmt_bind_param($stmt, "i", $id);

        /* ejecutar la consulta */
        mysqli_stmt_execute($stmt);

        /* ligar variables de resultado */
        $meta = $stmt->result_metadata(); 
        
        while ($field = $meta->fetch_field()) { 
            $params[] = &$row[$field->name]; 
        } 

        call_user_func_array(array($stmt, 'bind_result'), $params); 

        while ($stmt->fetch()) { 
            foreach($row as $key => $val) { 
                $c[$key] = $val; 
            } 
            $result = $c;
        } 

        /* cerrar sentencia */
        mysqli_stmt_close($stmt);
    }

    /* cerrar conexión */
    //mysqli_close($GLOBALS['enlace']);
    
    return $result;
}

  function select_galeria() {
    $select = "SELECT * FROM galeria";
    $result = mysqli_query($GLOBALS['enlace'],$select);
    $i = 0;
    $vector = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $vector[$i] = $row;
            $i++;
        }
    }
    return $vector;
  }
    
    function insert_comentario($nombre,$idEvento,$comentario,$fecha_hora) {
        $query = "INSERT INTO comentarios(id_evento,nick,fecha_hora,texto) VALUES (?,?,?,?)";  
        
        /* crear una sentencia preparada */
        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $query)) {

        /* ligar parámetros para marcadores */
            mysqli_stmt_bind_param($stmt, "isss", $idEvento,$nombre,$fecha_hora,$comentario);

        /* ejecutar la consulta */
            mysqli_stmt_execute($stmt);

        /* cerrar sentencia */
            mysqli_stmt_close($stmt);
        }   

    /* cerrar conexión */
    //  mysqli_close($GLOBALS['enlace']);

    }
    

    function login($nombre,$pass) {
        /*$result = array();    
        $select = "SELECT * FROM usuarios WHERE nick=? AND pass=?";

        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $select)) {

            mysqli_stmt_bind_param($stmt, "ss", $nombre, $pass);     

            mysqli_stmt_execute($stmt);
            
            var_dump($stmt);
            
            if ($stmt->num_rows > 0) {
                echo "¡Usuario identificado con éxito!";
                header("Refresh:1; url=/");
            }
            else {
                echo "Usuario inexistente";
                header("Refresh:1; url=/login");
            }
        }*/
        $select = "SELECT * FROM usuarios WHERE nick='$nombre' AND pass='$pass'";
        $result = mysqli_query($GLOBALS['enlace'], $select);
        $row = mysqli_fetch_array($result);
               
        if ($result->num_rows > 0) {
            echo "¡Usuario identificado con éxito!";
            
            $session = new Session;
            $session->iniciar($nombre,$row["tipo"]);
            
            header("Refresh:1; url=/");
        }
        else {
            echo "Usuario o contraseña incorrecta";
            
            header("Refresh:1; url=/login");
        }
    }
    
     function registrar($nombre,$email,$pass) {
         $query = "INSERT INTO usuarios (nick, email, pass,tipo) VALUES (?,?,?,?)";
         if ($stmt = mysqli_prepare($GLOBALS['enlace'], $query)) {
            
            $tipo = "registrado";   
            mysqli_stmt_bind_param($stmt, "ssss", $nombre,$email,$pass,$tipo);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
            
            echo "¡Usuario registrado con éxito!";
            header("Refresh:1; url=/");
        }   
    }
    
    function borrar_comentario($id) {

    }

    function editar_comentario($id,$texto) {

    }

    function select_comentarios() {
        $select = "SELECT * FROM comentarios";
        $result = mysqli_query($GLOBALS['enlace'], $select);
        $i = 0;
        $vector = array();

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $vector[$i] = $row;
                $i++;
            }
        }
        return $vector;
    }
    
    function buscar_comentario($id) {

    }

    function delete_evento($id) {
        $query = "DELETE FROM evento WHERE id=?";

        /* crear una sentencia preparada */
        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $query)) {

            /* ligar parámetros para marcadores */
            mysqli_stmt_bind_param($stmt, "i",$id);

            /* ejecutar la consulta */
            mysqli_stmt_execute($stmt);

            /* cerrar sentencia */
            mysqli_stmt_close($stmt);
        }
    }

    function insert_update_evento($id,$nombre,$grupo,$texto,$fechaP,$fechaM){
        $query = '';
        if ($id == -1){
            $query = "INSERT INTO evento(nombre,texto,grupo,fecha_publi,fecha_mod) VALUES (?,?,?,?,?)";
        } else {
            $query = "UPDATE evento SET nombre=?, texto=?, grupo=?, fecha_publi=?, fecha_mod=? WHERE id=?";
        }

        /* crear una sentencia preparada */
        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $query)) {

            /* ligar parámetros para marcadores */
            if ($id == -1)
                mysqli_stmt_bind_param($stmt, "sssss", $nombre,$grupo,$texto,$fechaP,$fechaM);
            else
                mysqli_stmt_bind_param($stmt, "sssssi", $nombre,$grupo,$texto,$fechaP,$fechaM,$id);
            /* ejecutar la consulta */
            mysqli_stmt_execute($stmt);

            /* cerrar sentencia */
            mysqli_stmt_close($stmt);
        }

    }

    function aniadir_foto() {

    }

    function borrar_foto($id) {

    }

    function modificar_rol($id) {

    }

    function select_usuario($nick) {
        $select = "SELECT * FROM usuarios WHERE nick='$nick'";
        $result = mysqli_query($GLOBALS['enlace'],$select);
        $vector = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $vector = $row;
            }
        }
        return $vector;
    }

    function modificar_perfil($nick,$pass,$email,$descripcion) {
        $update = "UPDATE usuarios SET pass = '$pass', email = '$email', descripcion = '$descripcion' WHERE nick = '$nick'";
        $result = mysqli_query($GLOBALS['enlace'],$update);
    }

    function modificar_comentario($id,$texto) {
        $update = "UPDATE comentarios SET texto = '$comentario' WHERE id = '$id'";
        $result = mysqli_query($GLOBALS['enlace'],$update);
    }

    function eliminar_comentario($id) {
        $query = "DELETE FROM comentarios WHERE id=?";

        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $query)) {

            mysqli_stmt_bind_param($stmt, "i",$id);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        }
    }

    function select_comentario_mod($id) {
        $select = "SELECT * FROM comentarios WHERE id=?";
    
        /* crear una sentencia preparada */
        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $select)) {

            /* ligar parámetros para marcadores */
            mysqli_stmt_bind_param($stmt, "i", $id);
    
            /* ejecutar la consulta */
            mysqli_stmt_execute($stmt);
    
            /* ligar variables de resultado */
            $meta = $stmt->result_metadata(); 
            
            while ($field = $meta->fetch_field()) { 
                $params[] = &$row[$field->name]; 
            } 
    
            call_user_func_array(array($stmt, 'bind_result'), $params); 
    
            while ($stmt->fetch()) { 
                foreach($row as $key => $val) { 
                    $c[$key] = $val; 
                } 
                $result = $c;
            } 
    
            /* cerrar sentencia */
            mysqli_stmt_close($stmt);
        }
    
        /* cerrar conexión */
        //mysqli_close($GLOBALS['enlace']);
        
        return $result;

    }

    function select_usuarios() {
        $select = "SELECT * FROM usuarios";
        $result = mysqli_query($GLOBALS['enlace'], $select);
        $i = 0;
        $vector = array();
    
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $vector[$i] = $row;
                $i++;
            }
        }
        return $vector;
      }

} 
?>
