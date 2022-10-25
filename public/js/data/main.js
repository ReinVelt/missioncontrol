
var data={
            "gpslog":   [],
            "missions": [],
            "active":   
            {
                "mission":[]
            }
        };

function responseMissionHandler () {
  var jsonData = JSON.parse(this.responseText);
  data.missions=jsonData;
  updateMissionsList();
};

function responseMissionDetailHandler () {
    var jsonData = JSON.parse(this.responseText);
    data.active.mission=jsonData;
    alert(data)
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

function getData()
{
  getMissionData();
  getGpslogData();
}


function updateMissionsList()
{
    var el=document.getElementById("missionsList");
    var html="";
    if (el)
    {
        for (var i=0;i<data.missions.length;i++)
        {
            html=html+'<div id="missionsListItem'+data.missions[i].id+'" class="list-group-item list-group-item-action flex-column align-items-start">';
            html=html+' <div class="d-flex w-100 justify-content-between">';
            html=html+'   <h5 class="mb-1"><a href="/app/mission/'+data.missions[i].id+'">'+data.missions[i].name+'</a></h5>';
            html=html+'   <small><a data-bs-toggle="modal" data-bs-target="#formModal" class="material-icons" onclick="getMissionForm('+data.missions[i].id+'); return false;">edit</a></small>';
            html=html+' </div>';
            html=html+' <p class="mb-1">'+data.missions[i].description+'</p>';
            html=html+' <small>'+data.missions[i].start+'</small>';
            html=html+'</div>';
        }
        el.innerHTML=html;
        console.log("missionslist updated");
    }
}


getData();



