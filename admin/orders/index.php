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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="orderstable">
                </tbody>
            </table>

        </div>
    </div>
    <div class="col-sm-2">
    </div>
</div>

<script src="../../assets/js/manage-orders.js"></script>
<script>
    $(document).ready(function() {
        $(".cms-menu-items").children('li').removeClass("active");
        $("#manage-orders").addClass("active");
    });
</script>
<?php include '../../includes/footer.html'; ?>
</body>

</html>