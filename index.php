<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Linux Project</title>
	<meta name="description" content="Linux Project Nofar Alfasi">
	<link rel="shortcut icon" href="./img/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="./css/reset.min.css">
	<link rel="stylesheet" href="./css/base.css">
	<link rel="stylesheet" href="./css/skeleton.min.css">
	<meta name="theme-color" content="#333">
	<meta name="msapplication-navbutton-color" content="#333">

	<script type="text/javascript" src="./js/jquery-1.12.3.min.js"></script>
    	<script type="text/javascript" src="./js/Chart.min.js"></script>

	<?php
		$root = "./";
		$config = parse_ini_file('./conf/server_conf.ini', true);
	?>

</head>

<body>
	<?php include $root.'modules/common/mod_header.php' ?>

<!--Content-->

	<div class="linux-img">
		<img src='https://afraaltayer.files.wordpress.com/2014/03/logo-linux.png'/>
	</div>

	<div class='content' id='modules'>
		<?php 
			if ($config["display"]["os"] != false) {
				ob_start();
				$stat['os_name'] = include './php/poll/poll_os_name.php';
				$stat['os_kernel'] = include './php/poll/poll_os_kernel.php';
				$stat['os_uptime'] = include './php/poll/poll_os_uptime.php';
				ob_end_clean();
				include './modules/stat/mod_os.php';
			}
			if ($config["display"]["memory"] != false) {
				ob_start();
				$stat['memory_total'] = include './php/poll/poll_memory_total.php';
				$stat['ram_total'] = include './php/poll/poll_ram_total.php';
				$stat['ram_free'] = include './php/poll/poll_ram_free.php';
				$stat['ram_used'] = include './php/poll/poll_ram_used.php';
				$stat['ram_percent'] = round($stat['ram_used'] / $stat['ram_total'] * 100, 2);
				ob_end_clean();
				//include './modules/stat/mod_memory.php';
				include './modules/stat/mod_ram.php';
			}
			if ($config["display"]["hdd1"] != false) {
				ob_start();
				$stat['hdd1_total'] = include './php/poll/poll_hdd1_total.php';
				$stat['hdd1_free'] = include './php/poll/poll_hdd1_free.php';
				$stat['hdd1_used'] = $stat['hdd1_total'] - $stat['hdd1_free'];
				$stat['hdd1_percent'] = round($stat['hdd1_used'] / $stat['hdd1_total'] * 100, 2);
				ob_end_clean();
				include './modules/stat/mod_hdd1.php';
			}
			if ($config["display"]["hdd2"] != false) {
				ob_start();
				$stat['hdd2_total'] = include './php/poll/poll_hdd2_total.php';
				$stat['hdd2_free'] = include './php/poll/poll_hdd2_free.php';
				$stat['hdd2_used'] = $stat['hdd2_total'] - $stat['hdd2_free'];
				$stat['hdd2_percent'] = round($stat['hdd2_used'] / $stat['hdd2_total'] * 100, 2);
				ob_end_clean();
				include './modules/stat/mod_hdd2.php';
			}
			if ($config["display"]["hdd3"] != false) {
				ob_start();
				$stat['hdd3_total'] = include './php/poll/poll_hdd3_total.php';
				$stat['hdd3_free'] = include './php/poll/poll_hdd3_free.php';
				$stat['hdd3_used'] = $stat['hdd3_total'] - $stat['hdd3_free'];
				$stat['hdd3_percent'] = round($stat['hdd3_used'] / $stat['hdd3_total'] * 100, 2);
				ob_end_clean();
				include './modules/stat/mod_hdd3.php';
			}
			if ($config["display"]["cpu"] != false) {
				ob_start();
				$stat['cpu_model'] = include './php/poll/poll_cpu_model.php';
				$stat['cpu_usage'] = include './php/poll/poll_cpu_usage.php';
				ob_end_clean();
				include './modules/stat/mod_cpu.php';
			}
			if ($config["display"]["network"] != false) {
				ob_start();
				$stat['network_rx'] = include './php/poll/poll_network_rx.php';
				$stat['network_tx'] = include './php/poll/poll_network_tx.php';
				ob_end_clean();
				include './modules/stat/mod_network.php';
			}
		?>
	</div>

<!--Footer-->
	
	<?php include $root.'modules/common/mod_footer.php' ?>

</body>
</html>

<script>
	
	function checkSystemStatus(){
		var myElement = document.getElementById("ram_percent_text").innerHTML;
		console.log(myElement);
		var res = myElement.toString().substring(17,19);
		console.log(res);
		if(res > 95){
			alert("Currently more than 95% of your memory is in use! You need to clear your memory!");
		}
		clearInterval(t);
	}

	var t=setInterval(checkSystemStatus,2000);

</script>
