<?php
include_once 'database_config/UserConfig.php';
$user_email = '';
$user_password = '';
$form_error = ['invalid_email' => '', 'invalid_password' => ''];

$userConfig = new UserConfig();

if (isset($_POST['login'])) {

    //email
    if (empty($_POST['user_email'])) {
        $form_error['invalid_email'] = 'we need your email address to log you in';
    } else {
        $user_email = $_POST['user_email'];
        $user_email = str_replace(' ', '', $user_email);

        if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $user_email)) {
            $form_error['invalid_email'] = 'its not an email pls check it and try again';
        } elseif (!$userConfig->emailExist($user_email)) {
            $form_error['invalid_email']='this email dosent exist ';
        }
    }

    //password
    if (empty($_POST['user_password'])) {
        $form_error['invalid_password'] = 'u need to write ur password ';
    } else {
        //checking for standard security password
        $user_password = ($_POST["user_password"]);
        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $user_password)) {
            $form_error['invalid_password'] = 'u need to fallow this step --> at least 8 character, one uppercase and lowercase English letter , one digit and ne special character';
        } else
            $user_password=md5($user_password);
            $userConfig->loginValidation($user_email, $user_password);
    }


}
