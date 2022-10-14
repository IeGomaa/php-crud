<?php

session_start();
$connection = mysqli_connect('localhost','root','','crud');
$query = mysqli_query($connection,"SELECT * FROM `users`");

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
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
                <h3 class="card-title">Users Table</h3>

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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <?php if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])): ?>
                                <th>Update</th>
                                <th>Delete</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($data as $val) : ?>

                            <tr>
                                <td><?= $val['id']; ?></td>
                                <td><?= $val['name']; ?></td>
                                <td><?= $val['email']; ?></td>

                                <?php if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])): ?>

                                    <td>
                                        <form action="update.php" method="post">
                                            <input type="hidden" name="id" value="<?= $val['id']; ?>">
                                            <button style="width: 100px" type="submit" class="btn btn-block btn-primary">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="id" value="<?= $val['id']; ?>">
                                            <button style="width: 100px" type="submit" class="btn btn-block btn-danger">Delete</button>
                                        </form>
                                    </td>

                                <?php endif; ?>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>



            </div>
            <!-- /.card-body -->
            <div class="card-footer">

                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="insert.php">
                        <button style="width: 100px;" type="submit" class="btn btn-primary">Insert</button>
                    </a>

                    <a href="logout.php">
                        <button style="width: 100px" type="submit" class="btn btn-danger">Logout</button>
                    </a>

                <?php else : ?>

                    <a href="index.php">
                        <button>Login</button>
                    </a>

                <?php endif; ?>

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->

<?php require_once('footer.php'); ?>
