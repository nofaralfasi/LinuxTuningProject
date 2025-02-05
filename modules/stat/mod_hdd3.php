<div class='container'>
<div class='row'>
	<div class='col-sm-5 chart'>
		<canvas id="hdd3" height="200" width="200"></canvas>
		<script>		
			var data = {
				labels: [
					"Used",
					"Free"
				],
				datasets: [{
					data: [<?php echo $stat['hdd3_used']; ?>, <?php echo $stat['hdd3_free']; ?>],
					backgroundColor: ["#ff0100", "#009b00"],
					hoverBackgroundColor: ["#dc0000", "green"],
					borderColor: ["#eee", "#eee"],
				}]
			};

			var options = {
				responsive: false,
				legend: {
           			display: false
        		},
		        tooltips: {
	                callbacks: {
	                    label: function(tooltipItem, data) {
	                        var value = data.datasets[0].data[tooltipItem.index];
	                        var label = data.labels[tooltipItem.index];
	                        return label + ': ' + value + 'GB';
	                    }
	                }
            	},
			};

			var canvas = document.getElementById("hdd3");

			var ctx = canvas.getContext("2d");

			var hdd3_chart = new Chart(ctx,{
			    type: 'pie',
			    data: data,
			    options: options
			});

		</script>
	</div>
	<div class='col-sm-7'>
		<h3>💽 Hard Drive 3 (<?php echo $config['hdd3']['path']; ?>)</h3>
		<p id="hdd3_percent_text">Hard Drive Usage: <?php echo $stat['hdd3_percent'],"%"; ?></p>
		<p id="hdd3_total_text">Hard Drive Capacity: <?php echo $stat['hdd3_total']," GB"; ?></p>
		<p id="hdd3_free_text">Hard Drive Free Space: <?php echo $stat['hdd3_free']," GB"; ?></p>
		<p id="hdd3_used_text">Hard Drive Used Space: <?php echo $stat['hdd3_used']," GB"; ?></p>
	</div>
</div>

</div>
