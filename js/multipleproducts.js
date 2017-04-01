/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var searchParam = getUrlParameter('search');
if (searchParam)
{

    $('.search').addClass('active');
    $('.search-box').val(searchParam);
    $('.search-box').focus();

    getProductsbyname(searchParam);

} else
{
    getProducts("");
}
////////////////////////////////////////////////////////////////////
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
////////////////////////////////////////////////////////////////////
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
//////////////////////////////////////////////////////////////////
function appendRow($products, $rowID)
{
    $("#viewarea").append("<div class ='row' id=rowid" + $rowID + ">");
    for ($colIndex = 1; $colIndex <= 4; $colIndex++)
    {
        $productIndex = ($rowID * 4) + $colIndex - 1;
        
        $("#rowid" + $rowID).append("<div class='col-sm-3'id='columnid" + $products[$productIndex]._id.$oid + "'></div>");
        $("#columnid" + $products[$productIndex]._id.$oid).append("<a href='./product.php?product="+$products[$productIndex]._id.$oid+"'><img class='img-responsive  multipleproductimage' src= 'http://backend.dev/files/" + $products[$productIndex].image[0] + "'></a>");
        $("#columnid" + $products[$productIndex]._id.$oid).append("<p>" + $products[$productIndex].name + "</p>");
        $("#columnid" + $products[$productIndex]._id.$oid).append("<p>" + $products[$productIndex].price + "</p>");
        $("#columnid" + $products[$productIndex]._id.$oid).append("<input type='submit' class='btn btn-primary addtocartbutton buttonmargin buttongrn' id='addCartButton' value='Add to cart' >");
        
        //   $("#rowid" + $rowID).append("</div>");
    }
//    $("#rowid" + 1).append("</div>");
}
////////////////////////////////////////////////////////////////////////////////////////////
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
;
