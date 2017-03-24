<?php

require 'vendor\autoload.php';
if (array_key_exists("categories", $_POST))
{
    $categories = $_POST["categories"];
    if ($categories == "all")
    {
        getCategories();
    }
}
if (array_key_exists("products", $_POST))
{
    $products = $_POST["products"];
    if ($products == "all")
    {
        getProducts();
    }
}

function getCategories()
{
    $client = new MongoDB\Client("mongodb://localhost:27017");

    $collection = $client->ecommerce->categories;
    $result = $collection->find();
    echo json_encode(iterator_to_array($result));
}

function getProducts()
{
    $client = new MongoDB\Client("mongodb://localhost:27017");

    $collection = $client->ecommerce->products;
    $result = $collection->find();
    $products = iterator_to_array($result);

    echo json_encode($products);
}

?>
