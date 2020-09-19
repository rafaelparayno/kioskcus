<?php
include('templates/header.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['loginSumb'])) {
        $users->login($_POST['username'], $_POST['password']);
    }
    $log = true;
}
?>

<main>
    <div class="container">

        <div class="m-5">
            <form method="post" class="border p-5">
                <div class="form-group">
                    <?php
                    if (isset($log)) {
                    ?>
                        <div class="text-center" style="color:red">Wrong Password or Username</div>
                    <?php } ?>
                    <!-- <div class="text-center" style="color:red">Wrong Password or Username</div> -->

                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="username">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="">
                    <button type="submit" name="loginSumb" class="btn-block p-2 mr-2 btn-primary">Login</button>

                </div>

            </form>
        </div>
    </div>
</main>

<?php
include('templates/footer.php');
?>