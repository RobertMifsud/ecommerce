/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var $categories;
$.get("http://backend.dev/categories",
        function (data) {
            $categories = JSON.parse(data);
            for ($x in $categories)
            {
                $('#categoriessidebar').append("<li><a href='#'>"+$categories[$x].name+'</a></li>');
            }
        });

