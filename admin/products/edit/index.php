<?php include '../../../includes/head.html'; ?>
<body>
    <?php include '../../../includes/menu.html'; ?>
    <script>
        is_admin = JSON.parse(sessionStorage.getItem("loggeduser")).is_admin;
        if (!is_admin) {
            window.location = '/';
        }
    </script>
    <div class="row borderbottom">
        <div class="col-sm-2">
        <?php include '../../../includes/cmsmenu.html';?>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <form action="http://backend.dev/products" method="put" enctype="multipart/form-data" id="productEditForm">
                        <div class="form-group">
                            <label for="productName">Product Name:</label>
                            <input name="productName" class="form-control" id="productName" type="text"/>
                        </div>

                        <div class="form-group">
                            <label for="productDesc">Product description:</label>
                            <textarea class="form-control" name="productDesc" id="productDesc" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoryselect">Select Category:</label>
                            <select class="form-control" name="category" id="categoryselect">
                                <option></option>
                            </select>
                        </div>    
                        <div class="form-group">
                            <label for="featuredcheckbox">Featured:</label>
                            <input type="checkbox" class=""  name="featured">
                        </div>
                        <div class="form-group">
                            <div class="row">   
                                <div class="form-group col-sm-4 nopaddingleft">
                                    <label for="productPrice">Product Price:</label>
                                    <input name="productPrice"   id="productPrice" value="0.0" type="number"step="0.01">
                                </div>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 nopaddingleft">
                                    <input type="submit" class="btn btn-primary" id="submit-btn" value="Save" >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2">
                </div>

            </div>
        </div>
        <div class="col-sm-2">
        </div>
    </div>

    <script src="../../../assets/js/edit-product.js"></script>
    <script src="../../../assets/js/categories.js"></script>
    <script>
        $(document).ready(function() {
            $(".cms-menu-items").children('li').removeClass("active");
            $("#manage-products").addClass("active");
        });
    </script>
    <?php include '../../../includes/footer.html'; ?>
</body>

</html>