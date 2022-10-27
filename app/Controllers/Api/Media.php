<?php 

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MediaModel;


class Media extends ResourceController
{

    use ResponseTrait;

    // get all
    public function index(){
      $apiModel = new MediaModel();
      $data = $apiModel->orderBy('id', 'DESC')->findAll();
      return $this->respond($data);
    }

    // create
    public function create() {
        $apiModel = new MediaModel();
        $data = [
            'userId'=>$this->request->getVar("userId"),
            'missionId'=>$this->request->getVar("missionId"),
            'longitude'=>$this->request->getVar("longitude"),
            'latitude'=>$this->request->getVar("latitude"),
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'mimetype'  => $this->request->getVar('mimetype'),
            'filesize'  => $this->request->getVar('filesize'),
            'url'  => $this->request->getVar('url'),
            'datum'  => $this->request->getVar('datum')
        ];
        $apiModel->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Media created'
          ]
      ];
      return $this->respondCreated($response);
    }

    // single
    public function getMedia($id = null){
        $apiModel = new MediaModel();
        $data = $apiModel->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Media does not exist.');
        }
    }
    public function show($id=null)
    {
        return $this->getMedia($id);
    }

    // update
    public function update($id = null){
        $apiModel = new MediaModel();
        //$id = $this->request->getVar('id');
        $data = [
            'userId'=>$this->request->getVar("userId"),
            'missionId'=>$this->request->getVar("missionId"),
            'longitude'=>$this->request->getVar("longitude"),
            'latitude'=>$this->request->getVar("latitude"),
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'mimetype'  => $this->request->getVar('mimetype'),
            'filesize'  => $this->request->getVar('filesize'),
            'url'  => $this->request->getVar('url'),
            'datum'  => $this->request->getVar('datum')
        ];
         $r=$apiModel->update($id, $data);
        $response = [
          'status'   => 200,
          'error'    => null,
          'messages' => [
              'success' => 'Media updated.'.$r
          ]
      ];
      return $this->respond($response);
    }

    // delete
    public function delete($id = null){
        $apiModel = new MediaModel();
        $data = $apiModel->where('id', $id)->delete($id);
        if($data){
            $apiModel->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Media deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Media does not exist.');
        }
    }

    public function kml()
    {
       //missions overview map
        $targetModel = new MediaModel();
        $targets = $targetModel->orderBy('id','asc')->findAll();
        $missionModel = new MissionModel();
        $missions = $missionModel->orderBy('id','asc')->findAll();
        $markup=view('components/maps/kml/missions',array("targets"=>$targets,"missions"=>$missions));
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