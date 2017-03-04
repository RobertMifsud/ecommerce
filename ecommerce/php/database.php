<?php
require 'vendor\autoload.php';
$categories= $_POST["categories"];
if ($categories == "all") 
{
    getCategories();
}

function getCategories()
{
    $client = new MongoDB\Client("mongodb://localhost:27017");
    
    $collection = $client->ecommerce->categories;
    $result = $collection->find( );
    echo json_encode(iterator_to_array($result));
}

?>
