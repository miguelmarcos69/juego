<?php
session_start()

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juego del bebercio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<?php
$fondo_aleatorio=mt_rand(1,6)

?>
<style>
    body{
        background-image: url('fondos/<?=$fondo_aleatorio?>.jpg');
        background-size: 100% ;
    }

</style>
<main id="container">
<h1 class="numeros border border-primary rounded-pill text-center p-3 mb-2  bg-dark text-white">El juego del bebercio</h1>
    <div class="numeros border border-primary rounded-pill text-center p-3 mb-2  bg-dark text-white" >
        <label for="num">Indica el número de jugadores</label>
        <input type="number" id="num" name="num">
        <button id="boton_num">Enviar</button>
    <form action="juego.php" method="post" id="jugadores">
        <input type="hidden" id="cantidad" name="cantidad">
    </form>
    </div>
</main>



<script>
    let num=document.getElementById("num")
    let jugadores=document.getElementById("jugadores")
    let boton_num=document.getElementById("boton_num")
    let hidden=document.getElementById("cantidad")

    boton_num.addEventListener("click",function (e) {
        //jugadores.innerText = " "


        hidden.value = num.value


        for (let i = 1; i <= num.value; i++) {

            console.log(i)
            console.log("prueba")
            let label_usuario = document.createElement("label")
            label_usuario.innerHTML = `introduce el nombre del jugador ${i}: `
            label_usuario.for = i
            jugadores.append(label_usuario)

            let usuario = document.createElement("input")
            usuario.type = "text"
            usuario.id = i
            usuario.name = i
            jugadores.append(usuario)
            let espacio = document.createElement("br")
            jugadores.append(espacio)
        }

        let boton_jugadores = document.createElement("button")
        boton_jugadores.innerHTML = "iniciar juego"
        jugadores.append(boton_jugadores)


    })


</script>
<div >
    <a href="anadir.php">Añadir preguntas</a><br>
    <a href="anadir.php">ver resultados</a><br>
</div>
</body>
</html>
