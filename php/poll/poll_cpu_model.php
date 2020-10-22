<?php
	//$cpu_result1 = shell_exec("cat /proc/cpuinfo | grep model\ name");
	$cpu_result = shell_exec("./../../scripts/grep name /proc/cpuinfo");

	//$cpu_result = substr($cpu_result, 0);
	//$cpu_result = explode("\n", $cpu_result);

	//$output = strstr($cpu_result, "\n", true);
	//$result = str_replace("model name	: ", "", $output);
	//$my_output = $v;
	echo $cpu_result;
	return $cpu_result;
?>
