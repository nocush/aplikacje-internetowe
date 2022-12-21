<?php
    session_start();
    include 'klasy/User.php';
    $user = new User("konons", "Krzysztof Kononowicz", "asd@asfasa.p", "majorek123");
    echo "<p> Właściwości obiektu user: <br />";
    $user->show();
    echo "</p>";
    echo "<p>Łańcuch po serializacji obiektu:
    <br />".serialize($user)." </p>";
    //serializowany obiekt dodajemy do sesji:
    $_SESSION['user'] = serialize($user);

    echo "<p><a href='unserialize.php' >Strona 2</a> </p>";
?>