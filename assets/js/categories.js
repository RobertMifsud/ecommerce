/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var $categories;
$.get("http://backend.dev/categories",
    function (data) {
        $categories = JSON.parse(data);
        for ($x in $categories) {
            $('#categoriessidebar').append("<li data-category-id='" + $categories[$x]._id.$oid + "'><a href='#' onClick='getCategory(\"" + $categories[$x]._id.$oid + "\");'>" + $categories[$x].name + "</a></li>");
        }
    });

function getCategory($_id) {
    $.get("http://backend.dev/categories/" + $_id, function(data) {
        $data = JSON.parse(data);

        $products = $data['products'];
        $('#viewarea').html("");
        var noRows = $products.length / 4;
        for ($rowIndex = 0; $rowIndex < noRows; $rowIndex++)
        {
            appendRow($products, $rowIndex);
        }
        return $products;
    });


    $("#categoriessidebar").children('li').removeClass("active");
    $("#categoriessidebar > li[data-category-id='" + $_id + "']").addClass("active");
}

function appendRow($products, $rowID)
{
    $("#viewarea").append("<div class='row row-centere margin-bottom-25d' id=rowid" + $rowID + ">");
    for ($colIndex = 1; $colIndex <= 4; $colIndex++)
    {
        $productIndex = ($rowID * 4) + $colIndex - 1;

        $("#rowid" + $rowID).append("<div class='col-sm-3 columns-centered product-column' id='" + $products[$productIndex]._id.$oid + "'></div>");
        $("#" + $products[$productIndex]._id.$oid).append("<a class='product-image' data-image='"+$products[$productIndex].image[0]+"' href='/products/index.php?product="+$products[$productIndex]._id.$oid+"'><img class='img-responsive  multipleproductimage' src= 'http://backend.dev/files/" + $products[$productIndex].image[0] + "'></a>");
        $("#" + $products[$productIndex]._id.$oid).append("<p class='product-name dark-green-color bold'>" + $products[$productIndex].name + "</p>");
        $("#" + $products[$productIndex]._id.$oid).append("<p class='product-price dark-green-color' data-price='" + $products[$productIndex].price + "'>&euro;" + $products[$productIndex].price + "</p>");
        $("#" + $products[$productIndex]._id.$oid).append("<input type='button' class='btn btn-primary addtocartbutton buttonmargin buttongrn' id='addCartButton' value='Add to cart' >");
    }
}