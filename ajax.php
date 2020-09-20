<?php

require('./admin/database/DbController.php');
require('./admin/database/Container.php');
require('./admin/database/Precaution.php');

$db = new DBController();

$container = new Container($db);
$cautions = new Precaution($db);


if (isset($_POST['searchCode'])) {
    // $userRole = $_POST['userole'];
    $results = $container->getData();
    // // $results = 
    echo json_encode($results);
}

if (isset($_POST['searchCode2'])) {
    // $userRole = $_POST['userole'];
    $results = $cautions->getData();
    // // $results = 
    echo json_encode($results);
}
