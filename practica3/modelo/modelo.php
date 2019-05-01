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
}

  function close() {
    $GLOBALS['enlace'].close();
  }
?>
