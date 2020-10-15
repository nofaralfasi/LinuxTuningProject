<?php
	if(isSet($config['network']['interface'])){
		$config['network']['interface'] = "ens192";
	}
	$result = round(trim(file_get_contents("/sys/class/net/" . $config['network']['interface'] . "/statistics/rx_bytes")) / 1024/ 1024/ 1024, 2);
	echo $result;
	return $result;
?>
