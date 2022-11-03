
var data={
            "gpslog":   [],
            "missions": [],
            "active":   
            {
                "mission":[],
                "targets":[]
            }
        };
        
  var flyToQueue=[];
  var isPlaying=false;

function responseMissionHandler () {
  var jsonData = JSON.parse(this.responseText);
  data.missions=jsonData;
  updateMissionsList();
};

function responseMissionDetailHandler () {
    var jsonData = JSON.parse(this.responseText);
    data.active.mission=jsonData;
  };

  function responseMissionTargetHandler () {
    var jsonData = JSON.parse(this.responseText);
    data.active.targets=jsonData;
    highlightMap(data.active.targets);
  };

function responseGpslogHandler () {
   var jsonData = JSON.parse(this.responseText);
   data.gpslog=jsonData;
};

function getMissionData()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissionHandler;
  xhttp.open('GET',baseUrl+'/api/mission', true);
  xhttp.send();
}

function getMissionDetailData(missionId)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissionDetailHandler;
  xhttp.open('GET',baseUrl+'/api/mission/'+missionId, true);
  xhttp.send();
}

function getMissionTargetData(missionId)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissionTargetHandler;
  xhttp.open('GET',baseUrl+'/api/missiontarget/mission/'+missionId, true);
  xhttp.send();
}

function getGpslogData()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseGpslogHandler;
  xhttp.open('GET',baseUrl+'/api/gpslog', true);
  xhttp.send();
}

function getData()
{
  getMissionData();
  getGpslogData();
}

function highlightMap(args)
{
  var lat=0;
  var lon=0;
  var c=args.length;
  flyToQueue=[];
  for (var i=0;i<c;i++)
  {
   lat=parseFloat(args[i].latitude);
   lon=parseFloat(args[i].longitude);
   flyToQueue.push(ol.proj.fromLonLat([lon, lat]));
   
  }
  
   playFlyToQueue();
 
}
  
 function playFlyToQueue()
 {
   
   if (flyToQueue.length>0)
   {
      if (flyToQueue.length>1)
      {
        flyTo(flyToQueue.pop(),function() { playFlyToQueue(); });
      }
      else
      {
        flyTo(flyToQueue.pop(),function() { });
        flyToQueue=[];
      }
   }
 }




function flyTo(location, done) {
  const duration = 4000;
  var view=map.getView();
  const zoom = 8; //view.getZoom();
  let parts = 2;
  let called = false;
  function callback(complete) {
    --parts;
    if (called) {
      return;
    }
    if (parts === 0 || !complete) {
      called = true;
      done(complete);
    }
  }
  view.animate(
    {
      center: location,
      duration: duration,
      zoom:zoom
    },
    callback
  );
  view.animate(
    {
      center: location,
      duration: duration,
      zoom:14
    },
    callback
  );
  view.animate(
    {
      center: location,
      duration: duration,
      zoom:10
    },
    callback
  );
 
}


function highlightMission(missionId)
{
 
    if (data.active.targets.length<1 || missionId!=data.active.mission.id)
    {
      getMissionDetailData(missionId);
      getMissionTargetData(missionId);
    }
    
}


function updateMissionsList()
{
    var el=document.getElementById("missionsList");
    var colors=['0000ff','00ff00','ccccff','ff88cc','cc00ff','ff0000','ffffff','ffff00'];
    var html="";
    if (el)
    {
        for (var i=0;i<data.missions.length;i++)
        {
            html=html+'<div id="missionsListItem'+data.missions[i].id+'" class="list-group-item list-group-item-action flex-column align-items-start" >';
            html=html+' <div class="d-flex w-100 justify-content-between" style="background-color:white;">';
            html=html+'   <h5 class="mb-1"><a href="/app/mission/'+data.missions[i].id+'">'+data.missions[i].name+'</a></h5>';
            var cindex=(data.missions[i].id)%8;
            html=html+'<div class="badge" style="border:solid 1px silver; border-radius:1em; background-color:#'+colors[cindex]+'" onclick="highlightMission('+data.missions[i].id+')">play</div>';
             html=html+' </div>';
            html=html+' <p class="mb-1"  style="background-color:white;">'+data.missions[i].description+'</p>';
            html=html+' <small >'+data.missions[i].start+'</small>';
            html=html+'</div>';
        }
        el.innerHTML=html;
        console.log("missionslist updated");
    }
}


getData();



