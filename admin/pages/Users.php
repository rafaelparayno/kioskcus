<?php
include('header.php');
include('navigation.php');
?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Users Table
            </div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <button data-toggle="modal" data-target="#addUserAdmin" class="btn btn-md btn-success">Add User</button>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>Account ID</th>
                                <th>User name</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                                <th>Account ID</th>
                                <th>User name</th>

                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <!-- <?php array_map(function ($user) { ?>
                                <tr>
                                    <td><?= $user['acc_id'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                   




                                    <td>
                                        <button data-toggle="modal" data-target="#resetPassword" data-userid="<?php echo $user['user_id']; ?>" href="" class="btn btn-block btn-info">
                                            Reset Password
                                        </button>
                                        <!-- <a class="btn btn-block btn-info" href="./evaluation.php?sno=<?= $user['sno'] ?>">Reset Password</a> -->
                            </td>
                            </tr>
                        <?php }, $usersList) ?> -->


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="addUserAdmin" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adding Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="adminuser">Admin Username</label>
                            <input type="text" name="adminuser" id="adminuser" />

                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>
                        <div class="form-group">
                            <label for="password">Generated Password</label>
                            <input type="text" name="passwordAdmin" id="generatedPassAdmin" />
                            <button type="button" class="btn btn-md btn-info mt-2" id="generatePass2">Generate Password</button>
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>


                </div>
                <div class="modal-footer">

                    <button type="Submit" name="saveUserAdmin" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>

</main>

<?php
include('footer.php');
?>