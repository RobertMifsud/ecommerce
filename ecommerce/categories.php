<?php
require 'vendor\autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->ecommerce->categories;

$result = $collection->find( );


echo'
<ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Categories</a></li>';
        foreach ($result as $entry) 
            {
        
                echo '<li><a href="#">'.$entry['name'].'</a></li>';
            }
echo '</ul>';

?>