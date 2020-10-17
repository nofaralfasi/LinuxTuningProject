<div class='container'>
<div class='row'>
	<div class='col-sm-5 chart'>
		<canvas id="ram" height="200" width="200"></canvas>
		<script>		
			var data = {
				labels: [
					"Used",
					"Free"
				],
				datasets: [{
					data: [<?php echo $stat['ram_used']; ?>, <?php echo $stat['ram_free']; ?>],
					backgroundColor: ["red", "#97e300"],
					hoverBackgroundColor: ["#e93535", "#74e760"],
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

			var canvas = document.getElementById("ram");

			var ctx = canvas.getContext("2d");

			var memory_chart = new Chart(ctx,{
			    type: 'pie',
			    data: data,
			    options: options
			});

			function poll_memory_usage() {
				console.log("RAM Usage Request Sent");
				$.ajax({
				    type: "POST",
				    url: "./php/poll/poll_ram_free.php",
				    success: function(response){
				    	console.log("RAM Usage Response Recieved: "+response);
				    	memory_chart.data.datasets[0].data[0] = (<?php echo $stat['ram_total']; ?> - response).toFixed(3);
				    	memory_chart.data.datasets[0].data[1] = Number(response).toFixed(3);
				    	memory_chart.update(250, false);
				    	document.getElementById("ram_percent_text").innerHTML = "Percentage Used: " + (100-((response/<?php echo $stat['ram_total']; ?>) *100)).toFixed(2) + "%";
				    	document.getElementById("ram_free_text").innerHTML = "Free RAM: " + Number(response).toFixed(3) + " GB";
				    	document.getElementById("ram_used_text").innerHTML = "Used RAM: " + (<?php echo $stat['ram_total']; ?> - response).toFixed(3) + " GB";
				        return response;
				    }
				});
			}
			
			setInterval(function() {
				poll_memory_usage();
			}, 2000);

		</script>
	</div>
	<div class='col-sm-7'>
		<h3>🌡️ RAM</h3>
		<p id="ram_percent_text">Percentage Used: <?php echo $stat['ram_percent'],"%"; ?></p>
		<p id="ram_total_text">Total Memory: <?php echo $stat['ram_total']," GB"; ?></p>
		<p id="ram_free_text">Free Memory: <?php echo $stat['ram_free']," GB"; ?></p>
		<p id="ram_used_text">Used Memory: <?php echo $stat['ram_used']," GB"; ?></p>
	</div>
</div>
</div>
