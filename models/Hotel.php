<?php

include_once('Connection.php');

class Hotel extends Connection {

    /**
     * Search the hotels with the data requested by the user.
     * 
     * @param Array 
     * @return StdObject||String
     */
    public function search_hotel($data){
        $resource = $this->url.'api/v1/hotels.json';

        $resource = $this->generate_search_resource($resource, $data);
        
        return $this->make_request('get', $resource);
    }

    /**
     * Generate the URL with all the parameters requested.
     * 
     * @param String The base URL of the request.
     * @param Array The data requested.
     * 
     * @return String
     */
    private function generate_search_resource($resource, $data){
        $defaultData = ['currency' => 'USD','sort_criteria' => 'Overall', 'sort_order' => 'desc', 'per_page' => 25, 'rooms' => 1];

        $params = array();
        $data = array_merge($defaultData, $data);
        foreach($data as $param => $value) {
            $params[$param] = $value;
        }

        $data = http_build_query($params);
        $resource .= "?".$data;
        
        return $resource;
    }
}

