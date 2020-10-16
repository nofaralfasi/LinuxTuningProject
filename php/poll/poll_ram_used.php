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
	$memtotal = round($mem[1] / 1000000,2);
	$memused = round($mem[2] / 1000000,2);
	$memfree = round($mem[3] / 1000000,2);
	$memshared = round($mem[4] / 1000000,2);
	$memcached = round($mem[5] / 1000000,2);
	$memavailable = round($mem[6] / 1000000,2);

	$memusage = round(($memavailable/$memtotal)*100);

	$stat['ram_mem_total'] =  $memtotal;
	$stat['ram_mem_used'] = $memused;
	$stat['ram_mem_available'] = $memavailable;

	echo $memused;
	return $memused;
?>
