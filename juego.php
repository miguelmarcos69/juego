<?php
session_start();
if (isset($_POST["cantidad"])) {
    $cantidad_jug = $_POST["cantidad"];
    $mysqli = new mysqli("localhost", "root", "", "juego_del_bebercio");
    if ($mysqli->connect_error) {
        echo "<p>Error en la conexión</p>";
    } else {
        //echo"<p>Se ha conectado perfectamente</p>";
        $sql = " select pregunta,descripcion,difucultad,id_pregunta from preguntas;";
        $res = $mysqli->query(($sql));
        //cuenta el número de preguntas
        $sql2 = "select count(pregunta) as num_preguntas from preguntas;";
        $res2 = $mysqli->query(($sql2));
        $fila2 = $res2->fetch_assoc();
        $num_preguntas = $fila2["num_preguntas"];

    }


    $array_jugadores = array();
    for ($i = 1; $i < $cantidad_jug + 1; $i++) {
        array_push($array_jugadores, $_POST[$i]);
    }
    $_SESSION["jugadores"] = $array_jugadores;
  //print_r($_SESSION["jugadores"]);
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
    <title>El juego del bebercio</title>
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


<body >
<h1 class="border border-primary rounded-pill text-center p-3 mb-2  bg-dark text-white">El juego del bebercio</h1>






<?php
//elegir el jugador
$num_aleatorio=mt_rand(0,count($_SESSION["jugadores"])-1);


foreach ($_SESSION["jugadores"] as  $i=>$jugador){
    if ($num_aleatorio==$i){
        ?>
        <div id="pregunta" class="border border-primary rounded-pill text-center p-3 mb-2  bg-dark text-white">
            <h2>Es el turno de <?=$jugador?></h2>
<?php
//elegir la pregunta de la base de datos
        $fila = $res->fetch_assoc();
    $preguntas_aleatorio=mt_rand(1,$num_preguntas);


        while ($fila ){
            if ($preguntas_aleatorio==$fila["id_pregunta"]){
?>
                <p><?=$fila["pregunta"]?></p>
                <p><?=$fila["descripcion"]?></p>
               <!--<p><?=$fila["id_pregunta"]?></p>-->
                <?php

            }
                $fila = $res->fetch_assoc();

        }

?>

        <button id="sig_pregunta" class="btn btn-primary btn-sm">Siguente pregunta</button>
        </div>

<?php



    }

}

?>

<br><br>
<br><br>

<div >
    <a href="index.php">Seleccionar jugadores</a>
</div>

<script>
    let boton=document.getElementById("sig_pregunta")
    boton.addEventListener("click", function (e) {
        console.log("Recargar página")
        location.reload();

    })


</script>
</body>
</html>

