$(document).ready(function() {
    /**
     * Search on click
     */
    $('.search').click(function (e) {
        if ($(e.target).is('#search-button')) {
            if ($('.search').hasClass('active')) {
                $('.search-box').val('');
            }
            $(this).toggleClass('active');
            $('.search-box').focus();
        }
    });

    $("#items-cart")[0].innerHTML = getCartAmmount();

    checkLoggedUser();

    /**
     * Search Functionality
     */
    var timer, value;

    $('.search-box').bind('keyup', function () {
        clearTimeout(timer);
        var str = $(this).val();
        if (str.length > 2 && value != str) {
            timer = setTimeout(function () {
                value = str;
                //  console.log('Perform search for: ', value);
                $.get("http://backend.dev/search/" + value, function (data) {
                    console.log(data);
                    window.location.replace("/index.php?search=" + str);
                });
            }, 1000);
        }
    });

    function checkLoggedUser() {
        if (sessionStorage.getItem("loggeduser") != "" &&
            sessionStorage.getItem("loggeduser") !== undefined &&
            sessionStorage.getItem("loggeduser") !== null) {
            var $usr = JSON.parse(sessionStorage.getItem("loggeduser"));

            if ($usr.status == "success") {
                $("#my-account-menu").css({"display": "block"});
                $("#your-account-items").append("<li><a id='logoutoption'>Log out</a></li>");

                $('#logoutoption').click(function (e) {
                    sessionStorage.setItem("loggeduser", "");
                    $("#my-account-menu").css({"display": "none"});
                    $("#user-menu").empty();
                    $("#user-menu").append("<a href='/register' >Sign in</a> or <a href='/register'>register</a>");
                });

                $("#user-menu").empty();

                $("#user-menu").append("Welcome " + $usr.first_name);
            }
        } else {
            $("#my-account-menu").css({"display": "none"});
        }
    }

    function getCartAmmount() {
        $cartProducts = JSON.parse(localStorage.getItem("cart"));

        if ($cartProducts == null) {
            return 0;
        }

        return $cartProducts.length;
    }
});
  


