<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Linux Project</title>
    <meta name="description" content="Linux Project Nofar Alfasi">
    <link rel="shortcut icon" href="./img/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <script type="text/javascript" src="./js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="./js/Chart.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <?php
    $root = "./";
    $config = parse_ini_file('./conf/server_conf.ini', true);
    shell_exec("echo Linux1212 | sudo -S chmod 777 /scripts/ls");
    shell_exec("echo Linux1212 | sudo -S chmod 777 /scripts/cat2");
    ?>

</head>

<body class="bg-light">
    <?php include $root . 'header.php' ?>

<div class="linux-img">
    <img src='https://afraaltayer.files.wordpress.com/2014/03/logo-linux.png' alt="linux_icon"/>
</div>

<div class='content' id='modules'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12'>
                <h3>Linux Tuning Project</h3>
                <p>Implementation of a PHP web interface for basic monitoring of system resources on Linux servers.</p>
                <p>This project's main goal is to show status information of a linux server and display warning massages when needed.</p>
            </div>
        </div>
    </div>
</div>

<!--Footer-->

<?php include $root . 'modules/common/mod_footer.php' ?>

</body>
</html>

