<?php

include_once('models/User.php');
include_once('models/Airline.php');

class UserController 
{
    protected $airline = null;
    protected $user = null;

    public function __construct()
    {
        $this->airline = new Airline;
        $this->user = new User;
    }


    /**
     * Gets the airlines list and renders the login form.
     *
     */
    public function showLoginForm(){
        $airlines = $this->airline->getAirlines();

        include_once('views/Users/Login.php');
    }
}