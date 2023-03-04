<?php

class UserValidating{

    private $errors =[];

    public function signup($POST){

        //validate
        foreach ($POST as $key => $value) {
            # code...

            //username
            if($key == "user_name"){

                if(trim($value) == ""){

                    $this->errors[] = "Please enter a valid username";
                }

                if(is_numeric($value)){

                    $this->errors[] = "Username can not be a number";
                }

                if(preg_match("/[0-9]+/", $value)){

                    $this->errors[] = "Username can not contain numbers";
                }

            }

            //email
            if($key == "email"){

                if(trim($value) == ""){

                    $this->errors[] = "Please enter a valid email";
                }

                if(!filter_var($value,FILTER_VALIDATE_EMAIL)){

                    $this->errors[] = "Email is not valid";
                }
            }

            //password
            if($key == "password"){

                //check if its empty
                if(trim($value) == ""){

                    $this->errors[] = "Please enter a valid password";
                }

                //password length
                if(strlen($value) < 4){

                    $this->errors[] = "Password must be at least 4 characters long";
                }

            }

        }
//
//        $DB = new Database();
//        //check if email already exists
//        $data = array();
//        $data['email'] = $POST['email'];
//
//        $query = "select * from users where email = :email limit 1";
//        $result = $DB->read($query,$data);
//        if($result){
//            $this->errors[] = "That email is already in use";
//        }
//
//        //save to database
//        if(count($this->errors) == 0){
//
//            //save
//            $query = "insert into users (username,email,password,date) values (:username,:email,:password,:date)";
//
//            $data = array();
//            $data['username'] = $POST['username'];
//            $data['email'] = $POST['email'];
//            $data['password'] = $POST['password'];
//            $data['date'] = date("Y-m-d H:i:s");
//
//            $result = $DB->write($query,$data);
//            if(!$result){
//                $this->errors[] = "Your data could not be saved";
//            }
//        }

        return $this->errors;
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
//        include 'database_config/UserConfig.php';
//
//    }
//}
//
//if (isset($_POST['submit'])) {
//    class UserValidation
//    {
//       public function invalid_user_name()
//        {
//            if (!$_POST['user_name']) {
//                echo 'u need to write ur name';
//            } else
//                return $user_last_name = $_POST['user_last_name'];
//        }
//
//        public function invalid_last_user_name()
//        {
//            if (!$_POST['user_last_name']) {
//                echo 'u need to write your last name ';
//            } else
//                return $user_last_name = $_POST['user_last_name'];
//        }
//
//        public function invalid_password()
//        {
//            if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $_POST['user_password'])) {
//                echo 'u need to fallow this step --> at least 8 character, one uppercase and lowercase English letter , one digit and ne special character';
//            } else
//                return $user_last_name = $_POST['user_last_name'];
//        }
//
//        public function invalid_email()
//        {
//            if (!$_POST['user_email'] ?? 0) {
//                echo 'u need to write your email';
//            } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
//                echo 'invalid email pls write a valid email';
//            } else {
//                $user = new UserConfig();
//                $user->savingUserDate();
////            global $conn;
////            include 'database_config/UserConfig.php';
////            $stmt = $conn->prepare("SELECT form_php.users.user_email from form_php.users WHERE user_email=?");
////            $stmt->execute($_POST['user_email']);
////            $not_duplicate_email = $stmt->fetch();
////            if ($not_duplicate_email) {
////                echo 'this mail taken pls chose another mail';
////            } else {
//
//                $save_to_db = 'ur register into COMPANY_NAME site';
//                return $save_to_db;
//
//            }
//        }
//    }
//}
////$form_error='empty_email';
////
//
//
//
//
//
//
/////$user_email = ($_POST["user_email"]);
//
//






