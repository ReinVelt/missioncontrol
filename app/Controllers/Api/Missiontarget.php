<?php 

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\GpslogModel;
use App\Models\MediaModel;
use App\Models\MissionTargetModel;
use App\Models\OpenrouteserviceModel;

class Missiontarget extends ResourceController
{

    use ResponseTrait;

    // get all
    public function index(){
      $apiModel = new MissionTargetModel();
      $data = $apiModel->orderBy('datum', 'asc')->findAll();
      return $this->respond($data);
    }

    public function mission($missionId){
        $apiModel = new MissionTargetModel();
        $data = $apiModel->where('missionId', $missionId)->orderBy('datum', 'asc')->findAll();
        return $this->respond($data);
      }

    // create
    public function create() {
        $apiModel = new MissionTargetModel();
        $coordinate=array(0,0);
        if (strlen($this->request->getVar('coordinate'))>2)
        {
            $coordinate=explode(',',$this->request->getVar('coordinate'));
        }
        $data = [
            'missionId' => $this->request->getVar('missionId'),
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'latitude'  => $coordinate[0],
            'longitude'  => $coordinate[1],
            'datum'  => $this->request->getVar('datum'),
            'finished'  => $this->request->getVar('finished'),
        ];
        $apiModel->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Missiontarget created'
          ]
      ];
      return $this->respondCreated($response);
    }

    // single
    public function getMission($id = null){
        $apiModel = new MissionTargetModel();
        $data = $apiModel->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Missiontarget does not exist.');
        }
    }
    public function show($id=null)
    {
        return $this->getMission($id);
    }

    // update
    public function update($id = null){
        $apiModel = new MissionTargetModel();
        $coordinate=array(0,0);
        if (strlen($this->request->getVar('coordinate'))>2)
        {
            $coordinate=explode(',',$this->request->getVar('coordinate'));
        }
        $data = [
            'missionId' => $this->request->getVar('missionId'),
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'latitude'  => $coordinate[0],
            'longitude'  => $coordinate[1],
            'datum'  => $this->request->getVar('datum'),
            'finished'  => $this->request->getVar('finished'),
        ];
         $r=$apiModel->update($id, $data);
        $response = [
          'status'   => 200,
          'error'    => null,
          'messages' => [
              'success' => 'Missiontarget updated.'.$r
          ]
      ];
      return $this->respond($response);
    }

    // delete
    public function delete($id = null){
        $apiModel = new MissionTargetModel();
        $data = $apiModel->where('id', $id)->delete($id);
        if($data){
            $apiModel->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Missiontarget deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Mission does not exist.');
        }
    }

    public function kml($missionId)
    {
       
        $apiModel = new MissionTargetModel();
        $data = $apiModel->where('missionId', $missionId)->orderBy('datum','asc')->findAll();

        $apiModel=new GpslogModel();
        $gpslog = $apiModel->where('missionId', $missionId)->orderBy('datum','asc')->findAll();

        $apiModel=new MediaModel();
        $media = $apiModel->where('missionId', $missionId)->orderBy('datum','asc')->findAll();
        $markup=view('components/maps/kml/missiontargets',array("data"=>$data,"gpslog"=>$gpslog,"media"=>$media));
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => $markup
            ]
        ];
        
        return $this->respond($markup);
    }

    function getRoute($originId, $destinationId)
    {
        $apiModel = new MissionTargetModel();
        $origin= $apiModel->where('id', $originId)->first();
        $destination= $apiModel->where('id', $destinationId)->first();
        $originll=$origin["longitude"].",".$origin["latitude"];
        $destinationll=$destination["longitude"].",".$destination["latitude"];
        $routeModel=new OpenrouteserviceModel();
        $route=$routeModel->getRoute($originll,$destinationll);
        $response = json_decode($route)
        ];
        
        return $this->respond($response);
    }

   
}