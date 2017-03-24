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
                        <input type="submit" class="btn btn-primary" id="checkout-btn" value="Checkout">
                        <div class="row">
                            <div class="col-sm-8"> 
                                <a href="multipleProducts.php">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8" id="viewarea"> 
                        <div class='row product'>
                            <div class='col-sm-8'>
                                <div class='col-sm-4'>
                                    <img class='img-responsive' src='data/productImages/sample1.png'> 
                                </div>
                                <div class='col-sm-8'>
                                    <div class='row'>
                                        <h3>Product Name:</h3>
                                        <p>Price:</p>
                                        <div class='row'>
                                            <div class='col-sm-4'>   
                                                <label for='qty-box'>Qty.</label>
                                            </div>
                                            <div class='col-sm-8'>
                                                <input type='number' class='form-control' id='qty-box'  value='0'> 
                                            </div>
                                        </div>
                                        <input type='submit' class='btn btn-primary' id='removeproduct-btn' value='Remove' >
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <?php 
                       /* for ($count=0; $count<10; $count++)
                        {
                        echo "<div class='row product'>
                                <div class='col-sm-8'>
                                    <div class='col-sm-4'>
                                        <img class='img-responsive' src='data/productImages/sample1.png'> 
                                    </div>
                                    <div class='col-sm-8'>
                                        <div class='row'>
                                            <h3>Product Name:</h3>
                                            <p>Price:</p>
                                            <div class='row'>
                                                <div class='col-sm-4'>   
                                                    <label for='qty-box'>Qty.</label>
                                                </div>
                                                <div class='col-sm-8'>
                                                    <input type='number' class='form-control' id='qty-box'  value='0'> 
                                                </div>
                                            </div>
                                            <input type='submit' class='btn btn-primary' id='removeproduct-btn' value='Remove' >
                                        </div>
                                    </div>
                                </div> 
                            </div>";
                        }*/
                        ?>
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
