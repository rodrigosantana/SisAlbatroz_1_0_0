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

.map-tools {
    float: right;
    position: absolute;
    top: 10px;
    right: 20px;
}

</style>

<div class="row">
    <div class="col-md-12">
        <div id="map" class="map" style="height: 86%; width: 100%"></div>
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
        
        
        <li class="dropdown map-tools">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="glyphicon glyphicon-cog" style="font-size: 26px; color: #504F4F;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" style="min-width: 260px; padding: 0px;">
                <li>
                    <div class="panel panel-default" style="margin-bottom: 0px">
                        <div class="panel-heading">Dados provenientes de:</div>
                        <div class="panel-body">
                            <div>
                            <label>Mapa de Bordo</label><br>
                            <label style="margin-left: 20px; font-weight: normal;"><input type="checkbox" value="mapa_bordo" class="map-check-data"> Lances</label><br>
                            <label style="margin-left: 20px; font-weight: normal;"><input type="checkbox" value="mapa_bordo_captura" class="map-check-data"> Lances com captura</label>                            
                            
                            <label>Observador de Bordo</label><br>
                            <label style="margin-left: 20px; font-weight: normal;"><input type="checkbox" value="observador_bordo" class="map-check-data"> Lances</label><br>
                            <label style="margin-left: 20px; font-weight: normal;"><input type="checkbox" value="observador_bordo_captura" class="map-check-data"> Capturas</label>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        
    </div>
</div>

<script>
    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
    var closer = document.getElementById('popup-closer');
    var layersList = [];
    var layersStyle = {};
    
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

    var map = new ol.Map({
        layers: [
            new ol.layer.Tile({
                source: new ol.source.TileWMS({
                    url: 'http://demo.boundlessgeo.com/geoserver/wms',
                    params: {
                        'LAYERS': 'ne:NE1_HR_LC_SR_W_DR'
                    }
                })
            })
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
            var geometry = feature.getGeometry();
            var coordinate = geometry.getCoordinates();
            content.innerHTML = feature.get('content');
            overlay.setPosition(coordinate);
        }
    });
    
    map.on('pointermove', function(e) {
        var pixel = map.getEventPixel(e.originalEvent);
        var hit = map.hasFeatureAtPixel(pixel);
        map.getTargetElement().style.cursor = hit ? 'pointer' : '';
    });


    $(document).ready(function() {  
        
        layersStyle = {
                'mapa_bordo_captura':[new ol.style.Style({
                    image: new ol.style.Icon(({
                        anchor: [0.5, 0.5],
                        anchorXUnits: 'fraction',
                        anchorYUnits: 'fraction',
                        opacity: 1,
                        src: '<?php echo base_url(); ?>assets/img/cruz_azul.png'
                    }))
                })],
                'mapa_bordo': [new ol.style.Style({
                    image: new ol.style.Circle({
                        radius: 5,
                        fill: new ol.style.Fill({color: 'blue'}),
                        stroke: new ol.style.Stroke({color: 'black', width: 1})
                    })
                })],
                'observador_bordo': [new ol.style.Style({
                    image: new ol.style.Circle({
                        radius: 5,
                        fill: new ol.style.Fill({color: 'red'}),
                        stroke: new ol.style.Stroke({color: 'black', width: 1})
                    })
                })],
                'observador_bordo_captura':[new ol.style.Style({
                    image: new ol.style.Icon(({
                        anchor: [0.7, 0.7],
                        anchorXUnits: 'fraction',
                        anchorYUnits: 'fraction',
                        opacity: 1,
                        src: '<?php echo base_url(); ?>assets/img/cruz_vermelha.png'
                    }))
                })],
        };
        
        $('.map-check-data').click(function (event) {
            var element = event.target;
            var elementValue = element.value;
            
            if (element.checked) {
                blockWindow();
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: '<?php echo site_url('mapa/getdata')."?t=".time(); ?>',
                    dataType: "json",
                    data: {data: elementValue},
                    success: function(res) {
                        unblockWindow();
                        $(closer).click();

                        if (res.data) {
                            var layers = res.data;
                            $.each(layers, function (i, value){
                                console.log(value.data);
                                try {
                                    var vectorLayer = new ol.layer.Vector({
                                        source: new ol.source.Vector({
                                            features: (new ol.format.GeoJSON()).readFeatures($.parseJSON(value.data))
                                        }),
                                        style: layersStyle[value.type]
                                    });

                                    map.addLayer(vectorLayer);                            
                                    layersList.push({type:value.type, layer:vectorLayer});
                                } catch(error) {
                                    console.log(error);
                                }
                            });
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        unblockWindow();
                        alert('Erro ao obter os lances.');
                    },
                    async: true
                });
            } else {
                $.each(layersList, function(i, value) {
                    try {
                        if (value && elementValue == value.type) {
                            layersList.splice(i, 1);
                            map.removeLayer(value.layer);
                        }
                    } catch(error) {
                        console.log(error);
                    }
                });
            }
        });
    });


    function findStyle(type) {
        var style;
        console.log(type);
        $.each(layersStyle, function(i, value){
            console.log(value.type);
            if (value.type == type) {
                style = value;
            }
        });
        
        console.log(style);
        
        return style;
    }


</script>