<?php
    include_once('klasy/User.php');
    include_once('klasy/RegistrationForm.php');
    include_once('klasy/BazaPDO.php');

    $baza = new BazaPDO('mysql:host=localhost;dbname=klienci','root','');
    $rf = new RegistrationForm(); //wyświetla formularz rejestracji
    if (filter_input(INPUT_POST, 'submit',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) 
    {
        $user = $rf->checkUser(); //sprawdza poprawność danych
        if ($user === NULL)
        {
            echo "<p>Niepoprawne dane rejestracji.</p>";
        }    
        else
        {
            echo "<p>Poprawne dane rejestracji:</p>";
            $user->show();
            $user->saveDB($baza);
        }
    }
    if(isset($_POST['show']))
    {
        User::getAllUsersFromDB($baza);
    }

?>