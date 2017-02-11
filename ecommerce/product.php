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
                    <h2>Product Name</h2>
                </div>
                <div class="col-sm-6">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="data/productImages/sample1.png" >
                            </div>

                            <div class="item">
                                <img src="data/productImages/sample2.png" >
                            </div>

                            <div class="item">
                                <img src="data/productImages/sample3.png" >
                            </div>

                            <div class="item">
                                <img src="data/productImages/sample4.png" >
                            </div>
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
                        </div>
                    </div>
                    <div class ="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="qty">Qty:</label>
                                <input type="number" class="form-control" id="qty"  placeholder="0">  
                            </div>
                            <div class="col-sm-8">
                            </div>
                        </div>
                    </div>
                    <div class ="row>"        
                         <div class="col-sm-1">
                        </div>  
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-primary buttonmargin addtocartbutton" id="addCartButton" value="Add To Cart" >
                            <input type="submit" class="btn btn-primary buttonmargin" id="buyNowButton" value="Buy Now" >
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
                            <li class="active"><a href="#">Product Description</a></li>
                            <li><a href="#">Additional Info</a></li>
                        </ul>
                        <div class ="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-8">
                                <p>this is the descljhsvksvlkfdvlkdflnv</p>
                            </div>  
                            <div class="col-sm-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
            </div>
        </div>
    </div>
    <script src="js/basket.js"></script>
    <?php include 'footer.php';
    ?>
</body>

</html>
