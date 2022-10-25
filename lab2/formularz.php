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
    <form action="odbierz.php" method="GET/POST">
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
        <select id="panstwo">
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
                print('<input type="checkbox" name="' . $i . '" value="' . $i . '" />' . $i);
            }
        ?>
        
        <br><b>Sposob zapłaty:</b><br><br>
        <input type="radio" name="payment" value="eurocard" /> eurocard
        <input type="radio" name="payment" value="visa" /> visa
        <input type="radio" name="payment" value="przelew bankowy" /> przelew bankowy<br/>
        <input type="submit" value="Wyślij" />
        <input type="reset" value="Anuluj" />
    </form>
    </div>
    </div>
    </div>
</body>
</html>