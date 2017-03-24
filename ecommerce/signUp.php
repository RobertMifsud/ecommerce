<?php include 'meta.php';
?>
<body>

    <?php include 'menu.php';
    ?>

    <div class ="row borderbottom">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8 formBorder">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-4 subformBorder">
                    <h2>Sign In</h1>
                        <form id="signin-form">
                            <div class="form-group">
                                <label for="userName">User Name</label>
                                <input type="text" class="form-control" id="userName" name="username"  placeholder="Enter User Name" required>        
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter Password" required>
                            </div>
                            <input type="submit" class="btn btn-primary" id="submit-btn" value="Login" >
                        </form>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4 subformBorder">
                    <h2>Register:</h1>
                        <form id="register-form">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" id="name" name="first_name"  placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="last_name"  placeholder="Enter Surname" required>
                            </div>
                            <div class="form-group">
                                <label for="userEmail">Email address</label>
                                <input type="email" class="form-control" id="userEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email"required="">
                            </div>
                            <div class="form-group">
                                <label for="address1">Address 1</label>
                                <input type="text" class="form-control" id="address1" name="address_1" aria-describedby="addressHelp" placeholder="Enter address Line 1"required="">
                            </div>
                            <div class="form-group">
                                <label for="address2">Address 2</label>
                                <input type="text" class="form-control" id="address2" name="address_2" aria-describedby="address2Help" placeholder="Enter address Line 2"required="">
                            </div>
                            <div class="form-group">
                                <label for="cityselect">Select City:</label>
                                <select class="form-control" id="cityselect" name="city">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="newuserName">New User Name</label>
                                <input type="text" class="form-control" id="newuserName" name="username"  placeholder="Enter User Name" required>        
                            </div>
                            <div class="form-group">
                                <label for="newpassword">New Password</label>
                                <input type="password" class="form-control" id="newuserPassword" name="password" placeholder="Enter Password" required>
                            </div>

                            <input type="submit" class="btn btn-primary"  value="Register" id="registerbutton">
                        </form>
                </div>
                <div class="col-sm-1">
                </div>
            </div>
        </div> 

        <div class="col-sm-2">
        </div>
    </div>
</body>
<?php include 'footer.php';
?>
<script src="js/signup.js"></script>
</html>
