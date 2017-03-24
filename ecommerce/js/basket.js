/*var i;
var x = document.getElementsByClassName("addtocartbutton");
for (i = 0; i < x.length; i++) {
    x[i].style.addEventListener("click", animatetocart);
}*/
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
     var $cartVal =parseInt( $("#items-cart")[0].innerHTML);
     $("#items-cart")[0].innerHTML= $cartVal +1;//$("#items-cart").value +1;
     setTimeout(function(){
         $thisButton.value = $preVal;
     }, 1500);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
