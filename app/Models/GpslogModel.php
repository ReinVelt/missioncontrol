<?php 

namespace App\Models;
use CodeIgniter\Model;

class GpslogModel extends Model
{
    protected $table = 'GPSLOG';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'missionId', 
      'userId',
      'name',
      'description',
      'latitude',
      'longitude',
      'altitude',
      'speed',
      'heading',
      'datum'
    ];
}