
var data={
            "gpslog":   [],
            "missions": [],
            "active":   
            {
                "mission":[],
                "targets":[]
            }
        };

function responseMissionHandler () {
  var jsonData = JSON.parse(this.responseText);
  data.missions=jsonData;
};

function responseMissiontargetHandler () {
  var jsonData = JSON.parse(this.responseText);
  data.active.targets=jsonData;
  updateMissiontargets(jsonData);
};

function responseMissionDetailHandler () {
    var jsonData = JSON.parse(this.responseText);
    data.active.mission=jsonData;
    updateMissionDetails(jsonData);
  };

function responseGpslogHandler () {
   var jsonData = JSON.parse(this.responseText);
   data.gpslog=jsonData;
};

function getMissionData()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissionHandler;
  xhttp.open('GET','http://localhost:8080/api/mission', true);
  xhttp.send();
}

function getMissionTargetData(missionId)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissiontargetHandler;
  xhttp.open('GET','http://localhost:8080/api/missiontarget/list/'+missionId, true);
  xhttp.send();
}

function getMissionDetailData(missionId)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissionDetailHandler;
  xhttp.open('GET','http://localhost:8080/api/mission/'+missionId, true);
  xhttp.send();
}

function getGpslogData()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseGpslogHandler;
  xhttp.open('GET','http://localhost:8080/api/gpslog', true);
  xhttp.send();
}




function updateMissionDetails(data)
{
    var el=document.getElementById("missionDetails");
    var html="";
    if (el)
    {
       
            html=html+'<div class="title">'+data.name+'</div><div class="description">'+data.description+'</div><div class="small">'+data.start+'</div>';
      
        el.innerHTML=html;
       //alert(html);
    }
   
}

function updateMissiontargets(data)
{
    var el=document.getElementById("missionTargets");
      var html="";
      if (el)
      {
          for (var i=0;i<data.length;i++)
          {
              html=html+'<div id="missionstargetListItem'+data[i].id+'" class="list-group-item list-group-item-action flex-column align-items-start">';
              html=html+' <div class="d-flex w-100 justify-content-between">';
              html=html+'   <h5 class="mb-1"><a href="/app/missiontarget/'+data[i].id+'">'+data[i].name+'</a></h5>';
              html=html+'   <small><a data-bs-toggle="modal" data-bs-target="#formModal" class="material-icons" onclick="getMissiontargetForm('+data[i].missionId+','+data[i].id+'); return false;">edit</a></small>';
              html=html+' </div>';
              html=html+' <p class="mb-1">'+data[i].description+'</p>';
              html=html+' <small>'+data[i].datum+'</small>';
              html=html+'</div>';
          }
          el.innerHTML=html;
          console.log("missionstargetslist updated");
    }
   
}



//getMissionTargetData(1);






