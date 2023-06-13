<?php

class MojaKlasa {
    public $liczba1;
    public $liczba2;

    function dodawanie($liczba1, $liczba2){
        $suma = $liczba1 + $liczba2;
    
        return $suma;
    }

    function odejmowanie($liczba1, $liczba2){
        $roznica = $liczba1 - $liczba2;
    
        return $roznica;
    }
}

$mojobiekt = new MojaKlasa();

$mojobiekt->dodawanie(3,6);

$mojobiekt->odejmowanie(10,2);

?>