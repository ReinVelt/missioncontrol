<?php 

namespace App\Models;
use CodeIgniter\Model;

class MissionModel extends Model
{
    protected $table = 'MISSION';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'name', 
      'description',
      'data',
      'start',
      'end',
      'finished'
    ];
}