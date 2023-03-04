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
        max-width:460px ;
        margin: 20px auto;
        padding: 20px;
    }


    </style>

    <title>Document</title>
</head>
<body class="grey lighten-6">
    <nav class="white z-depth-5">
        <div class="container ">
            <a href="#" class="brand-logo brand-text"> company name </a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><a href="register.php" class="btn brand z-depth-0 " >register </a></li>
            </ul>
        </div>
    </nav>





