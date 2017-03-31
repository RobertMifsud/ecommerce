<!-- Notification Bar -->
<div class="row">
    <div class="col-lg-12 dark-green-bg notification-bar">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10 notification-text"><span>Attention - This is a notification that can be used for something simple</span></div>
        </div>
    </div>
</div>

<!-- Menu -->
<div class="row menu">
    <div class="col-lg-2"></div>
    <div class="col-sm-12 col-lg-2 text-center vcenter"> 
        <img src="img/logo.png" alt="The Plant House">
    </div>
    <div class="col-sm-12 col-lg-4 text-center vcenter">
        <ul class="nav nav-pills"> 
            <li role="presentation" class="active">
                <a href="#">Home</a>
            </li> 
            <li role="presentation">
                <a href="#">New Arrivals</a>
            </li> 
            <li role="presentation">
                <a href="#">Today's Deals</a>
            </li> 
            <li role="presentation">
                <a href="#">Most Popular</a>
            </li> 
            <li role="presentation">
                <a href="#">Help</a>
            </li> 
        </ul>
        <div class="search">
            <input type="text" class="search-box">
            <span id="search-button" class="glyphicon glyphicon-search font-size-20 dark-green-color" aria-hidden="true"></span>
        </div>
    </div>
    <div class="col-sm-12 col-lg-2 vcenter">
        <a href="basket.php">
            <span class="glyphicon glyphicon-shopping-cart font-size-30 dark-green-color cart-button" aria-hidden="true">
            </span>
        </a>
        <span id="items-cart">0</span>
        <p id="user-menu">
        <div id="signinoption">
            <a href="signUP.php" >Sign in</a> or <a href="signUP.php">register</a>
        </div>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="my-account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Your Account
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="my-account">
                <li>
                    <a href="#">Account</a>
                </li>
                <li>
                    <a href="orders.php">Orders</a>
                </li> 
                <li role="separator" class="divider"></li>
                <li>
                    <a href="multipleProducts.php?view=recomended">Recommendations</a>
                </li> 
            </ul>
        </div>
        </p>
    </div>
    <div class="col-lg-2"></div>
</div>
<script src="js/menu.js"></script>