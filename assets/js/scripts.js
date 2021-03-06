/*jslint browser: true*/
/*global $, jQuery, alert*/
jQuery(document).ready(function ($) {
    'use strict';
    //var setup
    var pricepermonth,
        //Choose memory
        cpuamount = 4,
        ramamount = 8,
        dataOptions = ['500GB', '1TB', '2TB'],
        $s = $('.priceslider').slider({
            max: 15,
            min: 1,
            value: 2,
            slide: function (e, ui) {
                var calcprice,
                    output;
                calcprice = (ui.value * pricepermonth);
                if (ui.value > 10) {
                    $(".pricingtable").hide();
                    $(".enterprisepricing").show();
                } else {
                    $(".pricingtable").show();
                    $(".enterprisepricing").hide();
                }
                output = ("$" + calcprice + "/mo");

                $('.pricingtable').html(output);
            }
        });

    //CPU slider functionality
    $("#cpu-cores-slider").on("change mousemove", function (cpuamount) {
        cpuamount = $(this).val();
        if (cpuamount === '1') {
            $('#cpu-cores-product').html(dataOptions[0]);
            $('#cpu-price').html('Cost: $' + parseInt(cpuamount, 10) * 15);
        } else if (cpuamount === '2') {
            $('#cpu-cores-product').html(dataOptions[1]);
            $('#cpu-price').html('Cost: $' + parseInt(cpuamount, 10) * 15);
        } else if (cpuamount === '3') {
            $('#cpu-cores-product').html(dataOptions[2]);
            $('#cpu-price').html('Cost: $' + parseInt(cpuamount, 10) * 15);
        } else if (cpuamount > 3 || cpuamount === null || typeof cpuamount === 'undefined') {
            $('#cpu-cores-product').html('Meer dan 2TB');
            $('#cpu-price').html('');
        }
    });

    //RAM slider functionality
    $("#ram-slider").on("change mousemove", function () {
        ramamount = $(this).val();
        $('#ram-product').html(ramamount + "GB");
        $('#ram-price').html('Cost: $' + ramamount * 10);
    });

    function updateOutcome() {
        //Total amount
        cpuamount = $(this).val();

        if (cpuamount > 3 || cpuamount === null || typeof cpuamount === 'undefined') {
            $('#total_amount').html('Wij nemen contact met u op.');
        } else {
            $('#total_amount').html('Cost: $' + parseInt(cpuamount, 10) * 15);
        }
    }

    //Change the price on input change
    document.getElementById("cpu-cores-slider").addEventListener("change", updateOutcome);
});
