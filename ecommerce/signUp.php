<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="jumbotron text-center">
            <h1>Sign Up</h1>
        </div>

        <div class ="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">
                <div class="formBorder">
                <h2>Sign In</h1>
                    <form>
                        <div class="form-group">
                            <label for="userName">User Name</label>
                            <input type="text" class="form-control" id="userName"  placeholder="Enter User Name">        
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="userPassword" placeholder="Enter Password">
                        </div>
                        <input type="submit" class="btn btn-primary" id="submit-btn" value="Login" >
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <h2>Register:</h1>
                    <form>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="name"  placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname"  placeholder="Enter Surname">
                        </div>
                        <div class="form-group">
                            <label for="userEmail">Email address</label>
                            <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                         <div class="form-group">
                            <label for="newuserName">New User Name</label>
                            <input type="text" class="form-control" id="newuserName"  placeholder="Enter User Name">        
                        </div>
                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="newpassword" class="form-control" id="newuserPassword" placeholder="Enter Password">
                        </div>
                        
                        <input type="submit" class="btn btn-primary" id="submit-btn" value="Register" >
                    </form>
            </div>
            <div class="col-sm-2">
            </div>
        </div>

    </body>
</html>
