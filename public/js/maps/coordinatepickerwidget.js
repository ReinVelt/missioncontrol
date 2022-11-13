

function coordinateselectorInit(elementId,coordinateFieldId)

{
const vector = new ol.layer.Vector({
  source: new ol.source.Vector({
    url: document.getElementById(elementId).getAttribute("data-kml"), 
    format: new ol.format.KML(),
  }),
});

const csmap = new ol.Map({
  target: elementId,
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM()
    }),vector
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([7,53]),
    zoom: 3
  })
});

const displayFeatureInfo = function (pixel) {
  const features = [];
  csmap.forEachFeatureAtPixel(pixel, function (feature) {
    features.push(feature);
  });
  if (features.length > 0) {
    const info = [];
    let i, ii;
    for (i = 0, ii = features.length; i < ii; ++i) {
      info.push(features[i].get('name'));
    }
   
  } 
};


csmap.on('click', function (evt) {
  var lonlat=ol.proj.toLonLat(csmap.getCoordinateFromPixel(evt.pixel));
  document.getElementById(coordinateFieldId).value=[lonlat[1],lonlat[0]];;
  console.log(evt);
  displayFeatureInfo(evt.pixel);
});


const geolocation = new ol.Geolocation({
  // enableHighAccuracy must be set to true to have the heading value.
  trackingOptions: {
    enableHighAccuracy: true,
  },
 // projection: view.getProjection(),
});


vector.once("change",function(e){
  var extent=vector.getSource().getExtent();
  if (extent[0]!=Infinity)
  {
    csmap.getView().fit(extent);
  }

})



function el(id) {
  return document.getElementById(id);
}

window.setTimeout(function () { csmap.updateSize(); }, 200);

}


