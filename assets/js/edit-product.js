/**
 * Created by julian on 02/04/2017.
 */
id = 0;
$(document).ready(function () {
    $.get("http://backend.dev/products/" + getUrlParameter("product"),
        function (data) {
            var product = JSON.parse(data);
            id = product[0]._id.$oid;
            addTableItem(product[0]);
        });

    $('#submit-btn').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: "http://backend.dev/products/" + id,
            method: "POST",
            success: function(re) {
                console.log(re);
            },
            data: $('#productEditForm').serialize(),
        })
    });
});

function addTableItem($tableItem)
{
    $('#productDesc').text($tableItem.description);
    $('#productName').val($tableItem.name);
    $('[name=featured]').prop("checked", $tableItem.featured);
    $('#productPrice').val($tableItem.price);

    $.get("http://backend.dev/categories",
        {
        },
        function (data) {
            $categories = JSON.parse(data);
            $('#categoryselect').empty();
            $('#categoryselect').append($('<option>', {text: "-New Category-"}));
            for ($x in $categories)
            {
                if ($categories[$x]._id.$oid == $tableItem.category.$oid) {
                    $('#categoryselect').append("<option selected value='"+ $categories[$x]._id.$oid +"'>" + $categories[$x].name + "</option>");
                } else {
                    $('#categoryselect').append("<option value='" + $categories[$x]._id.$oid +"'>" + $categories[$x].name + "</option>");
                }
            }
        });
    $('#categoryselect').val($tableItem.category);
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
}