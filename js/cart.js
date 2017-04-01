/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var $cartitems;
var $shippings;
var $subtotal;
var $grandtotal;
var $shippingcost;
$(document).ready(function () {
    $.get("http://backend.dev/shipping-methods",
            function (data) {
                $shippings = JSON.parse(data);
                $('#shippingselect').empty();
                
                for ($x in $shippings)
                {
                    $('#shippingselect').append($('<option>', {value: $x, text: $shippings[$x].name}));
                }
                $('#shippingselect').change ( function () {
                    $shippingcost = $shippings[$("#shippingselect option:selected").index()].price;
                    $("#shippingcostvalue").text($shippingcost);
                    $grandtotal = $shippingcost+$subtotal;
                    $("#totalcostvalue").text($grandtotal);
                  });
            });

    $('#checkout-btn').click(function () {
        var shipmethod = $shippings[$("#shippingselect option:selected").index()]._id.$oid;
        $.post({
            cache: false,
            url: 'http://backend.dev/orders',
            success: checkoutSucceeded(),
            data: {
                //    json: localStorage.getItem("cart")
                username: JSON.parse(sessionStorage.getItem("loggeduser")).username,
                products: getCartProducts(JSON.parse(localStorage.getItem("cart"))),
                shipping_method: shipmethod
            },
            dataType: 'json',
        });
//////////
    })
});
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
$cartitem = JSON.parse(localStorage.getItem("cart"));
////////////////////////
for (let i = 0; i < $cartitem.length; ++i)
{
    appendCartItem($cartitem[i]);
}
calculatesubTotal($cartitem);
///////////////////////////////////////////////////////////////////////////////
function appendCartItem($item)
{
    $singleproduct = "<div class='row product'>" +
            "<div class='col-sm-8'>" +
            "<div class='col-sm-4'>" +
            "<img class='img-responsive' src='data/productImages/" + $item.image + "'>" +
            "</div>" +
            "<div class='col-sm-8'>" +
            "<div class='row'>" +
            "<h3>Product Name:" + $item.name + "</h3>" +
            "<p>Price:" + $item.price + "</p>" +
            "<div class='row'>" +
            "<div class='col-sm-4'>" +
            "<label for='qty-box'>Qty.</label>" +
            "</div>" +
            "<div class='col-sm-8'>" +
            "<input type='number' class='form-control' id='qty-box'  value='" + $item.qty + "'>" +
            "</div>" +
            "</div>" +
            "<input type='button' class='btn btn-primary buttongrn' value='Remove'  onclick=removeProduct('"+$item._id+"')>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
    $("#viewarea").append($singleproduct);
}
//////////////////////////////////////////////////////////////////////////////////////////////////
function getCartProducts($cartitems)
{
    var products = new Array();
    for (var $x = 0; $x < $cartitems.length; $x++)
    {
        products.push({_id: $cartitems[$x]._id, qty: $cartitems[$x].qty});
    }
    return products;
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function checkoutSucceeded()
{
    window.location.replace("./orders.php");
   //  localStorage.removeItem("cart");
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
function calculatesubTotal($items)
{
    let $total = 0;
    for (let i = 0; i < $items.length; ++i)
    {
        $total += $items[i].price * $items[i].qty;
    }
    $("#subtotalvalue").append($total);
    $subtotal = $total;
}
/////////////////////////////////////////////////////////////////////////////////////////
function removeProduct($itemid)
{
    for(var $i=0;$i<$cartitem.length;$i++)
    {
        if($cartitem[$i]._id==$itemid)
        {
            $cartitem.splice($i,1);
        }
    }
    localStorage.setItem("cart",JSON.stringify($cartitem));
    location.reload();
}