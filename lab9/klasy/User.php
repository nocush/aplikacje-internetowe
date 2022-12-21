<?php
class User {
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;
    protected $userName;
    protected $passwd;
    protected $fullName;
    protected $email;
    protected $date;
    protected $status;
    

    function __construct($userName, $fullName, $email, $passwd){
        $this->status=User::STATUS_USER;
        $this->userName=$userName;
        $this->fullName=$fullName;
        $this->email=$email;
        $this->passwd=password_hash($passwd,PASSWORD_DEFAULT);
        $data = new DateTime("now",null);
        $this->date = $data->format('Y-m-d');
    }
    Public function show() {
        echo $this->userName." ".$this->fullName." ".$this->email." status: ".$this->status." ".$this->date."<br>";
    }

    Public function setUserName($userName){
        $this->userName = $userName;
    }

    Public function getUserName(){
        return $this->userName;
    }

    Public function setFullName($fullName){
        $this->fullName = $fullName;
    }

    Public function getFullName(){
        return $this->fullName;
    }

    Public function setPasswd($passwd){
        $this->passwd = $passwd;
    }

    Public function getPasswd(){
        return $this->passwd;
    }

    Public function setEmail($email){
        $this->email = $email;
    }

    Public function getEmail(){
        return $this->email;
    }

    Public function setStatus($status){
        $this->status = $status;
    }

    Public function getStatus(){
        return $this->status;
    }

    static function getAllUsersFromDB($db)
    {
        $pola = ['userName', 'fullName', 'email'];
        $sql = "SELECT * FROM users;";
        echo $db->select($sql, $pola);
    }

    function saveDB($db)
    {
        $userName = $_REQUEST['userName'];
        $fullName = $_REQUEST['fullName'];
        $email = $_REQUEST['email'];
        $passwd = $_REQUEST['passwd'];
        $status = 1;
        $date = date("Y/m/d");
        $passwd = password_hash($passwd,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users VALUES (NULL,'$userName', '$fullName', '$email', '$passwd', '$status', '$date');";
        // i wywołaj metodę:
        $db->insert($sql);
    }
    
    function toArray(){
        $arr=[
        "userName" => $this->userName,
        "fullName" => $this->fullName,
        "email" => $this->email,
        "date" => $this->date,
        "status" => $this->status
        ];
        return $arr;
    }
}
?>
