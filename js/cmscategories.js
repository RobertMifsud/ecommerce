var $categories;
$.get("http://backend.dev/categories",
        function (data) {
            $categories = JSON.parse(data);
            $('#categoryselect').empty();
            for ($x in $categories)
            {
                $('#categoryselect').append($('<option>', {value: $x, text: $categories[$x].name}));
                console.log($categories[$x].name);
            }
        });

////////////////////////////////////////////////////////////////////////////////////////////
$('#categoryselect').change(function () {
    var $selecteditem = $('#categoryselect').find('option:selected').val();
    $('#categoryname').val($categories[$selecteditem].name);
    $('#categorydesc').val($categories[$selecteditem].description);
    $('#categorylist').val($categories[$selecteditem].parent_id);
});
//////////////////////////////////////////////////////////////////////////////////////////////