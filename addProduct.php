<?php include 'meta.php';
?>
<body>
    <?php include 'menu.php';
    ?>

    <div class="row borderbottom">
        <div class="col-sm-2">
            <?php include 'cmsmenu.php';
            ?>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <form action="http://backend.dev/products" method="post" enctype="multipart/form-data" id="imageUploadForm">
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
                            <label for="categoryselect">Select Category:</label>
                            <select class="form-control" name="category" id="categoryselect">
                                <option></option>
                            </select>
                        </div>    
                        <div class="form-group">
                            <label for="featuredcheckbox">Featured:</label>
                            <input type="checkbox" class=""  name="featured">
                        </div>
                        <div class="form-group">
                            <div class="row">   
                                <div class="form-group col-sm-4 nopaddingleft">
                                    <label for="productPrice">Product Price:</label>
                                    <input name="productPrice"   id="productPrice" value="0.0" type="number"step="0.01">
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
    <script src="js/categories.js"></script>
    <?php include 'footer.php';
    ?>
</body>

</html>