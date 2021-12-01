<?php

$t = new blackjack;
$t->iniciar();
session_start();


    
$_SESSION["jugador"] == 2;
$_SESSION["jugador"]1 = [];
$_SESSION["jugador"]2 = [];
$cartas = [2,3,4,5,6,7,8,9,10,11];
$boo = 0;

    

    
    /**
     *  FUNCIONES PRINCIPALES
     */

    function mesa()
    {
        echo ("
        ____________________
        |                    |
        |                    |
        |    J1        J2    |
        |                    |
        |____________________|");
    }
    
    // Esta funcion es la que se encarga de iniciar la partida
    function iniciar()
    {  
        $sumj1 = sumaCartasj1();
        $sumj2 = sumaCartasj2();
        do {
            $_SESSION["jugador"] == 1 ? $_SESSION["jugador"] = 2 : $_SESSION["jugador"] = 1;
            mostrarJugador($sumj1, $sumj2);
            
            echo ("0. ");
            echo ("Salir\n");
            echo ("1. ");
            echo ("Pedir carta\n");
            echo ("2. ");
            echo ("Plantarte\n");
            $opt = readline("Dime la opcion que quieres elegir jugador " . $_SESSION["jugador"] . " : ");
            
            switch ($opt) {
                case '0':
                    $boo == 1;
                    break;
                case '1':
                    lanzarCarta($_SESSION["jugador"]);
                    if ($_SESSION["jugador"] == 1) {
                        $sumj1 = sumaCartasj1();
                        mostrarJugador($sumj1, $sumj2);
                    } else {
                        $sumj2 = sumaCartasj2();
                        mostrarJugador($sumj1, $sumj2);
                    }
                    echo("\n");
                    maxLimite($sumj1, $sumj2);
                    break;
                case '2':
                    noHayGanador($sumj1, $sumj2);
                    break;
                default:
                    break;
            }
            echo ("\nJugador1: ");
            echo ("(enter)");
            readline();
            system("clear");
        } while ($opt != 0);
    }


    // Esta funcion recibe al ugador y al mesero para poder repartir la carta
    function lanzarCarta($_SESSION["jugador"]){
        if ($_SESSION["jugador"] == 1){
            //$num = rand($cartas[0], $cartas[count($cartas)]);
            $num = $cartas[rand(0,count($cartas)-1)];
            array_push($_SESSION["jugador"] = 1, $num);
        } else {
            //$num = rand($cartas[0], $cartas[count($cartas)]);
            $num = $cartas[rand(0,count($cartas)-1)];
            array_push($_SESSION["jugador"] = 2, $num);
        }
    }


    function mostrarJugador ($sumj1, $sumj2) {
        if ($_SESSION["jugador"] == 1) {
            echo("==============================================<br>");
            echo ("   Jugador " . $_SESSION["jugador"] . " tu mano es: [");
            (mostrarMano($_SESSION["jugador"]));
            echo ("] Total: " . $sumj1 . "<br>");
            echo ("==============================================<br><br>");
        } else {
            echo ("==============================================<br>");
            echo ("   Jugador " . $_SESSION["jugador"] . " tu mano es: [");
            (mostrarMano($_SESSION["jugador"]));
            echo  ("] Total: " . $sumj2 . "<br>");
            echo ("==============================================<br><br>");
        }
    }

    // mostrar arrays
    function mostrarMano($_SESSION["jugador"]) {
        if ($_SESSION["jugador"] == 1) {
            for ($i=0; $i < count($_SESSION["jugador"]1); $i++) { 
                echo ($_SESSION["jugador"]1[$i]);
                if($i<count($_SESSION["jugador"]1)-1) echo ",";
            }    
        } else {
            for ($x=0; $x < count($_SESSION["jugador"]2); $x++) { 
                echo ($_SESSION["jugador"]2[$x]);
                if($x<count($_SESSION["jugador"]1)-1) echo ",";
            } 
        }
        
    }


    // Funciones para sumar las cartas de la mano
    function sumaCartasj1(){ 
        $sumj1 = 0;
        for ($i = 0; $i < count($_SESSION["jugador"]1); $i++) {
            $sumj1 += $_SESSION["jugador"]1[$i];
        }
        return $sumj1;
    }

    function sumaCartasj2(){
        $sumj2 = 0;
        for ($x = 0; $x < count($_SESSION["jugador"]2); $x++) {
            $sumj2 += $_SESSION["jugador"]2[$x];
        }
        return $sumj2;
    }



    /**
     *  FUNCIONES DE COMPROBAR 
     */

    // Esta funcion comprueva que no haya ganador
    function noHayGanador($sumj1, $sumj2){
    if ($sumj1 >= $sumj2) {
            echo (" ¡ GANADR JUGADOR1 !");
            readline();
            $boo == true;
        } else {
            echo (" ¡ GANADR JUGADOR2 !");
            readline();
            $boo == true;
        }
    }

    function maxLimite($sumj1, $sumj2){
        if ($sumj1 > 21 || $sumj2 > 21) {
            if ($sumj1 > 21) {
                echo ("Jugador1 ha perdido la partida. Pulsa (enter) para continuar");
                readline();
                $boo == true;
            } else {
                echo ("Jugador2 ha perdido la partida. Pulsa (enter) para continuar");
                readline();
                $boo == true;
            }
        }
    }
    


// Ejecucion del juego
new blackjack();

