<?php
	// Linux Connections
	$connections = `netstat -ntu | grep :80 | grep ESTABLISHED | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`; 
	$totalconnections = `netstat -ntu | grep :80 | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;
?>
<div class='container'>
<div class='row'>
	<div class='col-sm-5 chart'>
		<canvas id="network" height="150" width="250"></canvas>
		<script>		
			var data = {
				labels: [
					"TX",
					"RX"
				],
				datasets: [{
					data: [<?php echo $stat['network_tx']; ?>, <?php echo $stat['network_rx']; ?>],
					backgroundColor: ["#ff0100", "#009b00"],
					hoverBackgroundColor: ["#dc0000", "green"],
					borderColor: ["#eee", "#eee"],
					borderWidth: 2,
				}]
			};

			var options = {
				responsive: true,
				legend: {
           			display: false,
        		},
		        tooltips: {
	                callbacks: {
	                    label: function(tooltipItem, data) {
	                        var value = data.datasets[0].data[tooltipItem.index];
	                        var label = data.labels[tooltipItem.index];
	                        return value + 'GB';
	                    }
	                }
            	},
            	scales: {
	                yAxes: [{
	                    gridLines: {
	                        display: true,
				fontColor: "#6c757d",
	                    },
	                    ticks: {
		                    userCallback: function(value, index, values) {                            
	                            value = value.toString();
				    value = value.substring(0, 4);
	                            return value + 'GB';
	                        },
	                        fontColor: "#6c757d",
	                    },
	                }],
	                xAxes: [{
	                    gridLines: {
	                        display: false,
	                    },
	                    ticks: {
	                    	fontColor: "#6c757d",
	                    }
	                }]
	            }
			};

			var canvas = document.getElementById("network");

			var ctx = canvas.getContext("2d");

			var network_chart = new Chart(ctx,{
			    type: 'bar',
			    data: data,
			    options: options
			});

		</script>
	</div>
	<div class='col-sm-7'>
		<h3>🖧 Network</h3>
		<p id="network_ip_text">Established Connections: <?php echo $connections; ?></p>
		<p id="network_ip_text">Total Connections: <?php echo $totalconnections; ?></p>
		<p id="network_tx_text">Network Tx: <?php echo $stat['network_tx']," GB"; ?></p>
		<p id="network_rx_text">Network Rx: <?php echo $stat['network_rx']," GB"; ?></p>
	</div>
</div>
</div>
