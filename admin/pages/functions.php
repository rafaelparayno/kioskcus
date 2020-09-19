<?php
require('../database/DBController.php');

require('../database/User.php');



$db = new DBController();
$users = new User($db);
