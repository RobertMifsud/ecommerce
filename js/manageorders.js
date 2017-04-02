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
/////////////////////////////////////////////////////////////////////////////////////////////
function addTableItem($tableItem)
{
   var itm = "<tr>"+
        "<td><a href='./orderdetails.php?order="+$tableItem._id.$oid+"'>"+$tableItem._id.$oid+"</a></td>"+
        "<td>"+$tableItem.date.date+"</td>"+
        "<td><input type='button' onclick=shipOrder('"+$tableItem._id.$oid+"')>Ship</input></td></tr></a>";
       
    $("#orderstable").append(itm);
}
///////////////////////////////////////////////////////////////////////////////////////////////
function shipOrder($orderid)
{
   $.post({
            cache: false,
            url: 'http://backend.dev/ship/',
            success: checkoutSucceeded(),
            data: {
                //    json: localStorage.getItem("cart")
                id:$orderid 
            },
            dataType: 'json',
        });
}