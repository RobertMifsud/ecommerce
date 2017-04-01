<?php
namespace App\Controller;

use App\Repository\MongoDB;

class ProductController extends BaseController implements ControllerInterface
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->repository = new MongoDB("products");
    }

    public function create()
    {
        $productName = !empty($_POST['productName']) ? $_POST['productName'] : null;
        $productDescription = !empty($_POST['productDesc']) ? $_POST['productDesc'] : null;
        $productPrice = !empty($_POST['productPrice']) ? $_POST['productPrice'] : null;

        return json_encode($this->repository->create([
            "name" => $productName,
            "description" => $productDescription,
            "price" => (float) $productPrice,
            "image" => $this->uploadImagesToServer("fileToUpload")]));

    }

    /*
     * Author: Robert lol! :)
     */
    function uploadImagesToServer($fileContainer)
    {
        $fileCount = count($_FILES[$fileContainer]['name']);
        $uploadedFiles = [];

        for ($index = 0; $index < $fileCount; $index++) {

            if (isset($_FILES[$fileContainer]) && $_FILES[$fileContainer]["error"][$index] == UPLOAD_ERR_OK) {
                $uploadDirectory = __DIR__ . '/../../public/uploads/'; //specify upload directory ends with / (slash)

                //Is file size is less than allowed size.
                if ($_FILES[$fileContainer]["size"][$index] > 5242880) {
                    die("File size is too big!");
                }

                //allowed file type Server side check
                switch (strtolower($_FILES[$fileContainer]['type'][$index])) {
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

                if (move_uploaded_file($_FILES[$fileContainer]['tmp_name'][$index], $uploadDirectory . $NewFileName)) {
                    array_push($uploadedFiles, $NewFileName);
                } else {
                    die('error uploading File!');
                }
            } else {
                die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
            }
        }

        return $uploadedFiles;
    }

    /**
     * @return string
     */
    public function getFeaturedProducts()
    {
        return json_encode($this->repository->get(["featured" => "on"]));
    }

    /**
     * @return string
     */
    public function getLatestProducts()
    {
        return json_encode($this->repository->get());
    }

}