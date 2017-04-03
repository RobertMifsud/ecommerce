<?php
namespace App\Controller;

use App\Repository\MongoDB;
use MongoDB\BSON\ObjectID;

class ProductController extends BaseController implements ControllerInterface
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->repository = new MongoDB("products");
    }

    public function update($_id) {
        $productName = !empty($_POST['productName']) ? $_POST['productName'] : null;
        $productDescription = !empty($_POST['productDesc']) ? $_POST['productDesc'] : null;
        $productPrice = !empty($_POST['productPrice']) ? $_POST['productPrice'] : null;
        $productFeatured = !empty($_POST['featured']) ? $_POST['featured'] : "off";
        $productCategory = !empty($_POST['category']) ? new ObjectID($_POST['category']) : null;

        return json_encode($this->repository->update(["_id" => new ObjectID($_id)], ['$set' => [
            "name" => $productName,
            "description" => $productDescription,
            "price" => $productPrice,
            "featured" => $productFeatured,
            "category" => $productCategory
        ]]));
    }
    public function create()
    {
        $productName = !empty($_POST['productName']) ? $_POST['productName'] : null;
        $productDescription = !empty($_POST['productDesc']) ? $_POST['productDesc'] : null;
        $productPrice = !empty($_POST['productPrice']) ? $_POST['productPrice'] : null;
        $productFeatured = !empty($_POST['featured']) ? $_POST['featured'] : "off";
        $productCategory = !empty($_POST['category']) ? new ObjectID($_POST['category']) : null;

        return json_encode($this->repository->create([
            "name" => $productName,
            "description" => $productDescription,
            "featured" => $productFeatured,
            "category" => $productCategory,
            "price" => (float) $productPrice,
            "image" => $this->uploadImagesToServer("fileToUpload")
        ]));
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

    /**
     * @return string
     */
    public function getAtoZProducts()
    {
        return json_encode($this->repository->get(null, ["name" => 1]));
    }

    /**
     * @return string
     */
    public function getZtoAProducts()
    {
        return json_encode($this->repository->get(null, ["name" => -1]));
    }

    /**
     * @return string
     */
    public function getLowtoHighProducts()
    {
        return json_encode($this->repository->get(null, ["price" => 1]));
    }

    /**
     * @return string
     */
    public function getHightoLowProducts()
    {
        return json_encode($this->repository->get(null, ["price" => -1]));
    }
}