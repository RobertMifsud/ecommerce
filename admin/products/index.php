<?php include '../../includes/head.html'; ?>

<body>
    <?php include '../../includes/menu.html'; ?>
    <script>
        is_admin = JSON.parse(sessionStorage.getItem("loggeduser")).is_admin;
        if (!is_admin) {
            window.location = '/';
        }
    </script>
    <div class="row borderbottom">
        <div class="col-sm-2">
            <?php include '../../includes/cmsmenu.html'; ?>
        </div>
        <div class="col-sm-8">
            <input type='button' class='float-left btn btn-primary addtocartbutton buttonmargin buttongrn' onClick="window.location='/admin/products/create'" value='Create Product' >

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productstable">
                </tbody>
            </table>

        </div>
    </div>
    <div class="col-sm-2">
    </div>
</div>

<script src="../../assets/js/manage-all-products.js"></script>
<script>
    $(document).ready(function() {
        $(".cms-menu-items").children('li').removeClass("active");
        $("#manage-products").addClass("active");
    });
</script>
<?php include '../../includes/footer.html'; ?>
</body>

</html>