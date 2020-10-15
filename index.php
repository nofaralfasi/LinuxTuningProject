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
    <!--<script type="text/javascript" src="./js/angular.min.js"></script>-->

	<?php
		$root = "./";
		$config = parse_ini_file('./conf/server_conf.ini', true);
	?>

</head>

<body>
	<?php include $root.'modules/common/mod_header.php' ?>

<!--Content-->

	<!-- <div class="linux-img">
		<img src='https://images.vexels.com/media/users/3/140692/isolated/preview/72d1f12edf758d24f5b6db73bac4f297-linux-logo-by-vexels.png'/>
		<!--<img src='https://bloximages.newyork1.vip.townnews.com/redandblack.com/content/tncms/assets/v3/editorial/4/59/45940eb2-5403-11e9-a843-db0e4491cc90/5ca13d8453042.image.jpg'/>
	</div>-->

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
				$stat['memory_free'] = include './php/poll/poll_memory_free.php';
				$stat['memory_used'] = $stat['memory_total'] - $stat['memory_free'];
				$stat['memory_percent'] = round($stat['memory_used'] / $stat['memory_total'] * 100, 2);
				ob_end_clean();
				include './modules/stat/mod_memory.php';
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
			if ($config["display"]["network"] == false) {
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
	<?php include $root.'modules/common/check_system_status.php' ?>	



</body>
</html>

<script>
	var myElement = document.getElementById("memory_percent_text").innerHTML;
	console.log(myElement);
	var res = myElement.toString().substring(17,19);
	console.log(res);
	if(res > 95){
		alert("Currently more than 95% of your memory is in use! You need to clear your memory!");
	}

</script>
