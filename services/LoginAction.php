<?php

include_once(__DIR__.'/../models/User.php');

if(isset($_POST['airline']) && isset($_POST['username']) && isset($_POST['password'])){
    $user = new User;

    $data['airline'] = $_POST['airline'];
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['remember_me'] = isset($_POST['remember_me']) ? 1 : 0;
    $response = $user->validate_login(json_encode($data));

    if($response == "Error no autorizado"){
        header("Location: http://localhost?login_fail=true");
        exit();
    }

    session_start();
    session_regenerate_id();
    
    $_SESSION['id'] = session_create_id();
    $_SESSION['username'] = $response->member->username;
    header("Location: http://localhost/");
    exit();
}