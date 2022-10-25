<?php 

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MissionModel;

class Mission extends ResourceController
{

    use ResponseTrait;

    // get all
    public function index(){
      $apiModel = new MissionModel();
      $data = $apiModel->orderBy('id', 'DESC')->findAll();
      return $this->respond($data);
    }

    // create
    public function create() {
        $apiModel = new MissionModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'data'  => "",
            'start'  => $this->request->getVar('start'),
            'end'  => $this->request->getVar('end'),
            'finished'  => $this->request->getVar('finished'),
        ];
        $apiModel->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Mission created'
          ]
      ];
      return $this->respondCreated($response);
    }

    // single
    public function getMission($id = null){
        $apiModel = new MissionModel();
        $data = $apiModel->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Mission does not exist.');
        }
    }
    public function show($id=null)
    {
        return $this->getMission($id);
    }

    // update
    public function update($id = null){
        $apiModel = new MissionModel();
        //$id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'data'  => $this->request->getVar('data'),
            'start'  => $this->request->getVar('start'),
            'end'  => $this->request->getVar('end'),
            'finished'  => $this->request->getVar('finished'),
        ];
        log_message(1,"id=$id, data=".print_r($data,true ));
        $r=$apiModel->update($id, $data);
        $response = [
          'status'   => 200,
          'error'    => null,
          'messages' => [
              'success' => 'Mission updated.'.$r
          ]
      ];
      return $this->respond($response);
    }

    // delete
    public function delete($id = null){
        $apiModel = new MissionModel();
        $data = $apiModel->where('id', $id)->delete($id);
        if($data){
            $apiModel->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Mission deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Mission does not exist.');
        }
    }

   
}