<?php
class RegistrationForm {
protected $user;
function __construct(){ ?>
    <h3>Formularz rejestracji</h3><p>
    <form action="Lab8.php" method="post">
    Nazwa użytkownika: <br/><input name="userName" /><br/>
    Imię i nazwisko: <br/><input name="fullName" /><br/>
    Hasło: <br/><input name="passwd" /><br/>
    Email: <br/><input name="email" /><br/>
    <button type="submit" name="submit" value="zapisz">Rejestruj</button>
    <button type="reset" value="reset">Anuluj</button>
    <button type="submit" name="show">Pokaz</button>
    </form></p>
<?php
}
function checkUser(){
    $args = [
        'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
        'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}\s[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
        'email' => FILTER_VALIDATE_EMAIL,
        'passwd' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']]
    ];
    $dane = filter_input_array(INPUT_POST, $args);
    $errors = "";
    foreach ($dane as $key => $val) 
    {
        if ($val === false or $val === NULL) 
        {
            $errors .= $key . " ";
        }
    }
    if ($errors === "") {
        $this->user=new User($dane['userName'], $dane['fullName'],
        $dane['email'],$dane['passwd']);
    } else {
        echo "<p>Błędne dane:$errors</p>";
        $this->user = NULL;
    }
    return $this->user;
    }
}
