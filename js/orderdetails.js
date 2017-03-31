/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//////////////////////////////////////////////////////////////////////////////////////////////////
$.get("http://backend.dev/orders/" + getUrlParameter('order'),
        function (data) {

            $order = JSON.parse(data);

          
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
function appendOrderItem($item)
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
            "<input type='submit' class='btn btn-primary buttongrn' id='removeproduct-btn' value='Remove' >" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";
    $("#viewarea").append($singleproduct);
}