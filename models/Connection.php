<?php

class Connection 
{
    /**
     * Base URL of the API
     * 
     * String
     */
    protected $url = 'https://beta.id90travel.com/';
    
    /**
     * The status of the last response.
     * 
     * Int
     */
    protected $statusResponse;
    

    /**
     * Makes the request to the API.
     * 
     * @param String The method of the request (get, post)
     * @param String The desire URL to make the request
     * @param Json The body of the POST request.
     * 
     * @return StdObject||String
     */
    public function make_request($method, $resource, $args = null){
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL, $resource);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        switch($method){
            case 'post':
                curl_setopt($ch1, CURLOPT_HTTPHEADER, ['Content-Type: application/json',]);
                curl_setopt($ch1, CURLOPT_POST, true);
                curl_setopt($ch1, CURLOPT_POSTFIELDS, $args);
                break;
        }
        $response = curl_exec($ch1);
        if (!curl_errno($ch1)) {
            $this->statusResponse = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
            switch ($this->statusResponse) {
                case 200: 
                $response = $this->check_response($response);
                break;
                case 404:
                $response = "Página no encontrada.";
                break;
                case 401:
                $response = "Error no autorizado.";
                break;
                case 400:
                $response = "Error en la llamada.";
                break;
                case 500:
                $response = "Error en el servidor.";
                break;
                default:
                echo 'Error inesperado, codigo: ', $this->statusResponse, "\n";
            }
        }

        return $response;
    }

    /**
     * Check the responses and decode it
     * 
     * @param Json The response.
     * 
     * @return StdObject||String
     */
    public function check_response($response){
        $response = json_decode($response);
        if($response == NULL ){
            $response = "Hubo un error.";
        }
        return $response;
    }
}