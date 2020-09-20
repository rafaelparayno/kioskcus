<?php
include('header.php');
include('navigation.php');

$usersList = $users->getData();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['saveUserAdmin'])) {
        $username = $_POST['adminuser'];
        $passwordStud = $_POST['passwordAdmin'];
        $users->addToUsers(
            $passwordStud,
            $username,
            1,
            $passwordStud
        );
        echo "<script>window.location='/kiosk/admin/pages/users.php';</script>";
    }

    if (isset($_POST['resetPassword'])) {
        $id = $_POST['useridModalReset'];
        $password = $users->resetPassword($id);
        // echo "<script>window.location='/mpc/system/pages/users.php';</script>";
    }
}
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


                                <th>User name</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>


                                <th>User name</th>

                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($user) { ?>
                                <tr>

                                    <td><?= $user['username'] ?></td>





                                    <td>
                                        <button data-toggle="modal" data-target="#resetPassword" data-userid="<?php echo $user['user_id']; ?>" href="" class="btn btn-md btn-info">
                                            Reset Password
                                        </button>
                                        <button data-toggle="modal" data-target="#deleteuser" data-deluserid="<?php echo $user['user_id']; ?>" href="" class="btn btn-md btn-danger">
                                            Delete User
                                        </button>
                                        <!-- <a class="btn btn-block btn-info" href="./evaluation.php?sno=<?= $user['sno'] ?>">Reset Password</a> -->
                                    </td>
                                </tr>
                            <?php }, $usersList) ?>


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
                            <label for="adminuser">Username</label>
                            <input type="text" class="form-control" name="adminuser" id="adminuser" />

                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>
                        <div class="form-group">
                            <label for="password">Generated Password</label>
                            <input type="text" class="form-control" name="passwordAdmin" id="generatedPassAdmin" />

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

    <div id="resetPassword" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Reset selected User Password ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="useridModalReset" value="">
                        <button type="Submit" name="resetPassword" class="btn btn-primary">Reset Password</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="deleteuser" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Delete selected User ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="userIdDelete" value="">
                        <button type="Submit" name="userDelete" class="btn btn-primary">Delete</button>
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