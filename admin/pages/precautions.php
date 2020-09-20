<?php
include('header.php');
include('navigation.php');

$precautionList = $precautions->getData();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['savePreMessage'])) {
        $message = $_POST['preMessage'];

        $precautions->addMessage(
            $message
        );
        echo "<script>window.location='/kiosk/admin/pages/precautions.php';</script>";
    }

    if (isset($_POST['preDelete'])) {
        $id = $_POST['preDelid'];
        // echo $id;
        $precautions->deleteMes($id);
        echo "<script>window.location='/kiosk/admin/pages/precautions.php';</script>";
    }
}

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Container</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Container</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Precautions
            </div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <button data-toggle="modal" data-target="#addPreMessage" class="btn btn-lg btn-success">Precautions</button>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Message</th>

                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($precaution) { ?>
                                <tr>

                                    <td><?= $precaution['precaution_msg'] ?></td>

                                    <td>
                                        <!-- <button data-toggle="modal" data-target="#resetPassword" data-userid="<?php echo $precaution['precautions_id']; ?>" href="" class="btn btn-md btn-info">
                                            Update Container
                                        </button> -->
                                        <button data-toggle="modal" data-target="#deleteMes" data-preid="<?php echo $precaution['precautions_id']; ?>" href="" class="btn btn-md btn-danger">
                                            Remove Message
                                        </button>

                                    </td>
                                </tr>
                            <?php }, $precautionList) ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="addPreMessage" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="preMessage">Message</label>
                            <input type="text" required class="form-control" name="preMessage" id="preMessage" />
                        </div>



                </div>
                <div class="modal-footer">

                    <button type="Submit" name="savePreMessage" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <div id="resetPassword" class="modal fade" tabindex="-1" role="dialog">
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
    </div> -->


    <div id="deleteMes" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Remove messages</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Remove selected messages ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="preDelid" value="">
                        <button type="Submit" name="preDelete" class="btn btn-primary">Delete</button>
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