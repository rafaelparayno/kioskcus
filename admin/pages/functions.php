<?php
require('../database/DBController.php');

require('../database/User.php');

require('../database/Container.php');

require('../database/Precaution.php');



$db = new DBController();
$users = new User($db);
$containers = new Container($db);
$precautions = new Precaution($db);
