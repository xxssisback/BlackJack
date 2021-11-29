<?php

$t = new blackjack;
$t->iniciar();
session_start();

// Clase BlackJack (Es la clase que de ejecutará)
class blackjack
{
    
    private static $_SESSION["jugador"] == 2;
    private static $jugador1 = [];
    private static $jugador2 = [];
    private static $cartas = [2,3,4,5,6,7,8,9,10,11];
    private static $boo = 0;

    

    
    /**
     *  FUNCIONES PRINCIPALES
     */

    private function mesa()
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
    public function iniciar()
    {  
        $sumj1 = $this->sumaCartasj1();
        $sumj2 = $this->sumaCartasj2();
        do {
            $this::$jugador==2?$this::$jugador=1:$this::$jugador=2;
            $this->mostrarJugador($sumj1, $sumj2);
            
            echo ("0. ");
            echo ("Salir\n");
            echo ("1. ");
            echo ("Pedir carta\n");
            echo ("2. ");
            echo ("Plantarte\n");
            $opt = readline("Dime la opcion que quieres elegir jugador " . $this::$jugador . " : ");
            
            switch ($opt) {
                case '0':
                    $this::$boo == 1;
                    break;
                case '1':
                    $this->lanzarCarta($this::$jugador);
                    if ($this::$jugador == 1) {
                        $sumj1 = $this->sumaCartasj1();
                        $this->mostrarJugador($sumj1, $sumj2);
                    } else {
                        $sumj2 = $this->sumaCartasj2();
                        $this->mostrarJugador($sumj1, $sumj2);
                    }
                    echo("\n");
                    $this->maxLimite($sumj1, $sumj2);
                    break;
                case '2':
                    $this->noHayGanador($sumj1, $sumj2);
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
    private function lanzarCarta($jugador){
        if ($jugador == 1){
            //$num = rand($this::$cartas[0], $this::$cartas[count($this::$cartas)]);
            $num = $this::$cartas[rand(0,count($this::$cartas)-1)];
            array_push($this::$jugador1, $num);
        } else {
            //$num = rand($this::$cartas[0], $this::$cartas[count($this::$cartas)]);
            $num = $this::$cartas[rand(0,count($this::$cartas)-1)];
            array_push($this::$jugador2, $num);
        }
    }


    private function mostrarJugador ($sumj1, $sumj2) {
        if ($this::$jugador == 1) {
            echo("==============================================<br>");
            echo ("   Jugador " . $this::$jugador . " tu mano es: [");
            ($this->mostrarMano($this::$jugador));
            echo ("] Total: " . $sumj1 . "<br>");
            echo ("==============================================<br><br>");
        } else {
            echo ("==============================================<br>");
            echo ("   Jugador " . $this::$jugador . " tu mano es: [");
            ($this->mostrarMano($this::$jugador));
            echo  ("] Total: " . $sumj2 . "<br>");
            echo ("==============================================<br><br>");
        }
    }

    // mostrar arrays
    private function mostrarMano($jugador) {
        if ($jugador == 1) {
            for ($i=0; $i < count($this::$jugador1); $i++) { 
                echo ($this::$jugador1[$i]);
                if($i<count($this::$jugador1)-1) echo ",";
            }    
        } else {
            for ($x=0; $x < count($this::$jugador2); $x++) { 
                echo ($this::$jugador2[$x]);
                if($x<count($this::$jugador1)-1) echo ",";
            } 
        }
        
    }


    // Funciones para sumar las cartas de la mano
    protected function sumaCartasj1(){ 
        $sumj1 = 0;
        for ($i = 0; $i < count($this::$jugador1); $i++) {
            $sumj1 += $this::$jugador1[$i];
        }
        return $sumj1;
    }

    private function sumaCartasj2(){
        $sumj2 = 0;
        for ($x = 0; $x < count($this::$jugador2); $x++) {
            $sumj2 += $this::$jugador2[$x];
        }
        return $sumj2;
    }



    /**
     *  FUNCIONES DE COMPROBAR 
     */

    // Esta funcion comprueva que no haya ganador
    private function noHayGanador($sumj1, $sumj2){
    if ($sumj1 >= $sumj2) {
            echo (" ¡ GANADR JUGADOR1 !");
            readline();
            $this::$boo == true;
        } else {
            echo (" ¡ GANADR JUGADOR2 !");
            readline();
            $this::$boo == true;
        }
    }

    private function maxLimite($sumj1, $sumj2){
        if ($sumj1 > 21 || $sumj2 > 21) {
            if ($sumj1 > 21) {
                echo ("Jugador1 ha perdido la partida. Pulsa (enter) para continuar");
                readline();
                $this::$boo == true;
            } else {
                echo ("Jugador2 ha perdido la partida. Pulsa (enter) para continuar");
                readline();
                $this::$boo == true;
            }
        }
    }
    
}

// Ejecucion del juego
new blackjack();

