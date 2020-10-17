<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Linux Project</title>
    <meta name="description" content="Linux Project Nofar Alfasi">
    <link rel="shortcut icon" href="./img/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">

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
    ?>

</head>

<body class="bg-light">
<!--    --><?php //include $root.'modules/common/mod_header.php' ?>
<?php include $root . 'header.php' ?>
<!--Content-->

<div class="linux-img">
    <img src='https://afraaltayer.files.wordpress.com/2014/03/logo-linux.png' alt="linux_icon"/>
</div>

<div class='content' id='modules'>
    <?php
    if ($config["display"]["hdd3"] != false) {
        ob_start();
        $stat['hdd3_total'] = include './php/poll/poll_hdd3_total.php';
        $stat['hdd3_free'] = include './php/poll/poll_hdd3_free.php';
        $stat['hdd3_used'] = $stat['hdd2_total'] - $stat['hdd3_free'];
        $stat['hdd3_percent'] = round($stat['hdd3_used'] / $stat['hdd3_total'] * 100, 2);
        ob_end_clean();
        include './modules/stat/mod_hdd3.php';
    }
    ?>
</div>

<!--Footer-->

<?php include $root . 'modules/common/mod_footer.php' ?>

</body>
</html>

<script>

    function checkSystemStatus() {
        var myElement = document.getElementById("ram_percent_text").innerHTML;
        console.log(myElement);
        var res = myElement.toString().substring(17, 19);
        console.log(res);
        if (res > 95) {
            alert("Currently more than 95% of your memory is in use! You need to clear your memory!");
        }
        clearInterval(t);
    }

    var t = setInterval(checkSystemStatus, 2000);

</script>
