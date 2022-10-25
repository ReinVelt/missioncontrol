<?php 


namespace App\Models;
use CodeIgniter\Model;

class MissionTargetModel extends Model
{
    protected $table = 'MISSION_TARGETS';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'missionId', 
      'name',
      'description',
      'longitude',
      'latitude',
      'datum',
      'finished'
    ];
}