<?php
include_once 'database_config/UserConfig.php';
$user_name = '';
$user_last_name = '';
$user_email = '';
$user_password = '';
$form_error = ['invalid_email' => '', 'invalid_name' => '', 'invalid_password' => '', 'invalid_last_name' => ''];
$userConfig = new UserConfig;
$switch_page=false ;
//if button in reg page pressed
if (isset($_POST['submit'])) {

    //name
    if (empty($_POST['user_name'])) {
        $form_error['invalid_name'] = 'u need to write ur name ';

    } else {
        $user_name = strip_tags($_POST['user_name']); //removes entered HTML
        $user_name = str_replace(' ', '', $user_name); //Remove spaces
        $user_name = ucfirst(strtolower($user_name)); //Capitalize first letter, lower other letters
        $user_name = ($_POST['user_name']);
    }

    //lastname
    if (empty($_POST["user_last_name"])) {
        $form_error['invalid_last_name'] = 'u need to write ur last name ';

    } else {
        $user_last_name = strip_tags($_POST['user_last_name']); //removes entered HTML
        $user_last_name = str_replace(' ', '', $user_last_name); //Remove spaces
        $user_name = ucfirst(strtolower($user_last_name)); //Capitalize first letter, lower other letters
        $user_last_name = ($_POST['user_name']);
    }
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
        $user_email = str_replace(' ', '', $user_email);

        if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $user_email)) {
            $form_error['invalid_email'] = 'invalid email pls check it';

        } elseif ($userConfig->duplicateEmailCheck($user_email)) {
            $form_error['invalid_email'] = 'this email is taken pls choose another ';
        }
    }

    // going for saving basic user data in (database/UserConfig) file
    if (!array_filter($form_error)) {
        $userConfig->userRegister($fun_user_name = $user_name, $fun_user_last_name = $user_last_name, $fun_user_password = $user_password, $fun_user_email = $user_email);
        $switch_page=true;
        $user_password=md5($user_password);
    }
}