
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
  //updateTimeline();
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
  var oldlat=0;
  var oldlon=0;
  var c=args.length;
  flyToQueue=[];
  for (var i=0;i<c;i++)
  {
  
   lat=parseFloat(args[i].latitude);
   lon=parseFloat(args[i].longitude);
   var diflat=lat-oldlat;
  var diflon=lon-oldlon;
  var dist=Math.sqrt((diflat*diflat)+(diflon*diflon));
  var dur=dist*30000;
  if (dur<8000){ dur=8000;}
  if (dur>20000) { dur=20000;}
  if (oldlat==0) { dist=1;}
 
  var zoom=Math.round(14-(dist*1.2));
  if (zoom<4) { zoom=4;}
  if (zoom>14){ zoom=14;}
  console.log("zoom",dist,zoom);
   flyToQueue.push({"lonlat":ol.proj.fromLonLat([lon, lat]),"zoom":zoom,"duration":dur});
   oldlat=lat;
   oldlon=lon;
  }
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
    var pins=[
      'http://maps.google.com/mapfiles/kml/pushpin/blue-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/grn-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/ltblu-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/pink-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/purple-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/red-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/wht-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png' 
  ];
    var html="";
    if (el)
    {
        for (var i=0;i<data.missions.length;i++)
        {
          var startdate=new Date(data.missions[i].start);
          var enddate=new Date(data.missions[i].end);
            var cindex=(data.missions[i].id)%8;
            var active=""; if (data.missions[i].finished<1) { active="active";} else { active=""; }
            html=html+'<div id="missionsListItem'+data.missions[i].id+'" class="list-group-item list-group-item-action flex-column align-items-start '+active+'" >';
            html=html+  '<div class="d-flex w-100 justify-content-between">';
            html=html+     '<div class="mb-1 title" ><img src="'+pins[cindex]+'" style="width:25px; float:left; "><a href="/app/mission/'+data.missions[i].id+'">'+data.missions[i].name+'</a></div>';
             html=html+     '<div class="badge" ><a href="#" onclick="highlightMission('+data.missions[i].id+')"><span class="material-symbols-outlined">play_circle</span></a></div>';
            html=html+  '</div>';
            html=html+  '<div class="missioninfo">';
            html=html+    '<div class="subtitle">';
            html=html+    startdate.toLocaleString('default', { month: 'long' })+' '+startdate.getFullYear();
            if (enddate.getFullYear()>2000)
            {
              html=html+' - ';
              html=html+ enddate.toLocaleString('default', { month: 'long' })+' '+enddate.getFullYear();
            }
            html=html+    '</div>';
            html=html+     '<div class="description">'+data.missions[i].description+'...</div>';

          html=html+'</div>';
            html=html+'</div>';

           
        }
        el.innerHTML=html;
        console.log("missionslist updated");
    }
}

function updateTimeline()
{
    var el=document.getElementById("timeline");
    var colors=['0000ff','00ff00','ccccff','ff88cc','cc00ff','ff0000','ffffff','ffff00'];
    var pins=[
      'http://maps.google.com/mapfiles/kml/pushpin/blue-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/grn-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/ltblu-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/pink-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/purple-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/red-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/wht-pushpin.png',
      'http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png' 
  ];
    var html="";
    if (el)
    {
      html=html+'<div class="timeline__wrap">';
      html=html+'<div class="timeline__items">';
        for (var i=0;i<data.missions.length;i++)
        {
          var startdate=new Date(data.missions[i].start);
          var enddate=new Date(data.missions[i].end);
            var cindex=(data.missions[i].id)%8;
            var active=""; if (data.missions[i].finished<1) { active="active";} else { active=""; }
            html=html+'<div class="timeline__item" >';
            html=html+  '<div class="timeline__content">';
            html=html+    '<div class="timeline_date subtitle">';
            html=html+    startdate.toLocaleString('default', { month: 'long' })+' '+startdate.getFullYear();
            if (enddate.getFullYear()>2000)
            {
              html=html+'&nbsp;-&nbsp;';
              html=html+ enddate.toLocaleString('default', { month: 'long' })+' '+enddate.getFullYear();
            }
            html=html+    '</div>'; //subtitle
              html=html+     '<div class="title" ><a href="/app/mission/'+data.missions[i].id+'">'+data.missions[i].name+'</a></div>';
            html=html+  '<div class="missioninfo">';
            html=html+    '<div class="subtitle">';
            html=html+    startdate.toLocaleString('default', { month: 'long' })+' '+startdate.getFullYear();
            if (enddate.getFullYear()>2000)
            {
              html=html+' - ';
              html=html+ enddate.toLocaleString('default', { month: 'long' })+' '+enddate.getFullYear();
            }
            html=html+    '</div>'; //sub
            html=html+     '<div class="description">'+data.missions[i].description+'...</div>';

          html=html+'</div>'; //missioninfo
            html=html+  '</div>';
           

          html=html+'</div>'; //item

           
        }
        html=html+'</div>'; //timeline-items
        html=html+'</div>'; //timeline-wrap
        el.innerHTML=html;
        timeline(document.querySelectorAll('.timeline'), {
          mode: 'horizontal',
          //forceVerticalWidth: 130
          visibleItems:3
        });
        console.log("timeline updated");
    }
   
}


getData();



