/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready( function (){
    $('#addCartButton').click(function(){
        if($('#qty').val()>0)
        {
            animatecart();
            $cartProducts = JSON.parse(localStorage.getItem("cart"));
            for()
            $cartProducts
        }
    });
} 
);
//////////////////////////////////////////////////////////////////////////////////////////////////
$.get("http://backend.dev/products/" + getUrlParameter('product'),
        function (data) {

            $product = JSON.parse(data);

            $('#producttitle').append("<h2>" + $product[0].name + "</h2>");
            $('#productprice').append("<h4>" + $product[0].price+"</h4>")
            $('#tabdesc').append("<p>"+$product[0].description+"</p>");
            $('#tabaddinfo').append("<p>"+$product[0].description+"</p>");
            updateProductCarousel($product[0]);

        });
$.post({
    cache: false,
    url: 'http://backend.dev/tracking',
    data: {json: JSON.stringify({
            user_id: JSON.parse(sessionStorage.getItem("loggeduser")).user._id.$oid,
            product_id: getUrlParameter('product')
        })},
    dataType: 'json',
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
/////////////////////////////////////////////////////////////////////////
function updateProductCarousel($product)
{
    for (var $productimageIndex = 0; $productimageIndex < $product.image.length; $productimageIndex++)
    {
        var $carouselitem = "<div class='item' id=carouselitem" + $productimageIndex + ">" +
                "<img src='data/productImages/" + $product.image[$productimageIndex] + "' alt='" + $product.name + "'>" +
                "</div>";

        $("#productcarousel").append($carouselitem);
    }
    $('#carouselitem0').addClass('active');
}
