<?php


namespace App\Models;
use CodeIgniter\Model;

class OpenrouteserviceModel extends Model
{

    private $apikey="5b3ce3597851110001cf6248d2d39beb923044e79843ad212f2ba56d";
   

    function getRoute($originLatlon,$destinationLatlon)
    {
        $profile="driving-car";
        $url="https://api.openrouteservice.org/v2/directions/'.$profile.'/geojson";
        $body='{"coordinates":[['.$originLatlon.'],['.$destinationLatlon.']]}';
        $headers[]='authorisation:'.$this->apikey;
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        $response = curl_exec($curl);
 
        curl_close($curl);
        return $response;
    }
}




