<?php

class Airline extends Connection
{
    /**
     * Gets the airlines list from the API
     */
    public function getAirlines(){
        $resource = $this->url.'airlines';

        return $this->make_request('get', $resource);
    }
}