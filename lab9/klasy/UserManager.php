<?php
class UserManager {
    function loginForm() 
    {
    ?>
    <h3>Formularz logowania</h3><p>
    <form action="Lab9.php" method="post">
    Login: <br/><input name="userName" /><br/>
    Hasło: <br/><input name="passwd" /><br/>
    <input type="submit" name="zaloguj" value="Zaloguj"/>
    <button type="reset" value="reset">Anuluj</button>
    </form></p> 
    <?php
    }
    function login($db)
    {
        //funkcja sprawdza poprawność logowania
        //wynik - id użytkownika zalogowanego lub -1
        $args = ['userName' => FILTER_SANITIZE_ADD_SLASHES, 
            'passwd' => FILTER_SANITIZE_ADD_SLASHES];
        //przefiltruj dane z GET (lub z POST) zgodnie z ustawionymi w $args filtrami:
            $dane = filter_input_array(INPUT_POST, $args);
            //sprawdź czy użytkownik o loginie istnieje w tabeli users
            //i czy podane hasło jest poprawne
            $login = $dane["userName"];
            $passwd = $dane["passwd"];
            $userId = $db->selectUser($login, $passwd, "users");
            if ($userId >= 0)
            {   
                //Poprawne dane
                //rozpocznij sesję zalogowanego użytkownika
                //usuń wszystkie wpisy historyczne dla użytkownika o $userId
                //ustaw datę - format("Y-m-d H:i:s");
                //pobierz id sesji i dodaj wpis do tabeli logged_in_users
                session_start();
                $date = date("Y-m-d H:i:s");
                $id = session_id();
                $_SESSION['userId'] = $userId;
                $_SESSION['sessionId'] = $id;
                $sql = "INSERT INTO logged_in_users VALUES('$id', '$userId', '$date');";
                $db->insert($sql);
            }
        return $userId;
    }

    function logout($db)
    {
            //pobierz id bieżącej sesji (pamiętaj o session_start()
            //usuń sesję (łącznie z ciasteczkiem sesyjnym)
            //usuń wpis z id bieżącej sesji z tabeli logged_in_users
            session_start();
            if (isset($_SESSION['userId'])) 
            {
                $id = $_SESSION['userId'];
                $sql = "DELETE FROM logged_in_users WHERE userId = $id;";
                $db->delete($sql);
                if (filter_input(INPUT_COOKIE,session_name())) 
                {
                    setcookie(session_name(), '', time() - 42000, '/'); 
                }
            }
            else 
            { 
                echo "Brak obiektu w sesji"; 
            }
            session_destroy();
            
    }
    function getLoggedInUser()
    {
            //wynik $userId - znaleziono wpis z id sesji w tabeli logged_in_users
            //wynik -1 - nie ma wpisu dla tego id sesji w tabeli logged_in_users
           
            if (isset($_SESSION['sessionId'])) 
            {
                return true;
            }
            else 
            { 
                return false;
            }
    }
}

?>