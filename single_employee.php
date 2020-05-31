<?php 

require 'conn.php';
session_start();


if( !$_SESSION['u_name'] ){
    header( 'Location: index.php' );
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weclome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- nav -->
    <?php require 'nav.php'; ?>
    <!-- nav -->

    <!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                        <li class="list-group-item"><a href="dash.php">View all Employees</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees List</div>
                    <table class="table table-bordered">
                        <?php 
                        
                        $id = $_GET['e_id'];
                        $sql = "SELECT * FROM employees WHERE e_id='$id'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($employee = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <th style="width:130px">Name</th>
                            <td><?php echo $employee['e_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $employee['e_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $employee['e_phone']; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="single_employee_edit.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete_employee.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>

                        <?php    }
                        } else {
                            echo "0 results";
                        }
                        
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- main content -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>