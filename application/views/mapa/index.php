<style>
    .ol-popup {
  position: absolute;
  background-color: white;
  -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
  filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
  padding: 15px;
  border-radius: 10px;
  border: 1px solid #cccccc;
  bottom: 12px;
  left: -50px;
}
.ol-popup:after, .ol-popup:before {
  top: 100%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.ol-popup:after {
  border-top-color: white;
  border-width: 10px;
  left: 48px;
  margin-left: -10px;
}
.ol-popup:before {
  border-top-color: #cccccc;
  border-width: 11px;
  left: 48px;
  margin-left: -11px;
}
.ol-popup-closer {
  text-decoration: none;
  position: absolute;
  top: 2px;
  right: 8px;
}
.ol-popup-closer:after {
  content: "✖";
}
    
#popup-content {
    min-width: 330px;
}
    
</style>

<div class="row">
    <div class="col-md-12">
        <div id="map" class="map" style="height: 100%; width: 100%"></div>
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
    </div>
</div>

<script>


    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
    var closer = document.getElementById('popup-closer');

    var overlay = new ol.Overlay(({
        element: container,
        autoPan: true,
        autoPanAnimation: {
          duration: 250
        }
    }));

    closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
    };


    var image = new ol.style.Circle({
        radius: 5,
        fill: new ol.style.Fill({color: '#bada55'}),
        stroke: new ol.style.Stroke({color: 'red', width: 1})
    });

    var styles = {
        'Point': [new ol.style.Style({
                image: image
            })]
    };

    var styleFunction = function(feature, resolution) {
        return styles[feature.getGeometry().getType()];
    };

    var geojsonObject = <?php echo $points ?>;

    var vectorSource = new ol.source.Vector({
        features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
    });

    var vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        style: styleFunction
    });


    var map = new ol.Map({
        layers: [
            new ol.layer.Tile({
                source: new ol.source.TileWMS({
                    url: 'http://demo.boundlessgeo.com/geoserver/wms',
                    params: {
                        'LAYERS': 'ne:NE1_HR_LC_SR_W_DR'
                    }
                })
            }),
            vectorLayer
        ],
        overlays: [overlay],
        target: 'map',
        controls: ol.control.defaults({
            attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
                collapsible: false
            })
        }),
        view: new ol.View({
            projection: 'EPSG:4326',
            center: [-48, -28],
            zoom: 5
        })
    });



    map.on('click', function(evt) {
        var feature = map.forEachFeatureAtPixel(evt.pixel,
                function(feature, layer) {
                    return feature;
                });

        if (feature) {
            console.log(feature);
            
            var geometry = feature.getGeometry();
            var coordinate = geometry.getCoordinates();
            content.innerHTML = feature.get('content');
            overlay.setPosition(coordinate);
            
            
            
            
//            var html = '<h1>' + feature.get('content') + '<h1>';
//
//            var popup = new ol.Popup.AnchoredBubble(
//                    'myPopup',
//                    lonlat,
//                    new OpenLayers.Size(150, 60),
//                    html,
//                    {size: {w: 14, h: 14}, offset: {x: -7, y: -7}},
//            false
//                    );
//
//            feature.popup = popup;
//            map.addPopup(popup);
//
//            console.log(feature.get('content'));
        }


    });


    $(document).ready(function() {
        console.log(geojsonObject);




    });







</script>