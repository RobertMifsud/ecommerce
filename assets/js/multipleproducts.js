/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).on('click', "#addCartButton", function (){
        animatecart();

        $cartProducts = JSON.parse(localStorage.getItem("cart"));

        if($cartProducts == null)
        {
            var $cartProducts = new Array();
        }

        $item = {
            _id: $(this).closest('.product-column').attr("id"),
            name: $(this).closest('.product-column').children(".product-name").html(),
            image:$(this).closest('.product-column').children(".product-image").attr("data-image"),
            qty:1,
            price:$(this).closest('.product-column').children(".product-price").attr("data-price")
        };

        $cartProducts.push($item);
        localStorage.setItem("cart",JSON.stringify($cartProducts));
        $("#items-cart")[0].innerHTML=getCartAmount()
});

function getCartAmount()
{
    $cartProducts = JSON.parse(localStorage.getItem("cart"));

    if($cartProducts == null)
    {
        return 0;
    }

    return $cartProducts.length;
}

var searchParam = getUrlParameter('search');
if (searchParam)
{

    $('.search').addClass('active');
    $('.search-box').val(searchParam);
    $('.search-box').focus();

    getProductsbyname(searchParam);

} else if (getUrlParameter("view") == "recommended") {
    getRecommended();
} else if (getUrlParameter("view") == "featured") {
    getProducts("/featured");

    $(".menu-items").children('li').removeClass("active");
    $(".menu-items > li#featured-menu-button").addClass("active");
} else {
    getProducts("");
}
function getRecommended()
{
    $.get("http://backend.dev/recommended/"+JSON.parse(sessionStorage.getItem("loggeduser")).id, function (data) {
        var $products = JSON.parse(data);
        var noRows = $products.length / 4;
        for ($rowIndex = 0; $rowIndex < noRows; $rowIndex++)
        {
            appendRow($products, $rowIndex);
        }
        return $products;
    });
}

//get products by a given nae
function getProductsbyname($viewType)
{
    $.get("http://backend.dev/search/" + $viewType, function (data) {
        var $products = JSON.parse(data);
        var noRows = $products.length / 4;
        for ($rowIndex = 0; $rowIndex < noRows; $rowIndex++)
        {
            appendRow($products, $rowIndex);
        }
        return $products;
    });
}

//get products by a given id
function getProducts($viewType)
{
    $.get("http://backend.dev/products" + $viewType, function (data) {
        var $products = JSON.parse(data);
        var noRows = $products.length / 4;
        for ($rowIndex = 0; $rowIndex < noRows; $rowIndex++)
        {
            appendRow($products, $rowIndex);
        }
        return $products;
    });
}

function sortProducts(type) {
    $.get("http://backend.dev/products/" + type, function(data) {
        $("#viewarea").html("");

        var products = JSON.parse(data);
        var noRows = products.length / 4;

        for (rowIndex = 0; rowIndex < noRows; rowIndex++)
        {
            appendRow(products, rowIndex);
        }
    });
}

function appendRow($products, $rowID)
{
    $("#viewarea").append("<div class='row row-centered margin-bottom-50' id=rowid" + $rowID + ">");
    for ($colIndex = 1; $colIndex <= 4; $colIndex++)
    {
        $productIndex = ($rowID * 4) + $colIndex - 1;
        
        $("#rowid" + $rowID).append("<div class='col-sm-3 columns-centered product-column' id='" + $products[$productIndex]._id.$oid + "'></div>");
        $("#" + $products[$productIndex]._id.$oid).append("<a class='product-image' data-image='"+$products[$productIndex].image[0]+"' href='/products/index.php?product="+$products[$productIndex]._id.$oid+"'><img class='img-responsive  multipleproductimage' src= 'http://backend.dev/files/" + $products[$productIndex].image[0] + "'></a>");
        $("#" + $products[$productIndex]._id.$oid).append("<p class='margin-left-40 product-name dark-green-color bold'>" + $products[$productIndex].name + "</p>");
        $("#" + $products[$productIndex]._id.$oid).append("<p class='margin-left-40 product-price dark-green-color' data-price='" + $products[$productIndex].price + "'>&euro;" + $products[$productIndex].price + "</p>");
        $("#" + $products[$productIndex]._id.$oid).append("<input type='button' class='margin-left-40 btn btn-primary addtocartbutton buttonmargin buttongrn' id='addCartButton' value='Add to cart' >");
    }
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
};
