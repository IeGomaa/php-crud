<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $connection = mysqli_connect('localhost','root','','crud');
        $query = mysqli_query($connection,"SELECT * FROM `users` WHERE `id` = $id");

        $row = mysqli_fetch_assoc($query);
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $userid = filter_var($_POST['id'],FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
        $username = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $useremail = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL,FILTER_NULL_ON_FAILURE);
        $userpassword = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

        if (!is_null($userid) && !is_null($useremail) && !empty(trim($username))) {
            $connection = mysqli_connect('localhost','root','','crud');
            $query = mysqli_query($connection,"UPDATE `users` SET `name` = '$username', `email` = '$useremail', `password` = '$userpassword' WHERE  `id` = $userid");
            header('Location: table.php');
        } else {
            echo 'Name, Email And Password Is Required!!';
        }

    }

} else {
    header('Location: index.php');
}

?>

<?php require_once('header.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blank Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Insert</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">


                    <div class="card-body">



                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">User Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="card-body">

                                    <input type="hidden" name="id" value="<?= $row['id'] ; ?>">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" value="<?= $row['name']; ?>" type="text" class="form-control" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" value="<?= $row['email']; ?>" type="text" class="form-control" placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" value="<?= $row['password']; ?>" type="password" class="form-control" placeholder="Password">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                </div>
                            </form>
                        </div>




                    </div>



                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    Footer

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->

<?php require_once('footer.php'); ?>