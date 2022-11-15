<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
       if (isset($_POST['zapisz']) && $_POST['zapisz'] == 'Zapisz' && !isset($_GET['pic'])) {
            if (is_uploaded_file($_FILES['zdjecie']['tmp_name'])) {
                $typ = $_FILES['zdjecie']['type'];
                if ($typ === 'image/jpeg') {
                    move_uploaded_file($_FILES['zdjecie']['tmp_name'],'./'.$_FILES['zdjecie']['name']);
                    $link = $_FILES['zdjecie']['name'];
                    $random = uniqid('img_'); //wygenerowanie losowej wartości
                    $zdj = $random . '.jpg';
                    copy($link, $zdj); //utworzenie kopii zdjęcia
                    move_uploaded_file('./'.$link,'./zdjecia/'.$link);
                    
                    list($width, $height) = getimagesize($zdj); //pobranie rozmiarów obrazu
                    
                    $wys = $_POST['wys']; //wysokość preferowana przez użytkownika
                    $szer = $_POST['szer']; //szerokość preferowana przez użytkownika
                    
                    $skalaWys = 1;
                    $skalaSzer = 1;
                    $skala = 1;
                    if ($width > $szer) $skalaSzer = $szer / $width;
                    if ($height > $wys) $skalaWys = $wys / $height;
                    if ($skalaWys <= $skalaSzer) $skala = $skalaWys;
                    else $skala = $skalaSzer;
                    
                    //ustalenie rozmiarów miniaturki tworzonego zdjęcia:
                    $newH = $height * $skala;
                    $newW = $width * $skala;

                    header('Content-Type: image/jpeg');
                    $nowe = imagecreatetruecolor($newW, $newH); //czarny obraz
                    $obraz = imagecreatefromjpeg($zdj);
                    imagecopyresampled($nowe, $obraz, 0, 0, 0, 0,
                    $newW, $newH, $width, $height);
                    imagejpeg($nowe, './miniatury/mini-' . $link, 100);
                    echo "nowe=/mini-$link <br>";
                    imagedestroy($nowe);
                    imagedestroy($obraz);
                    copy($zdj, "./zdjecia/$zdj");
                    copy("./mini-$link", "./miniatury/mini-$zdj");
                    unlink($zdj);
                    unlink("./mini-$link");
                    unlink($link);

                    $dlugosc = strlen($link);
                    $dlugosc -= 4;
                    $link = substr($link, 0, $dlugosc);
                    echo $link;
                    echo "link=".$link." <br/>";
                    header('location:zdjecia.php?pic='.$link);
                    }
                    else {
                        header('location:zdjecia.html');
                    }
            } 
        }
        $katalog= 'C:\xampp\htdocs\lab3_2\miniatury';
        $kat=@opendir($katalog) or die("Nie można otworzyć katalogu");
        $katalog1= 'C:\xampp\htdocs\lab3_2\zdjecia';
        $kat1=@opendir($katalog1) or die("Nie można otworzyć katalogu");
        echo "<h3> Galeria zdjęć: </br></h3>";
        while (($plik = readdir($kat)) && ($plik1 = readdir($kat1))){
            if(($plik!=".")&&($plik!="..")){
                $miniatura = './miniatury/'.$plik;
                $zdjecie = './zdjecia/'.$plik1;
                echo '<a href = "'.$zdjecie.'"> <img src="'.$miniatura.'" alt="obrazek"> </a>';
                echo " ";
            }  
        }
        echo "</br>";
        echo '<a href="zdjecia.html">Powrót</a>';
        closedir($kat);
        closedir($kat1)
    ?>
</body>
</html>