<?php include '../includes/head.html'; ?>
<body>

    <?php include '../includes/menu.html'; ?>

    <div class ="row borderbottom">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8 formBorder">
            <div class="row">
                <div class="col-sm-2">    
                    <img src="../assets/img/cart.png" class="img-thumbnail" alt="Basket icon" width="64" height="64">
                </div>
                <div class="col-sm-8">
                    <h2 class="dark-green-color">Shopping Basket</h2>
                </div>
                <div class="col-sm-2">    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <h3 class="dark-green-color">Your Order:</h3>
                    <p class="dark-green-color">Subtotal: &euro;<span id="subtotal">0.00</span></p>
                    <p class="dark-green-color">Delivery: &euro;<span id="delivery">0.00</span></p>
                    <h4 class="dark-green-color">Total: &euro;<span id="total-amount">0.00</span></h4>
                    <label class="dark-green-color" for="shippingselect">Shipping method:</label>

                    <div class="form-group">
                        <select class="form-control" id="shippingselect">
                        </select>
                    </div>

                    <input type="button" class="btn btn-primary buttongrn" id="checkout-btn" value="Checkout">

                    <div class="row">
                        <div class="col-sm-12 padding-left-0">
                            <a href="/">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8" id="viewarea">
                </div>
                <div class="col-sm-2">
                </div>
            </div>

        </div>

        <div class="col-sm-2">
        </div>
    </div>
    <script src="../assets/js/cart.js"></script>
    <?php include '../includes/footer.html'; ?>
</body>
</html>
