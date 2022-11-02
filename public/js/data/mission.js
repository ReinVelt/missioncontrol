
var data={
            "gpslog":   [],
            "missions": [],
            "active":   
            {
                "mission":[],
                "targets":[],
                "media":[]
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

  function responseMissionMediaHandler () {
    var jsonData = JSON.parse(this.responseText);
    data.active.media=jsonData;
    updateMissionMedia(jsonData);
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

function getMissionTargetData(missionId)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissiontargetHandler;
  xhttp.open('GET',baseUrl+'/api/missiontarget/mission/'+missionId, true);
  xhttp.send();
}

function getMissionDetailData(missionId)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissionDetailHandler;
  xhttp.open('GET',baseUrl+'/api/mission/'+missionId, true);
  xhttp.send();
}

function getMissionMedia(missionId)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseMissionMediaHandler;
  xhttp.open('GET',baseUrl+'/api/media/mission/'+missionId, true);
  xhttp.send();
}

function getGpslogData()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseGpslogHandler;
  xhttp.open('GET',baseUrl+'/api/gpslog', true);
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

function updateMissionMedia(data)
{
    var el=document.getElementById("missionMediaList");
    var html="";
    if (el)
    {
        for (var i=0;i<data.length;i++)
        {
         // var url=data[i].url.substring(10,100)
        
            html=html+'<img src="/app/imageresize/'+data[i].id+'" style="max-height:100px; max-width:100%;">';
          
        }
        el.innerHTML=html;
        console.log("missionsmedialist updated");
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
              html=html+'   <small><a data-bs-toggle="modal" data-bs-target="#formModalMissionTarget" class="material-icons" onclick="getMissiontargetForm('+data[i].missionId+','+data[i].id+'); return false;">edit</a></small>';
              html=html+' </div>';
              html=html+' <p class="mb-1">'+data[i].description+'</p>';
              html=html+' <small>'+data[i].datum+'</small>';
              html=html+'</div>';
          }
          el.innerHTML=html;
          console.log("missionstargetslist updated");
    }
   
}










