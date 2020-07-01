<?php
session_start();
    $mysqli = new mysqli("localhost", "root", "", "juego_del_bebercio");
    if ($mysqli->connect_error) {
        echo "<p>Error en la conexión</p>";
    } else {
       // echo "<p>Se ha conectado perfectamente</p>";
        if (isset($_POST["descripcion"]) && isset($_POST["pregunta"]) && isset($_POST["valoracion"])) {
            $descripcion = $_POST["descripcion"];
            $pregunta = $_POST["pregunta"];
            $valoracion = $_POST["valoracion"];
            echo $pregunta;
            echo $descripcion;
            echo $valoracion;
            echo "hola";
            $sql = "insert into preguntas(pregunta, descripcion, difucultad) values ('${pregunta}', ' ${descripcion}',${valoracion});";
            $res = $mysqli->query(($sql));
           // $fila = $res->fetch_assoc();
        }


    }



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Introduciar preguntas</title>
</head>
<?php
$fondo_aleatorio=mt_rand(1,6)

?>
<style>
    body{
        background-image: url('fondos/<?=$fondo_aleatorio?>.jpg');
        background-size: 100% ;
    }

</style>
<body>
<form action="anadir.php"  method="post"  class="border border-primary rounded-pill text-center p-3 mb-2  bg-dark text-white">

    <h1>Introduce preguntas</h1>
    <label for="pregunta">Pregunta</label>
    <input type="text" name="pregunta" id="pregunta" required><br><br>
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion" required></textarea><br><br>
    <label for="valoracion">Valoración</label>
    <input type="number" min="1" max="10" name="valoracion" id="valoracion" required><br><br>
    <button id="guardar" class="btn btn-primary btn-sm">Guardar pregunta</button><br><br>
    <a href="index.php">Volver al juego</a>


</form>
<script>






</script>
</body>
</html>