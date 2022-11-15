<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formularz</title>
</head>
<body>
    <?php
        include_once "funkcje.php";
        $file_name = "dane.txt";

        if(empty($_REQUEST)) {
            printForm();
        } else {
            foreach ($_REQUEST as $key => $value) {
                if($key == "submit") {
                    if($value == "zapisz") {
                        $file = fopen($file_name, "a");
                        fwrite($file, $_REQUEST['nazwisko'].";");
                        fwrite($file, "".$_REQUEST['wiek'].";");
                        fwrite($file, "".$_REQUEST['panstwo'].";");
                        fwrite($file, "".$_REQUEST['email'].";");
                        fwrite($file, "languages:");
                        foreach ($_REQUEST['jezyki'] as $jezyk) {
                            fwrite($file, $jezyk.",");
                        }
                        fwrite($file, "".$_REQUEST['platnosc']."\n");
                        fclose($file);
                    } else if($value == "pokaz") {
                        printForm();
                        $file = fopen($file_name, "r");
                        while(!feof($file)) {
                            echo fgets($file)."<br>";
                        }
                        fclose($file);
                        pokaGlobal();
                    } else if($value == "php"){
                        printForm();
                        pokaz_zamowienie("PHP");
                    } else if($value == "cpp") {
                        printForm();
                        pokaz_zamowienie("CPP");
                    } else if($value == "java") {
                        printForm();
                        pokaz_zamowienie("Java");
                    }
                    else if($value == "Wyczyść"){
                        
                    }
                }
            }
        }
        echo "<br>";

        ?>
    </form>
</body>
</html>