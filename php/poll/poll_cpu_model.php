<?php
	//$cpu_result2 = shell_exec("cat /proc/cpuinfo | grep model\ name");
	$cpu_result = shell_exec("./scripts/grep name /proc/cpuinfo");
	$cpu_result = strstr($cpu_result, "\n", true);
	$cpu_result = str_replace("model name	: ", "", $cpu_result);
	$my_output = $cpu_result;
	echo $cpu_result;
	return $cpu_result;
?>



