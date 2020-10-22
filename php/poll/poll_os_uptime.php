<?php
	//$uptime2 = shell_exec("cat /proc/uptime");
	$uptime = shell_exec("./scripts/cat2 /proc/uptime");
	$uptime = strstr($uptime, ".", true);
	$days = floor($uptime/60/60/24);
	$hours = $uptime/60/60%24;
	$mins = $uptime/60%60;
	$secs = $uptime%60;
	$result = "$days days $hours hours $mins minutes and $secs seconds";
	echo $result;
	return $result;
?>
