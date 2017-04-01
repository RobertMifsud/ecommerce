/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//addFeatured($products);
getfeatured();
getrecomended();
//addFeatured(null);
////////////////////////////////////////////////////////////////////
//get products by a given nae
function getfeatured()
{
    $.get("http://backend.dev/products/featured", function (data) {
        var $products = JSON.parse(data);
        addFeatured($products);
    });
}
////////////////////////////////////////////////////////////////
function getrecomended()
{
    $.get("http://backend.dev/recommended/"+JSON.parse(sessionStorage.getItem("loggeduser")).id ,function (data) {
        var $products = JSON.parse(data);
        addRecomended($products);

     
    });
}
//////////////////////////////////////////////////////////////////
function addFeatured($products)
{

    for (var $productIndex = 0; $productIndex < $products.length; $productIndex++)
    {
        var $featureditem = "<div class='item' id=featured"+ $productIndex+">" +
            "<a href='./product.php?product="+$products[$productIndex]._id.$oid+"'><img src='http://backend.dev/files/" + $products[$productIndex].image[0] + "' alt='" + $products[$productIndex].name + "'></a>" +
            "</div>";
       
        $("#featuredcarousel").append($featureditem);
    }
    $('#featured0').addClass('active');
}
/////////////////////////////////////////////////////////////////////////////////
function addRecomended($products)
{

    for (var $productIndex = 0; $productIndex < $products.length; $productIndex++)
    {
        var $featureditem = "<div class='item' id=recomended"+ $productIndex+">" +
            "<a href='./product.php?product="+$products[$productIndex]._id.$oid+"'><img src='http://backend.dev/files/" + $products[$productIndex].image[0] + "' alt='" + $products[$productIndex].name + "'></a>" +
            "</div>";
       
        $("#recomendedcarousel").append($featureditem);
    }
    $('#recomended0').addClass('active');
}

