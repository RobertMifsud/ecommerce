/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/** Dynamic form data collector & validation checker **/
// a function to retreive and check all inputs for validation - Dynamic by form id
$(document).ready(function () {
    getcities();
    $('#signin-form').on("submit", function (e) {
        e.preventDefault();
        if (validateForm('signin-form') == true)
        {
            var test = $('form#signin-form').serialize();
            $.post({
                cache: false,
                url: 'http://backend.dev/auth/sign-in',
                data: $('#signin-form').serialize(),
                dataType: 'json',
                success: function (data) {
                    sessionStorage.setItem("loggeduser", JSON.stringify(data));
                    if (data.status == "success")
                    {
                            window.location.replace("./multipleproducts.php?products");
                    }
                }

            });
        }
    });
////////////////////////////////////////////////////////////////////////////////////
    $('#register-form').on("submit", function (e) {
        e.preventDefault();

        if (validateForm('register-form') == true)
        {

            var test = $('form#register-form').serialize();
            $.post({
                cache: false,
                url: 'http://backend.dev/auth/sign-up',
                data: $('#register-form').serialize(),
                dataType: 'json',
                success: function (data) {
                    sessionStorage.setItem("loggeduser", JSON.stringify(data));
                    if (data.status == "success")
                    {
                            window.location.replace("./multipleproducts.php?products");
                    }
                }
            });
        }
    });
});
///////////////////////////
function validateForm($formID) {
    // get all inputs from formId
    let inputs = document.getElementById($formID).getElementsByTagName('input');
    // initialize data variable to populate the return response
    var validity = true;
    // loop over all inputs in the form
    for (let i = 0; i < inputs.length; ++i) {
        if (inputs[i].checkValidity() == false) {
            $(inputs[i]).css("border-color", "red");
            validity = false;
        } else
        {
            $(inputs[i]).css("border-color", "#ccc");
        }
    }
    return validity;

}
////////////////////////////////////////////////////////////////
function getcities()
{
    $.get("http://backend.dev/cities", function (data) {
        var $cities = JSON.parse(data);
        $('#cityselect').empty();
        for ($x in $cities)
        {
            $('#cityselect').append($('<option>', {value: $x, text: $cities[$x].name}));
            console.log($cities[$x].name);
        }

    });
}

