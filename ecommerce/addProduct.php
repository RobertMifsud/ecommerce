<?php include 'meta.php';
?>
<body>
    <?php include 'menu.php';
    ?>

    <div class="row borderbottom">
        <div class="col-sm-2">
            <?php include 'cmscategories.php';
    ?>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <div class="row">
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
                <div class="col-sm-2">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <form action="php/imageUpload.php" method="post" enctype="multipart/form-data" id="imageUploadForm">
                        <div class="form-group">
                            <label for="exampleInputFile">Product Images</label>
                            <input type="file" class="form-control-file" name="fileToUpload[]" id="fileToUpload" aria-describedby="fileHelp" multiple>
                            <small id="fileHelp" class="form-text text-muted">Supported image formats are png,jpg,gif and bmp</small>
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Name:</label>
                            <input name="productName" class="form-control" id="productName" type="text"/>
                        </div>

                        <div class="form-group">
                            <label for="productDesc">Product description:</label>
                            <textarea class="form-control" name="productDesc" id="productDesc" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Product Category:</label>
                            <select multiple class="form-control" id="productCategory" name="productCategory">
                                <option>Flowers</option>
                                <option>Fruit</option>
                                <option>Cactus</option>
                            </select>

                            <div class="row">   
                                <div class="form-group col-sm-4 nopaddingleft">
                                    <label for="productPrice">Product Price:</label>
                                    <input name="productPrice" class="form-control"  id="productPrice" value="0.0" type="number"step="0.01">
                                </div>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 nopaddingleft">
                                    <input type="submit" class="btn btn-primary" id="submit-btn" value="Upload" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class ="row">
                        <div class="col-sm-2">
                            <div id="progressbox" >
                                <div id="progressbar">

                                </div>
                                <div id="statustxt">
                                    0%
                                </div>

                            </div>
                            <div id="output">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                </div>

            </div>
        </div>
        <div class="col-sm-2">
        </div>
    </div>

    <script src="js/addProduct.js"></script>
    <?php include 'footer.php';
    ?>
</body>

</html>