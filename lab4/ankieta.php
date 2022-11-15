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
            <?php
            include_once "ankietaf.php";
            wypisz_ankieta();
            ?>
        </div>
    </body>
</html>