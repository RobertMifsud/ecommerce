<?php

require 'vendor\autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->ecommerce->products;

$productName = isset($_POST['productName']) ? $_POST['productName'] : null;
$productDescription = isset($_POST['productDesc']) ? $_POST['productDesc'] : null;
$productPrice = isset($_POST['productPrice']) ? $_POST['productPrice'] : null;

$result = $collection->insertOne([
    "name" => $productName,
    "description" => $productDescription,
    "price" => (float)$productPrice,
    "image" => uploadImagesToServer("fileToUpload")]);

function uploadImagesToServer($fileContainer)
{
    $file_count = count($_FILES[$fileContainer]['name']);
    $uploadedFiles = array();
    for($index=0;$index<$file_count;$index++)
    {

        if (isset($_FILES[$fileContainer]) && $_FILES[$fileContainer]["error"][$index] == UPLOAD_ERR_OK)
        {
            //  $numFiles = count($_FILES["fileToUpload"]["tmp_name"]);
            // for ($index = 0; $index < $numFiles; $index++)
            ############ Edit settings ##############
            $UploadDirectory = '../data/productImages/'; //specify upload directory ends with / (slash)
            ##########################################

            /*
              Note : You will run into errors or blank page if "memory_limit" or "upload_max_filesize" is set to low in "php.ini".
              Open "php.ini" file, and search for "memory_limit" or "upload_max_filesize" limit
              and set them adequately, also check "post_max_size".
             */

            //check if this is an ajax request
            if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
            {
                die("NON AJAX request");
            }


            //Is file size is less than allowed size.
            if ($_FILES[$fileContainer]["size"] [$index] > 5242880)
            {
                die("File size is too big!");
            }

            //allowed file type Server side check
            switch (strtolower($_FILES[$fileContainer]['type'][$index]))
            {
                //allowed file types
                case 'image/png':
                case 'image/gif':
                case 'image/jpg':
                case 'image/jpeg':
                case 'image/bmp':
                    break;
                default:
                    die('Unsupported File!'); //output error
            }

            $File_Name = strtolower($_FILES[$fileContainer]['name'][$index]);
            $File_Ext = substr($File_Name, strrpos($File_Name, '.')); //get file extention
            $Random_Number = rand(0, 9999999999); //Random number to be added to name.
            $NewFileName = $Random_Number . $File_Ext; //new file name

            if (move_uploaded_file($_FILES[$fileContainer]['tmp_name'][$index], $UploadDirectory . $NewFileName))
            {
               array_push($uploadedFiles,$NewFileName);
            } else
            {
                die('error uploading File!');
            }
        } else
        {
            die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
        }
    
              
}
 return $uploadedFiles;
}