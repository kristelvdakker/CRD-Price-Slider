jQuery(document).ready(function($) {
	var cpuamount = 4;
	var ramamount = 8;

	$("#cpu-slider").on("change mousemove", function() {
	console.log('hallo');
		cpuamount = $(this).val();
		$('#cpu-cores').html(cpuamount);
		$('#cpu-price').html('Cost: $' + cpuamount*15);
	});

	$("#ram-slider").on("change mousemove", function() {
		ramamount = $(this).val();
		$('#ram-amount').html(ramamount + "GB");
		$('#ram-price').html('Cost: $' + ramamount*10);
	});
});
