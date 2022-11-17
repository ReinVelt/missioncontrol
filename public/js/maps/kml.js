
const kmlLayer = new ol.layer.Vector({
  source: new ol.source.Vector({
    url: document.getElementById("map").getAttribute("data-kml"),
    format: new ol.format.KML(),
  }), preload: Infinity
});


var info=[];

var satelliteLayer=new ol.layer.Tile({
  source: new ol.source.XYZ({
    url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
    maxZoom: 19
  })
});

var labelLayer=new ol.layer.Tile({
  source: new ol.source.Stamen({
    layer: 'terrain-labels',
    opacity: 0.5
  })
});

var waterColorLayer=new ol.layer.Tile({
  source: new ol.source.Stamen({
    layer: 'watercolor',
    opacity:0,
    maxZoom:12
  })
});

const map = new ol.Map({
  target: 'map',
  layers: [
    satelliteLayer,
    labelLayer,
    kmlLayer
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([7,53]),
    zoom: 3
  })
});

labelLayer.setOpacity(0.3);

const displayFeatureInfo = function (pixel) {
  const features = [];
  info=[];
  map.forEachFeatureAtPixel(pixel, function (feature) {
    features.push(feature);
  });
  if (features.length > 0) {
 
    let i, ii;
    for (i = 0, ii = features.length; i < ii; ++i) {
      info.push(features[i]);
    }
   
  } 
  //console.log("info:",info);
};

/*map.on('pointermove', function (evt) {
  if (evt.dragging) {
    return;
  }
  const pixel = map.getEventPixel(evt.originalEvent);
  displayFeatureInfo(pixel);
});*/

map.on('click', function (evt) {
  displayFeatureInfo(evt.pixel);
  alert(evt.pixel);
});


kmlLayer.once("change",function(e){
  var extent=kmlLayer.getSource().getExtent();
  if (extent[0]!=Infinity)
  {
    map.getView().fit(extent);
    
  }

})

const geolocation = new ol.Geolocation({
  // enableHighAccuracy must be set to true to have the heading value.
  trackingOptions: {
    enableHighAccuracy: true,
  },
 projection: map.getView().getProjection(),
});



function el(id) {
  return document.getElementById(id);
}











