
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
        
            var im='<div class="thumbnail" style="float:left; border:solid 1px silver; border-radius:10px; white-space: nowrap;">\
                          <img src="/app/imageresize/'+data[i].id+'" style="max-height:130px; max-width:200px; border:solid 4px white; border-radius:10px;">\
                          <a href="#" data-bs-toggle="modal" data-bs-target="#formModalMedia"  onclick="getMediaForm('+data[i].missionId+','+data[i].id+'); return false;" class="btn btn-sm">\
                            <span class="material-icons" style="font-size:x-small;">edit</span>\
                          </a>\
                      </div>';
                      console.log(im);
                      html=html+im;
          
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
              var date=new Date(data[i].datum);
              html=html+'<div id="missionstargetListItem'+data[i].id+'" class="list-group-item list-group-item-action flex-column align-items-start rounded" data-bs-toggle="tooltip" style="border:solid 3px black !important;" title="'+data[i].description+'" onclick="highlightMap('+data[i].latitude+','+data[i].longitude+')">';
              html=html+' <div class="d-flex w-100 justify-content-between">';
              html=html+'   <div class="mb-1 title"><img src="http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png" style="width:25px; float:left;"><a href="#'+data[i].id+'">'+data[i].name+'</a></div>';
              html=html+'   <a data-bs-toggle="modal" data-bs-target="#formModalMissionTarget" style="font-size:18px; float:right;" class="material-icons hover" onclick="getMissiontargetForm('+data[i].missionId+','+data[i].id+'); return false;">settings</a>';
              html=html+' </div>';
              html=html+'<div class="missioninfo">'
              html=html+  '<div class="subtitle">';
              html=html+      date.getDate()+' ' + date.toLocaleString('default', { month: 'long' })+' '+date.getFullYear();
              html=html+  '</div>';
              html=html+  '<div class="description">'+data[i].description+'</div>'
              html=html+'</div></div>';
          }
          el.innerHTML=html;
          console.log("missionstargetslist updated");
    }
   
}





function highlightMap(lat,lon)
{
 
  var zoom=14;
  var dur=10000;
  flyToQueue=[];
 
  
   
  
   flyToQueue.push({"lonlat":ol.proj.fromLonLat([lon, lat]),"zoom":zoom,"duration":dur});
 
   flyToQueue.reverse();
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
  const duration = 12000;
  var view=map.getView();
  const zoom = view.getZoom();
  let parts = 2;
  let called = false;
  function callback(complete) {
    console.log(location);
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
      center: location.lonlat,
      duration:location.duration,
      zoom:location.zoom
    },
    callback
  );
  
  view.animate(
    {
      center: location.lonlat,
      duration: location.duration,
      zoom:location.zoom
    },
    callback
  );

  
 
  
 
}





