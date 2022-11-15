<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $a = 1234;
        $b=567.789;
        $c=1;
        $d=0;
        $e=true;
        $f="0";
        $g="Typy w PHP";
        $h=[1, 2, 3, 4];
        $u=[];
        $j=["zielony", "czerwony", "niebieski"];
        $k=["Agata", "Agatowska", 4.67, true];
        $l = count($h);
        $m = count($u);
        $n = count($j);
        $o = count($k);
        $p =date("Y-m-d, H:i");


      //  $p =  DateTime::modify();
        print("a=$a,<br>b=$b,<br>c=$c,<br>d=$d,<br>e=$e,<br>f=$f,<br>g=$g<br>");
        print("h= ");
        for ( $i=0; $i<$l; $i++){ echo $h[$i]."  "; }
        print("<br>u= ");
        for ( $i=0; $i<$m ; $i++){ echo $u[$i]."  "; }
        print("<br>j= ");
        for ( $i=0; $i<$n; $i++){ echo $j[$i]."  "; }
        print("<br>k= ");
        for ( $i=0; $i<$o; $i++){ echo $k[$i]."  "; }

        print("<br>Liczba elementow w tablicach: <br>h=$l<br>i=$m <br>j=$n <br>k=$o<br>");
        print("<br>Czas: $p");
        
        print("<br><br>is_bool()<br>"); 
        print("Dla zmiennej a:<br>");
        if (is_bool($a) === true) {
        echo "Zmienna a jest boolean";
        }else{
            echo "Zmienna a nie jest boolean";
        }
        print("<br>Dla zmiennej e:<br>");
        if (is_bool($e) === true) {
        echo "Zmienna e jest boolean";
        }else{
            echo "Zmienna e nie jest boolean";
        }
        print("<br><br>is_int()<br>"); 
        print("Dla zmiennej a:<br>");
        if (is_int($a) === true) {
        echo "Zmienna a jest int";
        }else{
            echo "Zmienna a nie jest int<br>";
        }
        print("<br><br>is_numeric()<br>"); 
        print("Dla zmiennej a:<br>");
        if (is_numeric($a) === true) {
        echo "Zmienna a jest numeric";
        }else{
            echo "Zmienna a nie jest numeric";
        }
         print("<br><br>is_string()<br>"); 
        print("Dla zmiennej a:<br>");
        if (is_string($a) === true) {
        echo "Zmienna a jest string";
        }else{
            echo "Zmienna a nie jest string";
        }
         print("<br><br>is_array()<br>"); 
        print("Dla zmiennej j:<br>");
        if (is_array($j) === true) {
        echo "Zmienna j jest array";
        }else{
            echo "Zmienna j nie jest array";
        }
         print("<br><br>is_object()<br>"); 
        print("Dla zmiennej a:<br>");
        if (is_object($a) === true) {
        echo "Zmienna a jest object";
        }else{
            echo "Zmienna a nie jest object";
        }
        
       print("<br><br>"); 
       print("var_dump:<br>");
       print("h:   ");
       var_dump($h);
        print("<br>j:   ");
       var_dump($j);
       
       print("<br><br>");
       print("print_r:<br>");
       print("h:   ");
       print_r($h);
       print("<br>j:   ");
       print_r($j);
       
       
       print("<br><br>Porownanie 1 i true");
       print("<br>za pomoca '=='");
       if( 1== true){
           print("<br>1 == true");
       }else {print("<br>1 != true");}
       print("<br>za pomoca '==='");
       if( 1=== true){
           print("<br>1 === true");
       }else {print("<br>1 != true");}
       
       print("<br><br>Porownanie 0 i false");
       print("<br>za pomoca '=='");
       if(0==false){
           print("<br>0 == false");
       }else {print("<br>0 != false");}
       print("<br>za pomoca '==='");
       if(0===false){
           print("<br>0 === false");
       }else {print("<br>0 != false");}
        ?>
    </body>
</html>
