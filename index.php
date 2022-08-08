<?php

include_once('controllers/UserController.php');

session_start();

if (isset($_SESSION['id'])) {
    header("Location: http://localhost/views/Hotels/SearchHotel.php");
    exit();    
}
$controller = new UserController;

$controller->showLoginForm();