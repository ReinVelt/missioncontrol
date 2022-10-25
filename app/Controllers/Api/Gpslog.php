<?php 

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\GpslogModel;

class Gpslog extends ResourceController
{

    use ResponseTrait;

    // get all
    public function index(){
      $apiModel = new GpslogModel();
      $data = $apiModel->orderBy('id', 'DESC')->findAll();
      return $this->respond($data);
    }

    // create
    public function create() {
        $apiModel = new GpslogModel();
        $data = [
            'userId' => $this->request->getVar('userId'),
            'missionId' => $this->request->getVar('missionId'),
            'name'  => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'latitude'  => $this->request->getVar('latitude'),
            'longitude'  => $this->request->getVar('longitude'),
            'altitude'  => $this->request->getVar('altitude'),
            'speed'  => $this->request->getVar('speed'),
            'heading'  => $this->request->getVar('heading'),
            'datum'  => $this->request->getVar('datum'),
        ];
        $apiModel->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Gpslog created'
          ]
      ];
      return $this->respondCreated($response);
    }

    // single
    public function getGpslog($id = null){
        $apiModel = new GpslogModel();
        $data = $apiModel->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Gpslog does not exist.');
        }
    }

   

    // update
    public function update($id = null){
        $apiModel = new GpslogModel();
        $id = $this->request->getVar('id');
        $data = [
            'userId' => $this->request->getVar('userId'),
            'missionId' => $this->request->getVar('missionId'),
            'name'  => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'latitude'  => $this->request->getVar('latitude'),
            'longitude'  => $this->request->getVar('longitude'),
            'altitude'  => $this->request->getVar('altitude'),
            'speed'  => $this->request->getVar('speed'),
            'heading'  => $this->request->getVar('heading'),
            'datum'  => $this->request->getVar('datum'),
        ];
        $apiModel->update($id, $data);
        $response = [
          'status'   => 200,
          'error'    => null,
          'messages' => [
              'success' => 'Gpslog updated.'
          ]
      ];
      return $this->respond($response);
    }

    // delete
    public function delete($id = null){
        $apiModel = new GpslogModel();
        $data = $apiModel->where('id', $id)->delete($id);
        if($data){
            $apiModel->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Gpslog deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Gpslog does not exist.');
        }
    }

    public function show($id=null)
    {
        return $this->getGpslog($id);
    }

    public function kml($userId)
    {
        $apiModel = new GpslogModel();
        $data = $apiModel->where('userId', $userId)->findAll();
        $markup=view('components/maps/kml/gpstrack',array("data"=>$data));
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => $markup
            ]
        ];
        
        return $this->respond($markup);
    }

   
}