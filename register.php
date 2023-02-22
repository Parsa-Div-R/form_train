



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
        $user_last_name=$user_name=$user_password=$user_email='';
        $form_error=['not_valid_email'=>'','not_valid_name'=>'','not_valid_password'=>'','not_valid_last_name'=>''];
        if (isset($_POST['submit'])) {

            if (empty($_POST['user_name'])) {
                $form_error['not_valid_name'] = 'u need to write ur name ';
            } else
                $user_name = ($_POST['user_name']);
            if (empty($_POST["user_last_name"])) {
                $form_error['not_valid_last_name'] = 'u need to write ur last name ';
            } else
                $user_last_name = ($_POST["user_last_name"]);
            if (empty($_POST['user_email'])) {
                $form_error['not_valid_email'] = 'u need to write ur email';
            } else {
                $user_email = ($_POST["user_email"]);
                if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                    $form_error['not_valid_email'] = 'unavailable email pls check it ';
                }
                if (empty($_POST['user_password'])) {
                    $form_error['not_valid_password'] = 'u need to write ur password ';
                } else {
                    $user_password = ($_POST["user_password"]);
                    if (preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $user_password)) {
                        echo htmlspecialchars($_POST["user_password"]);
                    }

                }
            }
        }
        ?>
        <label>user name

            <input type="text" name="user_name" value="<?php echo htmlspecialchars($user_name) ?>">
            <div class="red-text"><?php echo $form_error['not_valid_name'] ?></div>

        </label>
        <label>last name

            <input type="text" name="user_last_name" value="<?php echo htmlspecialchars($user_last_name) ?>">
            <div class="red-text"><?php echo $form_error['not_valid_last_name'] ?></div>

        </label>
        <label>email

            <input type="text" name="user_email"value="<?php echo htmlspecialchars($user_email) ?>" >
            <div class="red-text"><?php echo $form_error['not_valid_email'] ?></div>

        </label>
        <label>password

            <input type="password" name="user_password" value="<?php echo htmlspecialchars($user_password) ?>">
            <div class="red-text"><?php echo $form_error['not_valid_password'] ?></div>

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


