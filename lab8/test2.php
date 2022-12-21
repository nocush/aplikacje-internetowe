<?php
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
    session_destroy();
    echo "</br>";
    echo "<hr>";
    echo "ID sesji: ";
    echo session_id()."<br/>";
    echo "<hr>";
    echo "<br/><a href = 'test1.php'> Przejdź do strony 1 </a>";
    
?>