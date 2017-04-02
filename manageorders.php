<?php include 'meta.php';
?>

<body>
    <?php include 'menu.php';
    ?>

    <div class="row borderbottom">
        <div class="col-sm-2">
            <?php include 'cmsmenu.php';
            ?>
        </div>
        <div class="col-sm-8">
            <div class =row">
                <div class ="col-sm-8">
                    <div class="form-group">
                        <label for="categoryselect">Select Category:</label>
                        <select class="form-control" id="categoryselect">
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>

            <div class =row">
                <div class ="col-sm-8">
                    <div class="form-group">
                        <label for="categoryname">Category Name:</label>
                        <input name="categoryname" class="form-control" id="categoryname" type="text"/>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div> 
            <div class =row">
                <div class ="col-sm-8">
                    <div class="form-group">
                        <label for="categorydesc">Category description:</label>
                        <textarea class="form-control" name="categorydesc" id="categorydesc" rows="3"></textarea>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-8">
                    <label for="categorylist">Parent Category:</label>
                    <select multiple class="form-control" id="categorylist" name="categorylist">
                        <option>Flowers</option>
                        <option>Fruit</option>
                        <option>Cactus</option>
                    </select>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 buttonmargin">
                    <input type="submit" class="btn btn-primary" id="submit-btn" value="Save Category" >
                </div>
                <div class="col-sm-4">
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-2">
    </div>
</div>

<script src="js/cmscategories.js"></script>
<?php include 'footer.php';
?>
</body>

</html>