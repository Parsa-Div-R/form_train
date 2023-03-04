<?php
include_once 'database_config/UserConfig.php';
$user_name = '';
$user_last_name = '';
$user_email ='';
$user_password = '';
$form_error = ['invalid_email' => '', 'invalid_name' => '', 'invalid_password' => '', 'invalid_last_name' => ''];
$userConfig = new UserConfig;

//if button in reg page pressed
if (isset($_POST['submit'])) {

    //name
    if (empty($_POST['user_name'])) {
        $form_error['invalid_name'] = 'u need to write ur name ';
    } else
        $user_name = strip_tags($_POST['user_name']); //removes entered HTML
        $user_name = str_replace(' ', '', $user_name); //Remove spaces
        $user_name = ucfirst(strtolower($user_name)); //Capitalize first letter, lower other letters
        $user_name = ($_POST['user_name']);

    //lastname
    if (empty($_POST["user_last_name"])) {
        $form_error['invalid_last_name'] = 'u need to write ur last name ';
    } else
        $user_last_name = strip_tags($_POST['user_last_name']); //removes entered HTML
        $user_last_name = str_replace(' ', '', $user_last_name); //Remove spaces
        $user_name = ucfirst(strtolower($user_last_name)); //Capitalize first letter, lower other letters
        $user_last_name = ($_POST['user_name']);

    //password
    if (empty($_POST['user_password'])) {
        $form_error['invalid_password'] = 'u need to write ur password ';
    } else {
        //checking for standard security password
        $user_password = ($_POST["user_password"]);
        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $user_password)) {
            $form_error['invalid_password'] = 'u need to fallow this step --> at least 8 character, one uppercase and lowercase English letter , one digit and ne special character';
        }
    }

    //email
    if (empty($_POST['user_email'])) {
        //checking for valid mail
        $form_error['invalid_email'] = 'u need to write ur email';
    } else {
        $user_email = ($_POST['user_email']);
        // need to delete extra space, so we don,t have any unexpected  error
        $user_email= str_replace(' ','',$user_email);
        if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $user_email)) {
            $form_error['invalid_email'] = 'invalid email pls check it';
        } elseif ($userConfig->duplicateEmailCheck($user_email)) {
            $form_error['invalid_email'] = 'this email is taken pls choose another ';
        }
    }
    // going for saving basic user data in (database/UserConfig) file
    if (!array_filter($form_error)) {
        $userConfig->userRegister($fun_user_name =$user_name, $fun_user_last_name = $user_last_name, $fun_user_password = $user_password, $fun_user_email = $user_email);
    }
}










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
//
//function invalid_user_name() {
//    if (!$_POST['user_name']) {
//        return 'u need to write ur name ';
//    }}
//
//function invalid_last_user_name() {
//    if (!$_POST['user_last_name']) {
//        return 'u need to write your last name ';
//    }}
//
//function invalid_password()
//{
//    if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $_POST['user_password'])) {
//        echo  'u need to fallow this step --> at least 8 character, one uppercase and lowercase English letter , one digit and ne special character';
//    }
//}
//function invalid_email(){
//    if (empty($_POST['user_email'])) {
//    echo 'u need to write your email';
//    }
//    elseif (!filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL)) {
//        echo 'its not a mail pls write a valid mail';
//    } else {
//        global $conn;
//        include 'database_config/user_config.php';
//        $stmt = $conn->prepare("SELECT form_php.users.user_email from form_php.users WHERE user_email=?");
//        $stmt->execute($_POST['user_email']);
//        $not_duplicate_email = $stmt->fetch();
//        if ($not_duplicate_email) {
//            echo 'this mail taken pls chose another mail';
//        } else {
//            $save_db_db = 'ur register into COMPANY_NAME site';
//            user_register();
//            return $save_db_db;
//
//        }
////
////
////}
//}}
////$form_error='empty_email';
////$user_email = ($_POST["user_email"]);