<?php

class Geometry {
    public $wkt;
    public static $SRID = '4326';
    
    public $latitudeDecimal = "";
    
    public $longitudeDecimal = "";
    
    public function __construct($wkt=null, $latitudeDecimal = null, $longitudeDecimal = null) {
        $this->wkt = $wkt;
        if (!is_null($wkt)) {
            preg_match("/[\-?\d*\.?\d* +\-?\d*\.?\d*]+/", $wkt, $wktPreg);

            if (count($wktPreg) > 0) {
                $wktPreg = explode(" ", $wktPreg[0]);
                $this->latitudeDecimal = $wktPreg[1];
                $this->longitudeDecimal = $wktPreg[0];
            }
        } else if (!is_null($latitudeDecimal) && !is_null($longitudeDecimal)) {
            $this->latitudeDecimal = $latitudeDecimal;
            $this->longitudeDecimal = $longitudeDecimal;
            $this->wkt = $this->toWKT();
        }
    }
    
    public function toGeoJson(){
        $array = array("type" => "Geometry", "wkt" => $this->wkt);
        return json_encode($array);
    }
    
    /**
     *
     * @return string 
     */
    public function toWKT() {
        return 'SRID='.self::$SRID.';POINT('.$this->longitudeDecimal.' '.$this->latitudeDecimal.')';
    }
    
    
    /**
     *
     * @param string $geojson
     * @return Point 
     */
    public static function fromGeoJson($geojson) 
    {
        return $geojson;
        
        $a = json_decode($geojson);
        //check if the geojson string is correct
        if ($a == null or !isset($a->type) or !isset($a->coordinates)){
            //throw PointException::badJsonString();
            throw new Exception("Bad Json String");
        }
        
        if ($a->type != "Geometry"){
            //throw PointException::badGeoType();
            throw new Exception("Bad Geometry type");
        } else {
            return $a->wkt;
        }
                
    }
    
    public function __toString(){
        return is_null($this->wkt)?"":$this->wkt;
    }
    
    public function getLatitude() {
        $array = Utils::transformGMS($this);
        $lat = str_replace("&quot;", '"', $array['lat']);
        return $lat;
    }
    
    public function getLongitude() {        
        $array = Utils::transformGMS($this);
        $lng = str_replace("&quot;", '"', $array['lng']);
        return $lng;
    }
}
?>
