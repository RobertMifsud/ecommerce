<?php include './includes/head.html';
?>
<body>

<?php include './includes/menu.html';
?>
<div class ="row borderbottom">
    <div class="col-sm-2">
        <?php include './includes/categories.html'; ?>
    </div>
    <div class ="col-sm-8">
        <div class="row">
            <div class="col-sm-8 text-left">
                <div class="dropdown margin-left-40" id="sorting-menu-dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="sorting-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Sorting
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="sorting-items" aria-labelledby="sorting-menu">
                        <li>
                            <a href="#" onClick="sortProducts('a-z');">A-Z Alphabetically</a>
                        </li>
                        <li>
                            <a href="#" onClick="sortProducts('z-a');">Z-A Alphabetically</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#" onClick="sortProducts('high-low');">Price High to Low</a>
                        </li>
                        <li>
                            <a href="#" onClick="sortProducts('low-high');">Price Low to High</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 text-right">
            </div>
        </div>
        <div id="viewarea" class="margin-top-40">

        </div>
    </div>
    <div class ="col-sm-2">
        <?php include './includes/featured.html'; ?>
    </div>
</div>
<script src="assets/js/multipleproducts.js"></script>
<script src="assets/js/basket.js"></script>

<?php include './includes/footer.html'; ?>
</body>

</html>