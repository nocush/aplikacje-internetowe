<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<?php

//Funkcje pomocnicze:
function dopliku($nazwaPliku, $tablicaDanych) {
    $dane = "";
    //zbierz wartości z tablicy danych (parametr $tablicaDanych
    foreach ($tablicaDanych as $klucz => $wartosc) {
        if ($klucz == "jezyki") {
            $a = count($tablicaDanych[$klucz]);
            for ($i = 0; $i < $a; $i++) {
                $dane .= $tablicaDanych[$klucz][$i] . " ";
            }
        } else
            $dane .= $wartosc . " ";
    }
    $dane .= "<br>";
    $dane.=PHP_EOL; //dodaj koniec linii za pomocą stałej PHP
    //wykonaj operacje zapisu do pliku o zadanej nazwie:
    $wp = fopen("dane.txt", "a", 1);
    if (!$wp) {
        echo "<p>Blad</p>";
        exit;
    }
    fwrite($wp, $dane);
    echo "<p>Zapisano: <br /> $dane</p>";
   }

function walidacja() {
    
    $args = ['nazwisko' => ['filter' => FILTER_VALIDATE_REGEXP,
     'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']
     ],
     'wiek' => FILTER_VALIDATE_INT,
     'panstwo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
     'jezyki' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'flags' => FILTER_REQUIRE_ARRAY],
     'email' => FILTER_VALIDATE_EMAIL,
     'payment' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
 //zdefiniuj pozostałe filtry
 ];
 //przefiltruj dane z GET/POST zgodnie z ustawionymi w $args filtrami:
 $dane = filter_input_array(INPUT_POST, $args);
 //pokaż tablicę po przefiltrowaniu - sprawdź wyniki filtrowania:
 var_dump($dane);
 //Sprawdź czy dane w tablicy $dane nie zawierają błędów walidacji:
 $errors = "";
 foreach ($dane as $key => $val) {
 if ($val === false or $val === NULL) {
 $errors .= $key . " ";
 }
 }
 if ($errors === "") {
 //Dane poprawne - zapisz do pliku
 //wykorzystaj pomocniczą funkcję:
 dopliku("dane.txt", $dane);
 } else {
 echo "<br>Nie poprawnie dane: " . $errors;
 }
}

function statystyki() {
    $plik = file('dane.txt');
    $ile = count($plik);
    print("Liczba wszystkich zamowien: $ile");
    $file = fopen("dane.txt", "r+");
    $n1 = 0;
    $n2 = 0;
    for ($i = 0; $i < $ile; $i++) {
        $dane = explode(" ", $plik[$i]);
        if ($dane[1] < 18)
            $n1++;
        if ($dane[1] > 49)
            $n2++;
    }
    print("<br />Liczba zamowien od osob w wieku < 18 lat: $n1");
    print("<br />Liczba zamowien od osob w wieku >= 50 lat: $n2");
}


function dodaj() {
    echo "<h3>Dodawanie do pliku:</h3>";
    walidacja();
   
}

function pokaz() {
    $wp = fread(fopen("dane.txt", "r"), filesize("dane.txt"));
    if (!$wp) {
        echo "<p>Zamówienie nie może zostać przyjęte.
Spróbuj później</p>";
        exit;
    }

    print ($wp);
    //fclose($wp);
}




    ?>
