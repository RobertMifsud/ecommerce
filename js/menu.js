$(document).ready( function () {
$('.search').click(function(e) {
		if ($(e.target).is('#search-button')) {
			if ($('.search').hasClass('active')) {
				$('.search-box').val('');
			}
			$(this).toggleClass('active');
			$('.search-box').focus();
		}
	});
        checkLoggedUser();
        }
 );
///////////////////////////////////////////////////////////////////////////////// 
var timer, value;
    $('.search-box').bind('keyup', function() {
        clearTimeout(timer);
        var str = $(this).val();
        if (str.length > 2 && value != str) {
            timer = setTimeout(function() {
                value = str;
              //  console.log('Perform search for: ', value);
                $.get("http://backend.dev/search/"+value, function (data) {
                console.log(data);
                window.location.replace("./multipleproducts.php?search="+str);
            });
            }, 1000);
        }
    });
///////////////////////////////////////////////////////////////////////////////////
function checkLoggedUser()
{
  
    var $usr = JSON.parse(sessionStorage.getItem("loggeduser"));
    if($usr.status=="success")
    {
        $(".dropdown-menu").append("<li><a id='logoutoption'>Log out</a></li>");
        $('#logoutoption').click(function(e) {
            sessionStorage.setItem("loggeduser", "");
            $("#signinoption").empty();
            $("#signinoption").append("<a href='signUP.php' >Sign in</a> or <a href='signUP.php'>register</a>");
        });
        $("#signinoption").empty();
        $("#signinoption").append("<p>Welcome "+ $usr.first_name +"</p>");
    }
}
 
  


