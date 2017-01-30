<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product Managment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="jumbotron text-center">
            <h1>Add Product</h1>
            <p>Add a product by uploading a file or using device camera</p> 
        </div>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8">
                <div class="col-sm-4">
                    <video id="liveStream" width="100%" alt="liveo video frame" autoplay></video>
                </div>
                <div class="col-sm-4">
                    <input type="image" id="snap" width="40%" src="img/cameraicon.png" alt="snapshot button" >       
                </div>
                <div class="col-sm-4">
                    <canvas id="snapShot" alt="player saved picture" ></canvas>
                </div>
            </div>	
        </div>
        <div class id="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script src="js/jquery.form.min.js"></script>
                <form action="php/imageUpload.php" method="post" enctype="multipart/form-data" id="imageUploadForm">
                    <input name="fileToUpload[]" id="fileToUpload" type="file" multiple /> 
                    Product name:<input name="productName" id="productName" type="text"/><br>
                    Product description:<input name="productDesc" id="productDesc" type="text"/><br>
                    Product category:
                    <select name = "productCategory" id="productCategory">
                    </select></br>
                    Price:<input type="productPrice" id="productPrice" value="0.0"></br>
                    <input type="submit"  id="submit-btn" value="Upload" />
                </form>
                <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
                <div id="output"></div>
            </div>
        </div>

        
        <script src="js/addProduct.js"></script>
    </body>
</html>