<!DOCTYPE html>
<html lang="es">
    <head>
      <title>SALA TEABAG</title>
      <meta charset="utf-8">
      <meta name="description" content="Práctica de la asignatura SIBW">
      <meta name="keywords" content="HTML,CSS,JavaScript">
      <meta name="author" content="Juan Carlos Hermoso Quesada y Jonathan Ordóñez Cubero">
      <link rel="stylesheet" href="../css/estilo.css">
  </head>
        <body>
        <?php include("header.php");?>
        <!--zona principal-->
        <main>
            <!--panel auxiliar-->
            <?php include("sidebar.php");?>
            <!--panel de eventos-->
            <section id = "eventos">
                <div class="container">
                  <img src="../img/foo-fighters-anthem-2017-billboard-1548.jpg" alt="Avatar" class="image">
                  <div class="overlay">Foo Fighters</div>
                </div>
                <div class="container">
                  <img src="../img/maxresdefault.jpg" alt="Avatar" class="image">
                  <div class="overlay">Linkin Park</div>
                </div>
                <div class="container">
                  <img src="../img/disturbed.png" alt="Avatar" class="image">
                  <div class="overlay">Disturbed</div>
                </div>
                <div class="container">
                  <img src="../img/vio.jpg" alt="Avatar" class="image">
                  <div class="overlay">Violadores del Verso</div>
                </div>
            </section>
        </main>
        <?php include("footer.php");?>
    </body>
</html> 
