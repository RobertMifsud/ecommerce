<?php include '../includes/head.html'; ?>

<body>
<?php include '../includes/menu.html'; ?>
<script>
    is_admin = JSON.parse(sessionStorage.getItem("loggeduser")).is_admin;
    if (!is_admin) {
        window.location = '/';
    }
</script>
<div class="row borderbottom">
    <div class="col-sm-2">
        <?php include '../includes/cmsmenu.html'; ?>
    </div>
    <div class="col-sm-8">
        <h3 class="dark-green-color">Welcome to the Admin Panel</h3>
    </div>
</div>
<div class="col-sm-2">
</div>
</div>

<script src="../assets/js/manage-orders.js"></script>
<?php include '../includes/footer.html'; ?>
</body>

</html>
