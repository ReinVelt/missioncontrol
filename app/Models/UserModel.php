<?php 

namespace App\Models;
use CodeIgniter\Model;
/**
 
**/


class MissionModel extends Model
{
    protected $table = 'USERS';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'nick', 
      'email',
      'hash'
    ];
}