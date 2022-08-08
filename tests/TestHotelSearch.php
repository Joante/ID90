<?php

require (__DIR__.'/../models/Hotel.php');

final class TestHotelSearch extends \PHPUnit\Framework\TestCase
{
    public function testCorrectSearch(){
        $hotel = new Hotel;

        $data['destination'] = 'Cancun';
        $data['guests[]'] = 2;
        $data['checkin'] = '2022-08-10';
        $data['checkout'] = '2022-08-15';
        $data['page'] = 1;
        
        $result = $hotel->search_hotel($data);

        $this->assertIsObject($result);
    }

    public function testBadCredentials(){
        $hotel = new Hotel;

        $data['destination'] = 'Cancun';
        $data['checkin'] = '2022-08-10';
        $data['checkout'] = '2022-08-15';
        $data['page'] = 1;
        
        $result = $hotel->search_hotel($data);

        $this->assertIsString($result);

        $this->assertEquals("Error en el servidor.", $result);
    }
}