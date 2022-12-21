<?php
    include_once("klasy/User.php");
    $user = new User("mexico", "Jarek Meksyk", "jaro@mex.pl", "zuber123");
    session_start();
    $_SESSION['username'] = 'kubus';
    $_SESSION['fullname'] = 'Kubus Puchatek';
    $_SESSION['email'] = 'kubus@stumilowylas.pl';
    $_SESSION['status'] = 'ADMIN';
    echo "ID sesji: ";
    echo session_id()."<br/>";
    echo "<hr>";
    foreach($_SESSION AS $key => $value) {
        echo "$key: $value";
        echo "</br>";
      }
    echo "<hr>";
    echo "<br/>";
    echo "Ciasteczka: ";
    foreach($_COOKIE as $var)
    {
        echo $var." ";
    }
    echo "<hr>";
    echo "<br/><a href = 'test2.php'> Przejdź do strony 2 </a>";
?>