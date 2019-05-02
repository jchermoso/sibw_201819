<?php
require_once("modelo.php");

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
    //mysqli_stmt_close($stmt);
  }
    
    /* cerrar conexión */
    mysqli_close($GLOBALS['enlace']);
    
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
    
    function insert_comentario($nombre,$id,$comentario,$email,$fecha_hora,$ipAddress) {
       $query = "INSERT INTO comentarios(id_evento,nombre,correo,fecha_hora,texto,ip_usuario) VALUES (?,?,?,?,?,?)";  
        
        /* crear una sentencia preparada */
        if ($stmt = mysqli_prepare($GLOBALS['enlace'], $query)) {

        /* ligar parámetros para marcadores */
            mysqli_stmt_bind_param($stmt, "isssss", $id,$nombre,$email,$fecha_hora,$comentario,$ipAddress);

        /* ejecutar la consulta */
            mysqli_stmt_execute($stmt);

        /* cerrar sentencia */
            mysqli_stmt_close($stmt);
        }   

    /* cerrar conexión */
  //  mysqli_close($GLOBALS['enlace']);
    
    }
  
} 

?>
