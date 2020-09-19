<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="./../css/framework.css" rel="stylesheet" />
    <link href="./../css/form.css" rel="stylesheet" />


    <?php

    include('./functions.php');

    ?>
</head>

<body>