<?php 

//require_once "src/db_connect.php";
require_once 'vendor/autoload.php';

$link = mysqli_connect('127.0.0.1','usuario','lechuza','sibw');
require("portada.html");

$select = "SELECT * FROM menu";
$result = mysqli_query($link, $select);
$i = 0;
$vector = array();
$renderparams = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $vector[$i] = $row["nombre"];
        $i++;
    }
    $renderparams["menu"] = $vector;
}

$select = "SELECT * FROM evento";
$result = mysqli_query($link, $select);
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

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment( $loader,[]);

// echo $twig->render('portada.html',$renderparams);
echo $twig->render('evento.html',$renderparams);

?>
