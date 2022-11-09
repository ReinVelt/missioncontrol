/*
import './style.css';
import Map from './node_modules/ol/Map';
import View from './node_modules/ol/View';
import Stamen from './node_modules/ol/source/Stamen';
import Feature from './node_modules/ol/Feature';
import Geolocation from './node_modules/ol/Geolocation';
import Point from './node_modules/ol/geom/Point';
import {Circle as CircleStyle, Fill, Stroke, Style} from './node_modules/ol/style';
import OSM from './node_modules/ol/source/OSM';
import TileLayer from './node_modules/ol/layer/Tile';
import VectorLayer from './node_modules/ol/layer/Vector';
import {fromLonLat} from './node_modules/ol/proj';
import KML from './node_modules/ol/format/KML';
import VectorSource from './node_modules/ol/source/Vector';
import XYZ from './node_modules/ol/source/XYZ';
*/

const vector = new ol.layer.Vector({
  source: new ol.source.Vector({
    url: document.getElementById("map").getAttribute("data-kml"), //'http://localhost:8080/api/gpslog/kml/1',
    format: new ol.format.KML(),
  }),
});

const map = new ol.Map({
  target: 'map',
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM(),
      minZoom:19
    })
    ,
   /* new ol.layer.Tile({
      source: new ol.source.Stamen({
        layer: 'watercolor',
      }),
    }), new ol.layer.Tile({
      source: new ol.source.Stamen({
        layer: 'terrain-labels',
        maxZoom:14,
        minZoom:12
      }),
    }),
   */
    new ol.layer.Tile({
      source: new ol.source.XYZ({
        url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
        maxZoom: 19
      })
    }),
   
   vector
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([7,53]),
    zoom: 3
  })
});

const osm = new LayerTile({
  title: 'OSM',
  type: 'base',
  visible: true,
  source: new SourceOSM()
} as BaseLayerOptions);

const watercolor = new LayerTile({
  title: 'Water color',
  type: 'base',
  visible: false,
  source: new SourceStamen({
    layer: 'watercolor'
  })
} as BaseLayerOptions);

const baseMaps = new LayerGroup({
  title: 'Base maps',
  layers: [osm, watercolor]
} as ol_layerswitcher.GroupLayerOptions);



const layerSwitcher = new ol-layerswitcher.LayerSwitcher({
  reverse: true,
  groupSelectStyle: 'group'
});

const displayFeatureInfo = function (pixel) {
  const features = [];
  map.forEachFeatureAtPixel(pixel, function (feature) {
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

map.on('pointermove', function (evt) {
  if (evt.dragging) {
    return;
  }
  const pixel = map.getEventPixel(evt.originalEvent);
  displayFeatureInfo(pixel);
});

map.on('click', function (evt) {
  displayFeatureInfo(evt.pixel);
});


vector.once("change",function(e){
  var extent=vector.getSource().getExtent();
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











