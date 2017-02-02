<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product View</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Product</h1>
        </div>

        <div class ="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 formBorder">
                <h2>Product Name</h2>
                <div class="row">
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
                    <div class="col-sm-6">
                        <h3>Price:</h3>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="qty">Qty:</label>
                                <input type="number" class="form-control" id="qty"  placeholder="0">  
                            </div>
                            <div class="col-sm-8">
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                <input type="submit" class="btn btn-primary" id="addCartButton" value="Add To Cart" >
                                <input type="submit" class="btn btn-primary" id="buyNowButton" value="Buy Now" >
                                </div>
                               </div>    
                        </div>
                    </div>

                </div>
                <div class ="row">
                    <ul class="nav nav-tabs">
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

            <div class="col-sm-2">
            </div>
        </div>

    </body>
</html>
