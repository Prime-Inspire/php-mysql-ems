<?php require 'conn.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- register -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
                <div class="panel panel-default" style="margin-top: 50px;">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control input-sm" name="u_email" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="u_name" required placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-sm" name="u_pass" required placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-sm" name="u_reg" value="Register">
                                <a href="index.php" class="btn btn-info btn-sm">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register -->

    <?php 
    
    if( isset( $_POST['u_reg'] ) ){
        $u_email = $_POST['u_email'];
        $u_name = $_POST['u_name'];
        $u_pass = md5($_POST['u_pass']);

        $sql = "INSERT INTO users (u_email, u_name, u_pass) VALUES ( '$u_email', '$u_name', '$u_pass' )";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registered Successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
    
    ?>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>