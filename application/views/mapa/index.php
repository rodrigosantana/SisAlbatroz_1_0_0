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
                            <label><input type="checkbox" value="mapa_bordo" class="map-check-data"> Mapa de Bordo</label>
                            <label><input type="checkbox" value="observador_bordo" class="map-check-data"> Observador de Bordo</label>
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
            console.log(feature);            
            var geometry = feature.getGeometry();
            var coordinate = geometry.getCoordinates();
            content.innerHTML = feature.get('content');
            overlay.setPosition(coordinate);
        }
    });


    $(document).ready(function() {  
        
        layersStyle = {
            
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
                })]            
        };
        
        $('.map-check-data').click(function (event) {
            var itens = $('.map-check-data:checked');
            var data = '';
            var v = '';
            
            for(var i = 0; i < itens.length; i++) {
                var component = itens[i];
                data += v + $(component).val();
                v = ',';
            }
            
            blockWindow();
            $.ajax({
                type: "POST",
                cache: false,
                url: '<?php echo site_url('mapa/getdata'); ?>',
                dataType: "json",
                data: {data: data},
                success: function(res) {
                    unblockWindow();
                    $(closer).click();
                    $.each(layersList, function(i, value) {
                        try {
                            map.removeLayer(value.layer);
                        } catch(error) {
                            console.log(error);
                        }
                    });
                    
                    layersList = [];
                    
                    if (res.data) {
                        var layers = res.data;
                        $.each(layers, function (i, value){
                            try {
                                var vectorLayer = new ol.layer.Vector({
                                    source: new ol.source.Vector({
                                        features: (new ol.format.GeoJSON()).readFeatures(value.data)
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