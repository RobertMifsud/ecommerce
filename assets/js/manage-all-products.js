/**
 * Created by julian on 02/04/2017.
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $.get("http://backend.dev/products",
        function (data) {
            var products = JSON.parse(data);

            for(var ind=0;ind<products.length;ind++)
            {
                addTableItem(products[ind]);
            }
        });
});

function addTableItem($tableItem)
{
    var itm = "<tr data-product-id='"+ $tableItem._id.$oid +"'>"+
        "<td><a href='/products/index.php?product="+$tableItem._id.$oid+"'>"+$tableItem._id.$oid+"</a></td>"+
        "<td>"+$tableItem.name+"</td>"+
        "<td>&euro; "+$tableItem.price+"</td>" +
        "<td><a href='/admin/products/edit/index.php?product=" + $tableItem._id.$oid + "'>Edit</a></td>" +
        "</tr></a>";

    $("#productstable").append(itm);
}
