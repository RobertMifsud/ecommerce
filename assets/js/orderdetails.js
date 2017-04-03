/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    total = 0;
    shippingMethod = '';
    gotTotals = false;

    var orderId = getUrlParameter('order');
    $('#order-id').html(orderId);

    $.ajax({
        url: "http://backend.dev/orders/" + orderId,
        async: false,
        success: function(data) {
            var $order = JSON.parse(data);
            $orders = $order[0].orders[0];

            appendProducts($orders);
        }
    });
    function getShippingAndCalculateTotal() {
        $.ajax({
            url:"http://backend.dev/shipping-methods/" + $orders.shipping_method.$oid,
            async: false,
            success: function(re) {
                data = JSON.parse(re);

                $("#shippingselect").html(data[0].name);
                $("#delivery").html(data[0].price);

                calculateTotal();
            }
        })
    }

    function appendProducts($orders) {
        var $products = new Array();
        $products = $orders.products;

        for(var $x =0; $x<$products.length;$x++)
        {
            getorderProduct($products[$x]);
        }

        getShippingAndCalculateTotal();
    }

    $('#subtotal').bind("DOMSubtreeModified", function() {
       calculateTotal();
    });

    function calculateTotal() {
        totalIncDelivery = (parseFloat($("#delivery").html()) + parseFloat($("#subtotal").html()));
        $('#total-amount').html(totalIncDelivery.toFixed(2));
    }

    function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    }

    function appendOrderItem($item,$product)
    {
        total = (parseFloat(total) + parseFloat($product[0].price));

        singleProduct = "<div class='row product'>" +
            "<div class='col-sm-8'>" +
            "<div class='col-sm-4'>" +
            "<img class='img-responsive' src='http://backend.dev/files/" + $product[0].image[0] + "'>" +
            "</div>" +
            "<div class='col-sm-8'>" +
            "<div class='row'>" +
            "<h3 class='margin-top-0 dark-green-color bold'>" + $product[0].name + "</h3>" +
            "<p class='dark-green-color'>Price: &euro;" + $product[0].price + "</p>" +
            "<div class='row'>" +
            "<div class='col-sm-4 padding-left-0'>" +
            "<label class='dark-green-color' for='qty-box'>Quantity</label>" +
            "</div>" +
            "<div class='col-sm-8'>" +
            "<input disabled='true' type='number' class='form-control' id='qty-box' value='" + $item.qty + "'>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $("#viewarea").append(singleProduct);

        $('#subtotal').html(total.toFixed(2));
    }

    function getorderProduct($item)
    {
        var $product;
        $.get("http://backend.dev/products/" + $item._id.$oid,
            function (data) {
                $product = JSON.parse(data);
                appendOrderItem($item,$product);
            });

    }
});
