/*jslint browser: true*/
/*global $, jQuery, alert*/
jQuery(document).ready(function ($) {
    'use strict';
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

    $("#cpu-slider").on("change mousemove", function (cpuamount) {
        cpuamount = $(this).val();
        if (cpuamount === '1') {
            $('#cpu-cores').html(dataOptions[0]);
            $('#cpu-price').html('Cost: $' + parseInt(cpuamount, 10) * 15);
        } else if (cpuamount === '2') {
            $('#cpu-cores').html(dataOptions[1]);
            $('#cpu-price').html('Cost: $' + parseInt(cpuamount, 10) * 15);
        } else if (cpuamount === '3') {
            $('#cpu-cores').html(dataOptions[2]);
            $('#cpu-price').html('Cost: $' + parseInt(cpuamount, 10) * 15);
        } else if (cpuamount > 3 || cpuamount === null || typeof cpuamount === 'undefined') {
            $('#cpu-cores').html('Wij nemen contact met u op');
            $('#cpu-price').html('');
        }
    });

    $("#ram-slider").on("change mousemove", function () {
        ramamount = $(this).val();
        $('#ram-amount').html(ramamount + "GB");
        $('#ram-price').html('Cost: $' + ramamount * 10);
    });
});
