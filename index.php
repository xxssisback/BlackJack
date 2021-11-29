<!DOCTYPE html>
<html lang="es">

    <!-- Head -->
    <head>
        <!-- META INFO -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Titulo de la ventana -->
        <title>Black Jack - Developed by Pau Motos & Sergio Muñoz</title>

        <!-- Script para mostrar las cartas -->
        <script src="assets/js/cartas.js"></script>

        <!-- Links CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <!-- Body -->
    <body>
        
    <!-- Ventana central -->
    <div class="container">

        <!-- Titulo del juego y Autores -->
        <div class="title">
            <h1>Black Jack</h1>
            <span>Developed By Pau Motos & Sergio Muñoz</span>
        </div>

        <!-- Juego -->
        <div id="game" class="game">
        <?php include_once "assets/functions/game.php" ?>
        </div>
        <!-- Botones -->
        <form>
            <button class="button-block">Reiniciar juego</button>
        </form>

    </div>

    <!-- End Body -->
    </body>
    <script src="./assets./js./cartas.js"></script>

    <!-- End HTML -->
</html>