<?php

include_once(__DIR__.'/../models/Hotel.php');
include_once(__DIR__.'/../controllers/HotelController.php');

if(isset($_POST['destination']) && isset($_POST['guests']) && isset($_POST['dateStart'])&& isset($_POST['dateEnd'])){
    $hotel = new Hotel;

    $data['destination'] = $_POST['destination'];
    $data['guests[]'] = $_POST['guests'];
    $data['checkin'] = $_POST['dateStart'];
    $data['checkout'] = $_POST['dateEnd'];
    $data['page'] = isset($_POST['page']) ? $_POST['page'] : 1;
    $response = $hotel->search_hotel($data);

    if(is_string($response)){
        header("Location: http://localhost/views/Hotels/SearchHotel.php?error=true");
        exit();
    }

    $response->meta->destination = $_POST['destination'];
    $response->meta->guests = $_POST['guests'];

    $controller = new HotelController;

    $controller->renderHotelList($response);
}