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
    $renderparams = array();

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $vector[$i] = $row;
            $i++;
        }
    $renderparams["menu"] = $vector;
    }

    return $renderparams;
  }

  function select_evento() {
   $select = "SELECT * FROM evento";
   $result = mysqli_query($GLOBALS['enlace'],$select);
   $i = 0;
   $vector2 = array();

   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $vector2[$i] = $row;
           $i++;
       }
       $renderparams["evento"] = $vector2;
   }

   return $renderparams;
  }
}
?>
