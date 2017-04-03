/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $.get("http://backend.dev/orders",
            function (data) {
                var user = JSON.parse(data);
                var orderItems = user[0].orders;
                for(var ind=0;ind<orderItems.length;ind++)
                {
                    addTableItem(orderItems[ind]);
                }
                console.log(JSON.parse(data));
            });
});

function addTableItem($tableItem)
{
    if ($tableItem.status == "pending") {
        var itm = "<tr data-order-id='"+ $tableItem._id.$oid +"'>"+
            "<td><a href='/orders/overview/index.php?order="+$tableItem._id.$oid+"'>"+$tableItem._id.$oid+"</a></td>"+
            "<td>"+$tableItem.date.date+"</td>"+
            "<td><input type='button' value='Confirm' onclick=shipOrder('"+$tableItem._id.$oid+"') /></td></tr></a>";
    } else {
        var itm = "<tr>"+
            "<td><a href='/orders/overview/index.php?order="+$tableItem._id.$oid+"'>"+$tableItem._id.$oid+"</a></td>"+
            "<td>"+$tableItem.date.date+"</td>"+
            "<td><input type='button' value='" + $tableItem.status + "' disabled='true' /></td></tr></a>";
    }

    $("#orderstable").append(itm);
}

function shipOrder($orderId)
{
   $.post({
            cache: false,
            url: 'http://backend.dev/ship-out/' + $orderId,
            success: function() {
                $("tr[data-order-id='"+$orderId+"'").find("input[type=button]").val("shipped");
            },
            dataType: 'json',
        });
}