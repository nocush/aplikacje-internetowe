<?php
    session_start();
    include 'klasy/User.php';
    //sprawdź czy w sesji istnieje element o kluczu "p1":
    if (isset($_SESSION['user'])) {
    $user_z_sesji=$_SESSION['user'];
    echo "<p>Wartość elementu o kluczu 'user' z sesji: <br />".
    $user_z_sesji. " </p>";
    $user = unserialize($_SESSION['user']);
    echo "<p>Obiekt po odtworzeniu (deserializacji): <br />";
    $user->show();
    echo "</p>";
    }
    else { echo "Brak obiektu w sesji"; }
    echo "<p><a href='serialize.php' >Strona 1</a> </p>";
?>