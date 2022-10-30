<?php 

namespace App\Models;
use CodeIgniter\Model;

class MediaModel extends Model
{
    protected $table = 'MEDIA';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'userId', 
      'missionId',
      'longitude',
      'latitude',
      'name',
      'description',
      'mimetype',
      'filesize',
      'uri',
      'datum'
    ];
}