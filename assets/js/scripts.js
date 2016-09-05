jQuery(document).ready(function($) {
	var pricepermonth;
	pricepermonth = 129;

	//Choose the country
	$(".NLbtn").on('click', function() {
		$(".NLbtn").addClass('active');
		$(".DEbtn").removeClass('active');
		pricepermonth = 129;
		setPrice(pricepermonth)
		return false;
	});
	$(".DEbtn").on('click',  function() {
		$(".DEbtn").addClass('active');
		$(".NLbtn").removeClass('active');
		pricepermonth = 99;
		setPrice(pricepermonth)
		return false;
	});

	//Choose memory
	var cpuamount = 4;
	var ramamount = 8;
	var dataOptions = ['500GB','1TB','2TB'];

	$("#cpu-slider").on("change mousemove", function() {
		console.log(cpuamount);
		cpuamount = $(this).val();
		if (cpuamount == 1) {
			$('#cpu-cores').html(dataOptions[0]);
			$('#cpu-price').html('Cost: $' + cpuamount*15);
		} else if (cpuamount == 2) {
			$('#cpu-cores').html(dataOptions[1]);
			$('#cpu-price').html('Cost: $' + cpuamount*15);
		} else if (cpuamount == 3) {
			$('#cpu-cores').html(dataOptions[2]);
			$('#cpu-price').html('Cost: $' + cpuamount*15);
		} else {
			$('#cpu-cores').html('Wij nemen contact met u op');
			$('#cpu-price').html('');
		}
		//$('#cpu-cores').html(cpuamount);
		//$('#cpu-price').html('Cost: $' + cpuamount*15);
	});

	$("#ram-slider").on("change mousemove", function() {
		ramamount = $(this).val();
		$('#ram-amount').html(ramamount + "GB");
		$('#ram-price').html('Cost: $' + ramamount*10);
	});

	var $s = $('.priceslider').slider({
max: 15,
min: 1,
value: 2,
slide: function(e,ui) {
  var calcprice;
  calcprice = (ui.value * pricepermonth);
  var output;
  var outputinfo;
  if(ui.value > 10) {
    $(".pricingtable").hide();
    $(".enterprisepricing").show();
  } else {
     $(".pricingtable").show();
    $(".enterprisepricing").hide();
  }
    output = ("$" + calcprice + "/mo");
  outputinfo = (ui.value);

    $('.pricingtable').html(output);
  $('.employeenocont').html(outputinfo);
}
});

function setPrice(pricepermonth) {
  var calcprice;
  var value=$s.slider("value");
  calcprice = (value * pricepermonth);
  if (value > 10) {
 $('.pricingtable').hide();
    $(".enterprisepricing").show();
  } else {
    $('.pricingtable').html("$" + calcprice + "/mo");
  }
  outputinfo = (ui.value);
  $('.employeenocont').html(outputinfo);
}
});
