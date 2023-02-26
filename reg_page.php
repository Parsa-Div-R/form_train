



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .custome-ul {
            list-style: none;
        }
        .custome-ul .custome-li::before {
            content: "\2022";
            color: #2F4F4F;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;

        }

        .brand {
            background: #2F4F4F; !important;
        }
        .brand-text{
            color: #2F4F4F !important;
        }
        form{
            max-width: 420px;
            margin: 20px auto;
            padding: 22px;
    </style>


    <title>Document</title>
</head>
<body class="grey lighten-6">
<nav class="white z-depth-5">
    <div class="container ">
        <a href="#" class="brand-logo brand-text"> company name </a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li><a href="#" class="btn brand z-depth-0 " >login </a></li>
        </ul>
    </div>
</nav>
<section class="container gray-txt">
    <h4 style="color: darkslategray" class="center">register ur self</h4>
    <form class="white" action="" method="post" enctype="multipart/form-data">

        <?PHP
        function user_register()
        {   global $user_name;
            global $user_email;
            global $user_last_name;
            global $user_password ;
            global $form_error;
            if (!array_filter($form_error)) {
                include 'database_config/user_config.php';
                global $conn;
                $sql = "INSERT INTO form_php.users(id,user_name,user_last_name,user_email,user_password) VALUES(NULL,'$user_name','$user_last_name','$user_email','$user_password')";
                $conn->exec($sql);
            }
        }

        $form_error = ['invalid_email' => '', 'invalid_name' => '', 'invalid_password' => '', 'invalid_last_name' => ''];

        if (isset($_POST['submit'])) {

            if (empty($_POST['user_name'])) {
                $form_error['invalid_name'] = 'u need to write ur name ';
            } else
                $user_name = ($_POST['user_name']);
            if (empty($_POST["user_last_name"])) {
                $form_error['invalid_last_name'] = 'u need to write ur last name ';
            } else
                $user_last_name = ($_POST["user_last_name"]);
            if (empty($_POST['user_email'])) {
                $form_error['invalid_email'] = 'u need to write ur email';
            } else {
                $user_email = ($_POST["user_email"]);
                if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                    $form_error['invalid_email'] = 'unavailable email pls check it ';
                } else

                    include 'database_config/user_config.php';
                global $conn;
                $stmt = $conn->prepare("SELECT form_php.users.user_email from form_php.users WHERE user_email=?");
                $stmt->execute([$user_email]);
                $not_duplicate_email = $stmt->fetch();
                if ($not_duplicate_email) {
                    echo 'email is taken choose anotherur register';
                } else {
                    user_register();
                    echo 'ur registerd';}
                if (empty($_POST['user_password'])) {
                    $form_error['invalid_password'] = 'u need to write ur password ';
                } else {
                    $user_password = ($_POST["user_password"]);
                    if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $user_password)) {
                        $form_error['invalid_password'] = 'u need to fallow this step --> at least 8 character, one uppercase and lowercase English letter , one digit and ne special character';
                    }
                }
            }
        }
        ?>
        <label>user name

            <input type="text" name="user_name" value="<?php echo htmlspecialchars($user_name ?? '') ?>">
            <a class="red-text"><?php echo $form_error['invalid_name'] ?></a>

        </label>
        <label>last name

            <input type="text" name="user_last_name" value="<?php echo htmlspecialchars($user_last_name ?? '') ?>">
            <a class="red-text"><?php echo $form_error['invalid_last_name'] ?></a>

        </label>
        <label>email

            <input type="text" name="user_email"value="<?php echo htmlspecialchars($user_email ?? '') ?>" >
            <a class="red-text"><?php echo $form_error['invalid_email'] ?></a>

        </label>
        <label>password

            <input type="password" name="user_password" value="<?php echo htmlspecialchars($user_password ?? '') ?>">
            <a class="red-text"><?php echo $form_error['invalid_password'] ?></a>

        </label>
        <div class="center">
            <input type="file" name="file" >
        </div>

        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>

    </form>

</section>
</body>
</html>


