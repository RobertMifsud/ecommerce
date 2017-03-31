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
    <script src="js/orders.js"></script>

    <?php include 'footer.php';
    ?>
</body>

</html>
