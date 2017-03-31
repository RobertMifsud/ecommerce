<?php include 'meta.php';
?>
<body>

    <?php include 'menu.php';
    ?>

    <div class ="row borderbottom">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8 formBorder">
            <div class="row">
                <div class="col-sm-2">    
                    <img src="img/cart.png" class="img-thumbnail" alt="Basket icon" width="64" height="64">
                </div>
                <div class="col-sm-8">
                    <h2>Shopping Basket</h2>
                </div>
                <div class="col-sm-2">    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">    
                    <h3>Your Order:</h3>
                    <p>Subtotal:</p>
                    <p>Delivery:</p>
                    <h4>Total:</h4>
                    <label for="shippingselect">Shipping method:</label>
                    <div class="form-group">
                        <select class="form-control" id="shippingselect">
                        </select>
                    </div>
                    <input type="button" class="btn btn-primary buttongrn" id="checkout-btn" value="Checkout">
                    <div class="row">
                        <div class="col-sm-8"> 
                            <a href="multipleProducts.php">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8" id="viewarea"> 
                    <div class='row product'>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-2">
        </div>
    </div>
    <script src="js/cart.js"></script>
    <?php include 'footer.php';
    ?>
</body>

</html>
