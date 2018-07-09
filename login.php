<?php
    error_reporting(E_ALL);
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script>
        function myFunction() {
            var x = document.getElementById("user-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
                    }
        }
    </script>
</head>
<body id="app">
    <div class="login">
            <div class="login-form">
            <h2> Login </h2>
            <form class="form-signin"  action="login.php" autocomplete="off" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" id="user-email" name="admin_name" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="user-password" name="admin_pass" placeholder="Password">
                    <input type="checkbox" onclick="myFunction()"><font>Show</font>
                </div>                
                <button type="submit" class="btn btn-lg btn-default btn-block" name='login'>Login</button>
            </form>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
<?php
    include("database.php");
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(isset($post['login']))
    {
        $admin_name=mysql_real_escape_string($post['admin_name']);
        $admin_pass=mysql_real_escape_string($post['admin_pass']);
        $encrpt = md5($admin_pass);
        $query = "select * from admin_panel where admin_name='$admin_name' AND pass='$admin_pass'";
        $run=mysql_query($query);
        if(mysql_num_rows($run)>0)
        {   
            $_SESSION['admin_name']=$admin_name; 
            echo "<script>window.open('index.php?logged=you are logged sucessfully','_self')</script>";
        }
        else
        {
            echo "<script>alert('user name and password is wrong')</script>";
        }
    }
?>