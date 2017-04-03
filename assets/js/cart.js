/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
shippingCost = 0;
shippingMethod = '';
subtotal = 0;

function removeProduct(itemid) {
    for (var $i = 0; $i < cartItems.length; $i++) {
        if (cartItems[$i]._id == itemid) {
            cartItems.splice($i, 1);
        }
    }

    localStorage.setItem("cart", JSON.stringify(cartItems));
    location.reload();
}

$(document).ready(function () {
    $.get("http://backend.dev/shipping-methods", function (data) {
        shippings = JSON.parse(data);
        $('#shippingselect').empty();

        for (i = 0; i < shippings.length; i++) {
            $('#shippingselect').append('<option data-id="' + shippings[i]._id.$oid + '" value="' + shippings[i].price + '">' + shippings[i].name + '</option>');
        }

        shippingCost = parseFloat($('#shippingselect').val()).toFixed(2);
        $('#delivery').html(shippingCost);
        shippingMethod = $('#shippingselect option:selected').attr('data-id');

        $('#shippingselect').on('change', function (e) {
            shippingCost = parseFloat($(this).val()).toFixed(2);
            $('#delivery').html(shippingCost);
            shippingMethod = $('option:selected', this).attr('data-id');
            calculateTotals(cartItems);
        });

        cartItems = JSON.parse(localStorage.getItem("cart"));

        for (var i = 0; i < cartItems.length; ++i) {
            appendCartItem(cartItems[i]);
        }

        calculateTotals(cartItems);
    });

    function appendCartItem($item) {
        singleProduct = "<div class='row product'>" +
            "<div class='col-sm-8'>" +
            "<div class='col-sm-4'>" +
            "<img class='img-responsive' src='http://backend.dev/files/" + $item.image + "'>" +
            "</div>" +
            "<div class='col-sm-8'>" +
            "<div class='row'>" +
            "<h3 class='margin-top-0 dark-green-color bold'>" + $item.name + "</h3>" +
            "<p class='dark-green-color'>Price: &euro;" + $item.price + "</p>" +
            "<div class='row'>" +
            "<div class='col-sm-4 padding-left-0'>" +
            "<label class='dark-green-color' for='qty-box'>Quantity</label>" +
            "</div>" +
            "<div class='col-sm-8'>" +
            "<input disabled='true' type='number' class='form-control' id='qty-box' value='" + $item.qty + "'>" +
            "</div>" +
            "</div>" +
            "<input type='button' class='btn btn-primary buttongrn' value='Remove' onclick=removeProduct('" + $item._id + "')>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $("#viewarea").append(singleProduct);
    }

    $('#checkout-btn').click(function() {
        $.post({
            cache: false,
            url: 'http://backend.dev/orders',
            data: {
                username: JSON.parse(sessionStorage.getItem("loggeduser")).username,
                products: getCartProducts(JSON.parse(localStorage.getItem("cart"))),
                shipping_method: shippingMethod
            },
            success: function(re) {
               if (re.status == "success") {
                   checkoutSucceeded();
               }
            },
            dataType: 'json',
        });
    });

    function getCartProducts($cartitems)
    {
        var products = new Array();
        for (var $x = 0; $x < $cartitems.length; $x++)
        {
            products.push({_id: $cartitems[$x]._id, qty: $cartitems[$x].qty});
        }
        return products;
    }

    function checkoutSucceeded()
    {
        window.location = "/orders";
        localStorage.removeItem("cart");
    }

    function calculateTotals(items) {
        var total = 0;

        for (var i = 0; i < items.length; ++i) {
            total += (parseFloat(items[i].price) * parseInt(items[i].qty));
        }

        $("#subtotal").html(total.toFixed(2));

        total = (parseFloat(total) + parseFloat(shippingCost));
        $("#total-amount").html(total.toFixed(2));
    }
});
