<?php


namespace App\Models;
use CodeIgniter\Model;

class GpslogModel extends Model
{

    function getGoogleLocationLog($startTimestamp,$endTimestamp)
    {
        /*

        $url="https://maps.google.com/locationhistory/b/0/apps/pvjson?t=0"; 
        $headers=array(
            'origin: https://maps.google.com',
            'accept-encoding: gzip,deflate,sdch',
            'x-manualheader: [SOME STRING]',
            'accept-language: en-GB,en;q=0.8,en-US;q=0.6,de;q=0.4,pt;q=0.2',
            'cookie: GDSESS=[COOKIE DATA]',
            'x-client-data: [ANOTHER STRING]',
            'user-agent: [UA STRING]',
            'content-type: application/x-www-form-urlencoded;charset=UTF-8',
            'accept: ',
            'cache-control: max-age=0',
            'referer: https://maps.google.com/locationhistory/b/0',
            'dnt: 1'
            );
        $data='[null,['.$startTimestamp.'],['.$endTimestamp.'],true]';
        --compressed
*/
    }
}




