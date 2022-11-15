<!DOCTYPE html>

<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Lab 2 </title>
        <style>
            div {
                margin-bottom: 10px;
            }
            label {
                display: inline-block;
                width: 100px;
            }
        </style>
    </head>
    <body>
        <div id="kontener">
            <form action="pliki.php" method="POST" enctype="multipart/form-data" >
                <h3>Formularz zamownienia</h3>
                <div>
                    <label>Nazwisko:</label>
                    <input type="text" name="nazwisko"/>
                </div>
                <div>
                    <label>Wiek:</label>
                    <input type="text" name="wiek"/>
                </div>
                <label for="panstwo">Panstwo:</label>
                <select id="panstwo" name="panstwo">
                    <option  value="Polska">Polska</option>
                    <option  value="Niemcy">Niemcy</option>
                </select><br/>
                <div>
                    <label>Adres e-mail:</label>
                    <input type="text" name="email"/>
                </div>
                <br><b>Zamawiam tutorial z języka:</b><br><br>
                <?php
                $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
                foreach ($jezyki as $i) {
                    print('<input type="checkbox" name="jezyki[]" value="' . $i . '" />' . $i);
                }
                ?>
                <br><b>Sposob zapłaty:</b><br><br>
                <input type="radio" name="payment" value="eurocard" /> eurocard
                <input type="radio" name="payment" value="visa" /> visa
                <input type="radio" name="payment" value="przelew bankowy" /> przelew bankowy<br/>
                <input type="reset"  value="Anuluj"  />
                <input type="submit" name="submit"  value="Dodaj" />
                <input type="submit" name="submit" value="Pokaz" />
                <input type="submit" name="submit" value="Statystyki" />
            </form>
        </div>
    </div>
</div>
<?php
include_once "funkcje.php";
if (filter_input(INPUT_POST, "submit")) {
    $akcja = filter_input(INPUT_POST, "submit");
/*if (isset($_REQUEST["submit"])) { //jeśli kliknięto przycisk o name=submit
    $akcja = $_REQUEST["submit"]; //odczytaj jego value*/
    switch ($akcja) {
    case "Dodaj":dodaj();break;
    case "Pokaz":pokaz();break;
    case "Statystyki":statystyki();break;
    //pozostałe przypadki
    }
   }
   
//Skrypt właściwy do obsługi akcji (żądań):

?>
</body>
</html>