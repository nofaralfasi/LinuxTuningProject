<?php
	$prevVal2 = shell_exec("cat /proc/stat");
	$prevVal3 = shell_exec("./../../scripts/cat /proc/stat");
	//shell_exec("sudo chmod 777 cat");
	//$exec = "echo Linux1212 | /usr/bin/sudo -S chmod 777 cat";
	//exec($exec,$out,$rcode);
	shell_exec("sudo chmod 777 cat linuxu Linux1212");
	$prevVal = shell_exec("./cat /proc/stat");
	//echo "<script>console.log('prevVal Objects: " . $prevVal . "' );</script>";
	$prevArr = explode(' ',trim($prevVal));
	//echo "<script>console.log('prevVal Objects: " . $prevArr[2] . "' );</script>";
	$prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
	$prevTotal2 = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5] + $prevArr[6] + $prevArr[7] + $prevArr[8];
	$prevIdle = $prevArr[5];
	usleep(0.15 * 1000000);
	$val2 = shell_exec("cat /proc/stat");
	$val3 = shell_exec("./../../scripts/cat /proc/stat");
	$val = shell_exec("./cat /proc/stat");
	$arr = explode(' ', trim($val));
	$total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
	$total2 = $arr[2] + $arr[3] + $arr[4] + $arr[5] + $arr[6] + $arr[7] + $arr[8];
	$idle = $arr[5];
	$intervalTotal = intval($total - $prevTotal);
	$result = intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));
	echo $result;
	return $result;
?>
