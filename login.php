<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Task Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css" />
    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    
</head>
<body class="login-body">
    <section class="login_form_area">
        <form action="app/login.php" method="POST" class="shadow p-4">
            <h3 class="display-4">LOGIN</h3>
            <?php if(isset($_GET['error'])):?>
                <div class="alert alert-danger" role="alert">
                    <?php echo stripcslashes($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <?php if(isset($_GET['success'])):?>
                <div class="alert alert-success" role="alert">
                    <?php echo stripcslashes($_GET['success']); ?>
                </div>
            <?php endif; 
                /* $pass = 123;
                $pass =password_hash($pass, PASSWORD_DEFAULT);
                echo $pass; */
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" class="form-control" name="user_name" />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </section>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

