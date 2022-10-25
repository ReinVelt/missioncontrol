<?php

namespace App\Controllers;
use App\Models\MissionModel;
use App\Models\MissionTargetModel;

class App extends BaseController
{
    public function index()
    {
        return view('components/page/page');
    }

    public function mission($missionId)
    {
        return view('components/page/mission',array("missionId"=>$missionId));
    }

    public function missionForm($missionId=null)
    {
        $missionModel=new MissionModel();
        $row = $missionModel->where('id', $missionId)->first();
        if ($missionId>0) 
        { 
            //update form
            $url="/api/mission/".$missionId;
            $method="update";
        }
        else
        {
            //insert form
            $url="/api/mission";
            $method="post";
            $row=array("id"=>"NULL","name"=>"","description"=>"","start"=>"","end"=>"","finished"=>"");
        }
        return view("components/forms/missionForm",array("id"=> $row["id"], "method"=>$method,"url"=>$url,"data"=>$row));
    }

    public function missiontargetForm($missionId=null, $missiontargetId=null)
    {
        $missiontargetModel=new MissionTargetModel();
        $row = $missiontargetModel->where('id', $missiontargetId)->first();
        if ($missiontargetId>0) 
        { 
            //update form
            $url="/api/missiontarget/".$missiontargetId;
            $method="update";
        }
        else
        {
            //insert form
            $url="/api/missiontarget";
            $method="post";
            $row=array("id"=>"NULL", "missionId"=>$missionId, "name"=>"","description"=>"","latitude"=>"0","longitude"=>"0","datum"=>"","finished"=>"0");
        }
        return view("components/forms/missionTargetForm",array("id"=> $row["id"],"missionId"=>$row["missionId"], "method"=>$method,"url"=>$url,"data"=>$row));
    }
}
