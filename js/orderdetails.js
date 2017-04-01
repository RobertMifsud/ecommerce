/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//////////////////////////////////////////////////////////////////////////////////////////////////
$.get("http://backend.dev/orders/" + getUrlParameter('order'),
        function (data) {

            var $order = JSON.parse(data);
            var $orders = $order[0].orders[0];
            var $products = new Array();
                 $products=   $orders.products;
          for(var $x =0; $x<$products.length;$x++)
          {
             // appendOrderItem($products[$x]);
             getorderProduct($products[$x]);
          }
        });
////////////////////////////////////////////////////////////////
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
///////////////////////////////////////////////////////////////////////////////
function appendOrderItem($item,$product)
{
    $singleitem = "<div class='row orderitem'>" +
            "<div class='col-sm-8'>" +
            "<div class='col-sm-4'>" +
            "<img class='img-responsive' src='http://backend.dev/files/" + $product[0].image[0] + "'>" +
            "</div>" +
            "<div class='col-sm-8'>" +
            "<div class='row'>" +
            "<h3>Product Name:" + $product[0].name + "</h3>" +
            "<div class='row'>" +
            "<div class='col-sm-4'>" +
            "<h3>Qty:" + $item.qty + "</h3>"  +
            "</div>" +
            "<div class='col-sm-8'>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
    $("#orderlist").append($singleitem);
}
////////////////////////////////////////////////////////////////////////////////////
function getorderProduct($item)
{
    var $product;
    $.get("http://backend.dev/products/" + $item._id.$oid,
        function (data) {

            $product = JSON.parse(data);
            appendOrderItem($item,$product);
        });
        
}