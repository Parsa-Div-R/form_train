<?php

//function user_register():void
//{
//    global $user_name;
//    global $user_email;
//    global $user_last_name;
//    global $user_password;
//    global $form_error;
//    if (!array_filter($form_error)) {
//        include 'database_config/user_config.php';
//        global $conn;
//        $sql = "INSERT INTO form_php.users(id,user_name,user_last_name,user_email,user_password) VALUES(NULL,'$user_name','$user_last_name','$user_email','$user_password')";
//        $conn->exec($sql);
//    }
//}

function invalid_user_name() {
    if (!$_POST['user_name']) {
        return 'u need to write ur name ';
    }}

function invalid_last_user_name() {
    if (!$_POST['user_last_name']) {
        return 'u need to write your last name ';
    }}

function invalid_password()
{
    if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $_POST['user_password'])) {
        echo  'u need to fallow this step --> at least 8 character, one uppercase and lowercase English letter , one digit and ne special character';
    }
}
function invalid_email(){
    if (empty($_POST['user_email'])) {
    echo 'u need to write your email';
    }
    elseif (!filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL)) {
        echo 'its not a mail pls write a valid mail';
    } else {
        global $conn;
        include 'database_config/user_config.php';
        $stmt = $conn->prepare("SELECT form_php.users.user_email from form_php.users WHERE user_email=?");
        $stmt->execute($_POST['user_email']);
        $not_duplicate_email = $stmt->fetch();
        if ($not_duplicate_email) {
            echo 'this mail taken pls chose another mail';
        } else {
            $save_db_db = 'ur register into COMPANY_NAME site';
            user_register();
            return $save_db_db;

        }
//
//
//}
}}
//$form_error='empty_email';
//$user_email = ($_POST["user_email"]);