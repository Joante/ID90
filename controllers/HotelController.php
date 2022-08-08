<?php

class HotelController 
{
    /**
     * Renders the results of the hotel search
     * 
     * @param StdObject
     */
    public function renderHotelList($hotels){
        include_once(__DIR__.'/../views/Hotels/HotelList.php');
    }
}