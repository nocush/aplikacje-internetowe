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
    <form action="pliki.php" method="GET/POST">
        <h3>Formularz zamownienia</h3>
        <div>
            <label>Nazwisko:</label>
            <input type="text" name="surname"/>
        </div>
        <div>
            <label>Wiek:</label>
            <input type="text" name="age"/>
        </div>
        <label for="panstwo">Panstwo:</label>
        <select id="panstwo" name="panstwo">
                <option value="polska">Polska</option>
                <option value="niemcy">Niemcy</option>
        </select><br/>
        <div>
            <label>Adres e-mail:</label>
            <input type="text" name="email"/>
        </div>
        <br><b>Zamawiam tutorial z języka:</b><br><br>
        <?php
            $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
            foreach($jezyki as $i)
            {
                print('<input type="checkbox" name="jezyki[]" value="' . $i . '" />' . $i);
            }
        ?>
        
        <br><b>Sposob zapłaty:</b><br><br>
        <input type="radio" name="payment" value="eurocard" /> eurocard
        <input type="radio" name="payment" value="visa" /> visa
        <input type="radio" name="payment" value="przelew bankowy" /> przelew bankowy<br/>
        <button name="submit" value="Wyczysc">Wyczysc</button>
        <button name="submit" value="Zapisz">Zapisz</button>
        <button name="submit" value="Pokaz">Pokaz</button>
        <button name="submit" value="PHP">PHP</button>
        <button name="submit" value="CPP">CPP</button>
        <button name="submit" value="Java">Java</button>
    </form>
    </div>
    </div>
    </div>
    <?php
        function dodaj() {
            $dane = "";
            if (isset($_REQUEST["surname"])){
                $dane .= htmlspecialchars($_REQUEST['surname']).";";
            }
            if(isset($_REQUEST["age"])){
                $dane .= htmlspecialchars($_REQUEST['age']).";";
            }
            if(isset($_REQUEST["panstwo"])){
                $dane .= htmlspecialchars($_REQUEST['panstwo']).";";
            }
            if(isset($_REQUEST["email"])){
                $dane .= htmlspecialchars($_REQUEST['email']).";";
            }
            if(isset($_REQUEST["jezyki"])){
                $jezyki = join(',',$_REQUEST["jezyki"]);
                //var_dump($jezyki);
                $dane .= $jezyki.";";
            }
            if(isset($_REQUEST["payment"])){
                $dane .= htmlspecialchars($_REQUEST['payment']);
            }
            $myFile = fopen("dane.txt", "w");
            fwrite($myFile, $dane);
            fclose($myFile);
        }
        dodaj();
        fuction pokaz(){
            fopen("dane.txt","r");
            
        }
    ?>
</body>
</html>