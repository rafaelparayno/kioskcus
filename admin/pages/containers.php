<?php
include('header.php');
include('navigation.php');

$containerList = $containers->getData();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['saveContainer'])) {
        $containernumber = $_POST['ConNumber'];
        $consignee = $_POST['Consignee'];
        $broker = $_POST['Broker'];
        $status = $_POST['Status'];
        $containers->addContainers(
            $containernumber,
            $consignee,
            $broker,
            $status
        );
        echo "<script>window.location='/kiosk/admin/pages/containers.php';</script>";
    }

    if (isset($_POST['conDelete'])) {
        $id = $_POST['conIdDelete'];

        $containers->deleteCon($id);
        echo "<script>window.location='/kiosk/admin/pages/containers.php';</script>";
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
            <div class="card-header"><i class="fas fa-table mr-1"></i>Containers
            </div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <button data-toggle="modal" data-target="#addUserAdmin" class="btn btn-lg btn-success">Add Container</button>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Container Number</th>
                                <th>Consignee</th>
                                <th>Broker</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Container Number</th>
                                <th>Consignee</th>
                                <th>Broker</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($container) { ?>
                                <tr>

                                    <td><?= $container['container_number'] ?></td>
                                    <td><?= $container['consignee'] ?></td>
                                    <td><?= $container['broker'] ?></td>
                                    <td><?= $container['status'] ?></td>

                                    <td>
                                        <!-- <button data-toggle="modal" data-target="#resetPassword" data-userid="<?php echo $container['container_id']; ?>" href="" class="btn btn-md btn-info">
                                            Update Container
                                        </button> -->
                                        <button data-toggle="modal" data-target="#deleteCon" data-delid="<?php echo $container['container_id']; ?>" href="" class="btn btn-md btn-danger">
                                            Remove Container
                                        </button>

                                    </td>
                                </tr>
                            <?php }, $containerList) ?>
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
                    <h5 class="modal-title">Adding Container</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="ConNumber">Container Number</label>
                            <input type="text" required class="form-control" name="ConNumber" id="ConNumber" />


                        </div>
                        <div class="form-group">
                            <label for="Consignee">Consignee</label>
                            <input type="text" required class="form-control" name="Consignee" id="Consignee" />


                        </div>
                        <div class="form-group">
                            <label for="Broker">Broker</label>
                            <input type="text" required class="form-control" name="Broker" id="Broker" />


                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <input type="text" required class="form-control" name="Status" id="Status" />


                        </div>


                </div>
                <div class="modal-footer">

                    <button type="Submit" name="saveContainer" class="btn btn-primary">Save</button>
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


    <div id="deleteCon" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Remove Container</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Remove selected Container ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="conIdDelete" value="">
                        <button type="Submit" name="conDelete" class="btn btn-primary">Delete</button>
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