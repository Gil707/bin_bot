function loadBTCCourses() {
    $.ajax('/trade/getprice', {
        type: "GET",
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                let date = new Date($.now());
                let price = (parseFloat(data.btc_usdt)).toFixed(4);

                $("#btccrs").html(price);
                $("#sellinput").attr("placeholder", price);
                $("#btccrs_time").html("Last refresh in " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds());
            } else return console.log('error');
        }
    });
}

loadBTCCourses();

setInterval(function () {
    loadBTCCourses();
}, 10000);

$("#sellinput").keyup(function() {
    let price_bi = parseFloat($("#price_sellinput").val());
    let bi = parseFloat($("#sellinput").val());
    if (price_bi && bi) {
        $("#sell_result").html('Deal price: ' + (price_bi * bi).toFixed(4) + ' USDT');
    }
});

$("#price_sellinput").keyup(function() {
    let price_bi = parseFloat($("#price_sellinput").val());
    let bi = parseFloat($("#sellinput").val());
    if (price_bi && bi) {
        $("#sell_result").html('Deal price: ' + (price_bi * bi).toFixed(4) + ' USDT');
    }
});
