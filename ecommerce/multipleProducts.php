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
        <div class ="col-sm-8">
            <h1>Latest Products</h1>
            <div class ="row">
                <?php 
                       for ($count=0; $count<10; $count++)
                        {
               echo '  <div class ="col-sm-2">
                    <img class="img-responsive" src="data/productImages/sample1.png">
                    <p>Product name</p>
                    <p>Product price</p>
                    <input type="submit" class="btn btn-primary addtocartbutton buttonmargin" id="buynow-btn" value="Add to cart" >
                </div>';
                        }
               ?>
            </div>
        </div>

        <div class ="col-sm-2">
        </div>
    </div>
   <script src="js/basket.js"></script>
    <?php include 'footer.php';
?>
</body>

</html>