<?php

// this class will handel everything this site need an aql query for registering and login
class UserConfig
{
    private string $serverName = 'localhost';
    private string $dbName = 'library';
    private string $serverPort = '3307';
    private string $serverUser = "parsa1";
    private string $serverPass = '1068';
    private $conn;

    //connecting to database
    function __construct()
    {
        //trying to make a connection to db
        try {
            $this->conn = new PDO("mysql:host=$this->serverName;port=$this->serverPort;dbname=$this->dbName", $this->serverUser, $this->serverPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } // error handeling for db connection
        catch
        (PDOException $conn_failed) {
            echo $conn_failed->getMessage();
        }
    }

    function duplicateEmailCheck($user_email): bool
    {
        $stmt = $this->conn->prepare("SELECT form_php.users.user_email from form_php.users WHERE user_email=?");
        $user_email = [$user_email];
        $stmt->execute($user_email);
        $duplicate_email = $stmt->fetch();
        return boolval($duplicate_email);
    }

    //insert user data into correct database
    function userRegister($fun_user_name, $fun_user_last_name, $fun_user_password, $fun_user_email): void
    {
        $sql = "INSERT INTO form_php.users(id,user_name,user_last_name,user_email,user_password) VALUES(NULL,'$fun_user_name','$fun_user_last_name','$fun_user_email','$fun_user_password')";
        $this->conn->exec($sql);
        echo 'ur register into COMPANY NAME also u can enjoy our service';
    }

    function emailExist($user_email): bool
    {
        $sql = $this->conn->prepare("SELECT form_php.users.id from form_php.users WHERE user_email='$user_email'  ");
        $sql->execute();
        $user_name = $sql->fetch();
        if ($user_name) {
            return true;
        } else
            return false;
    }

    function loginValidation($user_email, $user_password)
    {

        $sql = $this->conn->prepare("SELECT form_php.users.user_name from form_php.users WHERE user_email='$user_email' AND user_password='$user_password'");
        $sql->execute();
        $user_name = $sql->fetch();

        if ($user_name) {
            echo 'welcome ' . $user_name[0] . ' to your account';
        } else
            echo 'incorrect password pls check it and try again ';
    }
}