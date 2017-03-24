/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var $cartitems;
appendCartItem($cartitems);
appendCartItem($cartitems);
$.post("php/database.php",
        {
            basket: "all",
        },
        function (data) {
            $cartitems = JSON.parse(data);
            
        });
function appendCartItem($item)
{
    $singleproduct = "<div class='row product'>"+
                            "<div class='col-sm-8'>"+
                                "<div class='col-sm-4'>"+
                                    "<img class='img-responsive' src='data/productImages/"++ $item.image[0]+"'>"+ 
                                "</div>"+
                                "<div class='col-sm-8'>"+
                                    "<div class='row'>"+
                                        "<h3>Product Name:</h3>"+
                                        "<p>Price:</p>"+
                                        "<div class='row'>"+
                                            "<div class='col-sm-4'>"+   
                                                "<label for='qty-box'>Qty.</label>"+
                                            "</div>"+
                                            "<div class='col-sm-8'>"+
                                                "<input type='number' class='form-control' id='qty-box'  value='0'>"+
                                            "</div>"+
                                        "</div>"+
                                        "<input type='submit' class='btn btn-primary' id='removeproduct-btn' value='Remove' >"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+ 
                        "</div>";
    $("#viewarea").append($singleproduct);
   
}
