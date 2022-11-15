<?php

    function wypisz_ankieta(){
        $tech=["C","CPP","Java","C#","HTML","CSS","XML","JavaScript"];
        echo "<form action='ankieta.php' method='POST' enctype='multipart/form-data'>
        <h2>Wybierz technologie które znasz</h2>";
        foreach($tech as $jezyk){
            echo "<input type='checkbox' name='tech[]' value='$jezyk'>$jezyk<br />";
        }

        echo '<input type="submit" name="submit"  value="Wyslij" /></form>';
    }

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
    
        $args = [
         'tech' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'flags' => FILTER_REQUIRE_ARRAY]
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

    fuction wyslij(){
        echo 'Wyslano'
        walidacja();
    }
?>