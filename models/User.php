<?php 
include_once('Connection.php');

class User extends Connection
{

    /**
     * Check with a request to the API if the credentials are correct.
     * 
     * @param Array Credentials
     * @return StdObject||String
     */
    public function validate_login($data){
        $resource = $this->url.'session.json';
        
        return $this->make_request('post', $resource, $data);
    }
}
