<?php 


namespace App\Models;
use CodeIgniter\Model;

class MissionTargetrouteModel extends Model
{
    protected $table = 'MISSION_TARGETS_ROUTES';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'missionId', 
      'missiontarget_originId',
      'missiontarget_destinationId',
      'longitude',
      'latitude',
      'sequence',
    ];
}
