/*var i;
var x = document.getElementsByClassName("addtocartbutton");
for (i = 0; i < x.length; i++) {
    x[i].style.addEventListener("click", animatetocart);
}*/
$(document).ready(function () {
    $("#items-cart")[0].innerHTML=getCartAmmount() ;//getCartAmmount();
});
///////////////////////////////////////////////////////////////////////////
function animatecart(){

     var $preVal = this.value;
     var $thisButton = this;
     $thisButton.value = "Added";
     $(".cart-button").animate({
        height: 'toggle'
    },"slow");
    $(".cart-button").animate({
        height: 'toggle'
    },"slow");
    
   
     setTimeout(function(){
         $thisButton.value = $preVal;
     }, 1500);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
function getCartAmmount()
{
            $cartProducts = JSON.parse(localStorage.getItem("cart"));
           
            if($cartProducts == null)
            {
               return 0;
            }
            
            return $cartProducts.length;
}