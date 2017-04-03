<?php include '../includes/head.html'; ?>
<body>

    <?php include '../includes/menu.html'; ?>

    <div class ="row borderbottom">
        <div class="col-sm-2">
            <?php include '../includes/categories.html'; ?>
        </div>
        <div class="col-sm-8 formBorder">

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
        <div class="col-sm-2"> 
        </div>
    </div>
    <script src="../assets/js/orders.js"></script>

    <?php include '../includes/footer.html'; ?>
</body>

</html>
