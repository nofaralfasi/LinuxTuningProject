<?php
	//$prevVal = shell_exec("cat /proc/stat");
	$prevVal = shell_exec("./../../scripts/cat2 /proc/stat");
	//echo "<script>console.log('prevVal Objects: " . $prevVal . "' );</script>";
	$prevArr = explode(' ',trim($prevVal));
	$prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
	//$prevTotal2 = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5] + $prevArr[6] + $prevArr[7] + $prevArr[8];
	$prevIdle = $prevArr[5];
	usleep(0.15 * 1000000);
	//sleep(1);
	$val = shell_exec("./../../scripts/cat2 /proc/stat");
	$arr = explode(' ', trim($val));
	$total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
	//$total2 = $arr[2] + $arr[3] + $arr[4] + $arr[5] + $arr[6] + $arr[7] + $arr[8];
	$idle = $arr[5];
	$intervalTotal = intval($total - $prevTotal);
	$result = intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));

	//$cpu = sys_getloadavg();
	//$load["cpu"] = round($cpu[0] + 0.2, 2);

	//$result = (($result + ($load["cpu"] * 10)) / 2);
	//$result = $load["cpu"];
	echo $result;
	return $result;	

?>
