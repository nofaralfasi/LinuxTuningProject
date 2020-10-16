<?php
	// Linux CPU
	$load = sys_getloadavg();
	$cpuload = $load[0];
	// Linux MEM
	$free = shell_exec('free');
	$free = (string)trim($free);
	$free_arr = explode("\n", $free);
	$mem = explode(" ", $free_arr[1]);
	$mem = array_filter($mem, function($value) { return ($value !== null && $value !== false && $value !== ''); }); // removes nulls from array
	$mem = array_merge($mem); // puts arrays back to [0],[1],[2] after 

	$memfree = round($mem[3] / 1000000,2);

	$memavailable = round($mem[6] / 1000000,2);

	$stat['ram_mem_available'] = $memavailable;

	echo $memavailable;
	return $memavailable;
?>
