<?php
    function printForm() {
        echo '<h2>Formularz zamówienia</h2>
            <form action="pliki.php" method="post">
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" name="nazwisko" id="nazwisko">
                <br>
                <label for="wiek">Wiek:</label>
                <input type="number" name="wiek" id="wiek">
                <br>    
                <label for="panstwo">Panstwo:</label>
                <select name="panstwo" id="panstwo">
                    <option value="Polska">Polska</option>
                    <option value="Niemcy">Niemcy</option>
                    <option value="Francja">Francja</option>
                </select>
                <br>
                <label for="email">Adres e-mail:</label>
                <input type="email" name="email" id="email">
                <br><br>
                <h3>Zamawiam tutorial z jezyka:</h3>';

        $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];

        foreach ($jezyki as $jezyk) {
            echo "<input type='checkbox' name='jezyki[]' value='$jezyk'>$jezyk";
        }  

        echo '<h3>Sposób zapłaty:</h3>
            <input type="radio" name="platnosc" value="eurocard" id="eurocard">
            <label for="przelew">eurocard</label>
            <input type="radio" name="platnosc" value="visa" id="visa">
            <label for="gotowka">visa</label>
            <input type="radio" name="platnosc" value="przelew" id="przelew">
            <label for="karta">przelew bankowy</label>
            <br>
            <button type="reset">Wyczyść</button>
            <button type="submit" name="submit" value="zapisz">Zapisz</button>
            <button type="submit" name="submit" value="pokaz">Pokaz</button>
            <button type="submit" name="submit" value="php">PHP</button>
            <button type="submit" name="submit" value="cpp">CPP</button>
            <button type="submit" name="submit" value="java">Java</button>
            <br>
            print_r($_SERVER);';
    }

    function pokaz_zamowienie($parametr) {
        $arr = "";
        $file = fopen("dane.txt", "r");
        while(!feof($file)) {
            $arr .= fgets($file);
        }
        $arr = explode("\n", $arr);
        
        foreach ($arr as $line) {
            $isParameter = false;
            $line2 = explode(";", $line);
            foreach ($line2 as $value) {
                $result = list($k, $v) = explode(":", $value);
                if($result[0] == "languages" && str_contains($result[1], $parametr)) {
                    $isParameter = true;
                }
            }
            if($isParameter) {
                echo $line."<br>";
            }
        }
    }

    function pokaGlobal(){
        foreach ($_SERVER as $key => $value) {
            echo "$key = $value <br/>";
        }
    }
?>