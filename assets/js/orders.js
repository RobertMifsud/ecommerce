/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $.get("http://backend.dev/users/" + JSON.parse(sessionStorage.getItem("loggeduser")).id,
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
   var itm = "<tr>"+
        "<td><a href='/orders/overview/index.php?order="+$tableItem._id.$oid+"'>"+$tableItem._id.$oid+"</a></td>"+
        "<td>"+$tableItem.date.date+"</td>"+
        "<td>"+$tableItem.status+"</td></tr></a>";
        $("#orderstable").append(itm);
}
