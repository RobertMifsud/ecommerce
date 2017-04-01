<?php include 'meta.php';
?>
<body>

    <?php include 'menu.php';
    ?>

    <div class ="row borderbottom">
        <div class="col-sm-2">
            <?php include 'categories.php';
            ?>
        </div>
        <div class="col-sm-8 formBorder">

            <div class="row">
                <div class="col-sm-12">
                    <div id="producttitle">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" id="productcarousel" role="listbox">

                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 subformBorder">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Price:</h3>
                            <div id="productprice">

                            </div>
                        </div>
                    </div>
                    <div class ="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="qty">Qty:</label>
                                <input type="number" class="form-control" id="qty"  value="1" min="1">  
                            </div>
                            <div class="col-sm-8">
                            </div>
                        </div>
                    </div>
                    <div class ="row>"        
                         <div class="col-sm-1">
                        </div>  
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-primary buttonmargin addtocartbutton buttongrn" id="addCartButton" value="Add To Cart" >
                        </div>
                        <div class="col-sm-4">
                        </div> 
                        <div class="col-sm-1">
                        </div> 
                    </div>
                </div>

                <div class ="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs descriptionpadding">
                            <li class="active"><a data-toggle="tab" href="#productdescription">Product Description</a></li>
                            <li><a data-toggle="tab" href="#additionalinfo">Additional Info</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="productdescription" class="tab-pane fade in active">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-8">
                                    <div id="tabdesc">
                                        
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                </div>
                            </div>
                            <div id="additionalinfo" class="tab-pane fade in ">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-8">
                                    <div id ="tabaddinfo">
                                        
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
            </div>
        </div>
    </div>
    <script src="js/product.js"></script>
    <script src="js/basket.js"></script>
    <?php include 'footer.php';
    ?>
</body>

</html>
