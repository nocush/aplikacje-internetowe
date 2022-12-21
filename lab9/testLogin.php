<?php
    include_once 'klasy/UserManager.php';
    include_once 'klasy/Baza.php';
    include_once 'klasy/User.php';
    // $dane = "";
    session_start();
    $um = new UserManager();
    $db = new Baza("localhost", "root", "", "klienci");
    $id = $_SESSION['sessionId'];
    // $sql = "SELECT 'sessionId' FROM logged_in_users WHERE 'sessionId' = '$_SESSION['sessionId']';";

    // //$sql1 = "SELECT 'userId' FROM logged_in_users WHERE 'sessionId' = '$sessionId';";
    // $dane = $db->select($sql, 'sessionId');
    if($um -> getLoggedInUser() === true)
    {
        echo "<a href='Lab9.php?akcja=wyloguj'>Wyloguj</a> </p>";
        echo "<h2><b>Dane zalogowanego użytkownika:</b></h2><br/>";
        $sql1 = "SELECT userId FROM logged_in_users WHERE sessionId = '$id';";
        
        $pom = $db->select($sql1, ['userId']);
        $userid = explode(" ", $pom);

        $pola = ['id', 'userName', 'fullName', 'email'];
        $sql = "SELECT * FROM users WHERE id = '$userid[2]';";
        echo $db->select($sql, $pola);

        echo "<h3>Tajne informacje dla zalogowanego użytkownika:<br/></h3>";
        echo "<h1><b><img src='borek.jpg'></b></h1>";
    }
    else
    {
        echo "Mlody czlowieku";
    }
?>