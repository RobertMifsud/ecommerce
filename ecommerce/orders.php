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
                <tbody>
                    <tr>
                        <td>123456</td>
                        <td>10/02/2017</td>
                        <td>pending</td>
                    </tr>
                    <tr>
                        <td>3535</td>
                        <td>08/02/2017</td>
                        <td>shipped</td>
                    </tr>
                    <tr>
                        <td>65563.21</td>
                        <td>07/02/2017</td>
                        <td>shipped</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-2"> 
        </div>
    </div>

    <?php include 'footer.php';
    ?>
</body>

</html>
