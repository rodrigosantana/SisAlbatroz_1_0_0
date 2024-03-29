<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Dev
 */
class Utils {

    const ESPINHEL_SUPERFICIE = 1;
    const ESPINHEL_FUNDO = 2;

    const MM_USO_TOTAL = 'TOTAL';
    const MM_USO_PARCIAL = 'PARCIAL';

    const RUMO_N = 'N';
    const RUMO_NNE = 'NNE';
    const RUMO_NE = 'NE';
    const RUMO_ENE = 'ENE';
    const RUMO_E = 'E';
    const RUMO_ESE = 'ESE';
    const RUMO_SE = 'SE';
    const RUMO_SSE = 'SSE';
    const RUMO_S = 'S';
    const RUMO_SSO = 'SSO';
    const RUMO_SO = 'SO';
    const RUMO_OSO = 'OSO';
    const RUMO_O = 'O';
    const RUMO_ONO = 'ONO';
    const RUMO_NO = 'NO';
    const RUMO_NNO = 'NNO';

    const DIRECAO_VENTO_N = 'N';
    const DIRECAO_VENTO_NNE = 'NNE';
    const DIRECAO_VENTO_NE = 'NE';
    const DIRECAO_VENTO_ENE = 'ENE';
    const DIRECAO_VENTO_E = 'E';
    const DIRECAO_VENTO_ESE = 'ESE';
    const DIRECAO_VENTO_SE = 'SE';
    const DIRECAO_VENTO_SSE = 'SSE';
    const DIRECAO_VENTO_S = 'S';
    const DIRECAO_VENTO_SSO = 'SSO';
    const DIRECAO_VENTO_SO = 'SO';
    const DIRECAO_VENTO_OSO = 'OSO';
    const DIRECAO_VENTO_O = 'O';
    const DIRECAO_VENTO_ONO = 'ONO';
    const DIRECAO_VENTO_NO = 'NO';
    const DIRECAO_VENTO_NNO = 'NNO';


    const PLUMAGEM_ADULTO = 'adulto';
    const PLUMAGEM_ADULTO_EM_MUDA = 'adulto_em_muda';
    const PLUMAGEM_JUVENIL = 'juvenil';
    const PLUMAGEM_JUVENIL_EM_MUDA = 'juvenil_em_muda';

    public function getPetrechoMapaBordo($value = null) {
        $array = array(
            self::ESPINHEL_FUNDO => 'Espinhel de Fundo',
            self::ESPINHEL_SUPERFICIE => 'Espinhel de Superfície'
        );

        return is_null($value) ? $array : (array_key_exists($value, $array) ? $array[$value]: 'Valor não existe');
    }

    public static function getPlumagem($value = null) {
        $array = array(
            self::PLUMAGEM_ADULTO,
            self::PLUMAGEM_ADULTO_EM_MUDA,
            self::PLUMAGEM_JUVENIL,
            self::PLUMAGEM_JUVENIL_EM_MUDA,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const JUVENIL = 'juvenil';
    const ADULTO = 'adulto';
    const INDEFINIDO = 'indefinido';

    public static function getTipoIndividuo($value = null) {
        $array = array(
            self::JUVENIL,
            self::ADULTO,
            self::INDEFINIDO
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const PROCEDENCIA_CAPTURA_INCIDENTAL = 'captura_incidental';
    const PROCEDENCIA_ENCALHE = 'encalhe';
    const PROCEDENCIA_REABILITACAO = 'reabilitacao';
    const PROCEDENCIA_OUTROS = 'outros';

    public static function getProcedencia($value = null) {
        $array = array(
            self::PROCEDENCIA_CAPTURA_INCIDENTAL,
            self::PROCEDENCIA_ENCALHE,
            self::PROCEDENCIA_REABILITACAO,
            self::PROCEDENCIA_OUTROS,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const CONDICAO_CARCACA_FRESCA = 'fresca';
    const CONDICAO_CARCACA_CONGELADA = 'congelada';
    const CONDICAO_CARCACA_INTEIRA = 'inteira';
    const CONDICAO_CARCACA_EMPARTES = 'empartes';

    public static function getCondicaoCarcaca($value = null) {
        $array = array(
            self::CONDICAO_CARCACA_FRESCA,
            self::CONDICAO_CARCACA_CONGELADA,
            self::CONDICAO_CARCACA_INTEIRA,
            self::CONDICAO_CARCACA_EMPARTES,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const AUTOLISE_LEVE = 'leve';
    const AUTOLISE_MODERADA = 'moderada';
    const AUTOLISE_SEVERA = 'severa';

    public static function getAutolise($value = null) {
        $array = array(
        self::AUTOLISE_LEVE,
        self::AUTOLISE_MODERADA,
        self::AUTOLISE_SEVERA,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const EMPETROLAMENTO_25 = '25';
    const EMPETROLAMENTO_25_75 = '25_75';
    const EMPETROLAMENTO_75 = '75';

    public static function getEmpetrolamento($value = null) {
        $array = array(
        self::EMPETROLAMENTO_25,
        self::EMPETROLAMENTO_25_75,
        self::EMPETROLAMENTO_75,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const CONDICAO_CORPORAL_OTIMO = 'otimo';
    const CONDICAO_CORPORAL_BOM = 'bom';
    const CONDICAO_CORPORAL_MAGRO = 'magro';
    const CONDICAO_CORPORAL_CAQUETICO = 'caquetico';

    public static function getCondicaoCorporal($value = null) {
        $array = array(
        self::CONDICAO_CORPORAL_OTIMO,
        self::CONDICAO_CORPORAL_BOM,
        self::CONDICAO_CORPORAL_MAGRO,
        self::CONDICAO_CORPORAL_CAQUETICO,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const BAIXA = 'baixa';
    const MEDIA = 'media';
    const ALTA = 'alta';
    const NAO_INFORMADO = 'nao_informado';
    const NAO_COLETADO = 'nao_coletado';
    const PAPEL_ALUMINIO = 'papel_aluminio';
    const PAPEL_EPPENDORF = 'papel_eppendorf';
    const FALCON = 'falcon';
    const ALCOOL_70 = 'alcool_70';
    const CORPO = 'corpo';
    const ASA = 'asa';

    public static function getCruz($value = null) {
        $array = array(
        self::BAIXA,
        self::MEDIA,
        self::ALTA,
        self::NAO_INFORMADO,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    public static function getAmostrasTecido($value = null) {
        $array = array(
        self::NAO_COLETADO,
        self::NAO_INFORMADO,
        self::PAPEL_ALUMINIO,
        self::PAPEL_EPPENDORF,
        self::FALCON,
        self::ALCOOL_70,

        );

        if (is_array($value)) {
            $newArray = array();

            foreach ($value as $v) {
                if (in_array($v, $array)) {
                    $newArray[] = $v;
                }
            }

            return empty($newArray) ? null : $newArray;
        } else {
            return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
        }
    }

    public static function getPena($value = null) {
        $array = array(
        self::ASA,
        self::CORPO,
        self::NAO_COLETADO,
        );

        if (is_array($value)) {
            $newArray = array();

            foreach ($value as $v) {
                if (in_array($v, $array)) {
                    $newArray[] = $v;
                }
            }

            return empty($newArray) ? null : $newArray;
        } else {
            return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
        }
    }


    const MACHO_CERTEZA = 'macho_certeza';
    const MACHO_INCERTEZA = 'macho_incerteza';
    const FEMEA_CERTEZA = 'femea_certeza';
    const FEMEA_INCERTEZA = 'femea_incerteza';
    const INDETERMINADO = 'indeterminado';

    public static function getSexagem($value = null) {
        $array = array(
        self::MACHO_CERTEZA,
        self::MACHO_INCERTEZA,
        self::FEMEA_CERTEZA,
        self::FEMEA_INCERTEZA,
        self::INDETERMINADO,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const CREATE = 'create';
    const EDIT = 'edit';
    const DELETE = 'delete';
    const VIEW = 'view';

    public static function indRumo($value = null) {
        $array = array(
            self::RUMO_N,
            self::RUMO_NNE,
            self::RUMO_NE,
            self::RUMO_ENE,
            self::RUMO_E,
            self::RUMO_ESE,
            self::RUMO_SE,
            self::RUMO_SSE,
            self::RUMO_S,
            self::RUMO_SSO,
            self::RUMO_SO,
            self::RUMO_OSO,
            self::RUMO_O,
            self::RUMO_ONO,
            self::RUMO_NO,
            self::RUMO_NNO,
        );

        if (!is_null($value) && in_array($value, $array)) {
            return $array[array_search($value, $array)];
        }

        return $array;
    }

    public static function indDirecaoVento($value = null) {
        $array = array(
            self::DIRECAO_VENTO_N,
            self::DIRECAO_VENTO_NNE,
            self::DIRECAO_VENTO_NE,
            self::DIRECAO_VENTO_ENE,
            self::DIRECAO_VENTO_E,
            self::DIRECAO_VENTO_ESE,
            self::DIRECAO_VENTO_SE,
            self::DIRECAO_VENTO_SSE,
            self::DIRECAO_VENTO_S,
            self::DIRECAO_VENTO_SSO,
            self::DIRECAO_VENTO_SO,
            self::DIRECAO_VENTO_OSO,
            self::DIRECAO_VENTO_O,
            self::DIRECAO_VENTO_ONO,
            self::DIRECAO_VENTO_NO,
            self::DIRECAO_VENTO_NNO,
        );

        if (!is_null($value) && in_array($value, $array)) {
            return $array[array_search($value, $array)];
        }

        return $array;
    }

    const ORCA = 'orca';
    const TUBARAO = 'tubarao';
    const AVES = 'aves';

    public static function getPredacao($value = null) {
        $array = array(
            self::ORCA,
            self::TUBARAO,
            self::AVES
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const PARGUEIRA = 'pargueira';
    const LINHA_DE_MAO = 'linha_de_mao';
    const ESPINHEL = 'espinhel';

    public static function getTipoPetrecho($value = null) {
        $array = array(
            self::PARGUEIRA,
            self::LINHA_DE_MAO,
            self::ESPINHEL
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const FUNDO = 'fundo';
    const BOIADA = 'boiada';

    public static function getTipoRede($value = null) {
        $array = array(
            self::FUNDO,
            self::BOIADA
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }


    const INTEGRAL = 'integral';
    const DIURNO = 'diurno';
    const NOTURNO = 'noturno';

    public static function getRegimeTrabalho($value = null) {
        $array = array(
            self::INTEGRAL,
            self::DIURNO,
            self::NOTURNO,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    const SIMPLES = 'simples';
    const DUPLO = 'duplo';

    public static function getTipoArrasto($value = null) {
        $array = array(
            self::SIMPLES,
            self::DUPLO,
        );

        return is_null($value) ? $array : (in_array($value, $array) ? $value : null);
    }

    public static function findIds($field, $model) {
        $CI = &get_instance();

        $q = $CI->doctrine->em->createQuery("SELECT r.".$field." FROM ". $model . " r");
        $results = $q->getResult();
        $return = array();

        foreach ($results as $r) {
            $return[] = $r[$field];
        }

        return implode(",", $return);
    }

    /**
     * Converte data no formato texto para um objeto do tipo DateTime.
     *
     * @param string $valor Data no formato dd/mm/yyyy.
     *
     * @return DateTime
     */
    public static function dataToDateTime($data) {
        $valor = explode("/", $data);

        if (count($valor) == 3) {
            return new DateTime($valor[2] .'-'. $valor[1] .'-'. $valor[0]);
        } else if (substr_count($data, '-') == 2) {
            return new DateTime($data);
        }

        return null;
    }

    public static function dateToDatabaseDate($data) {
        $valor = explode("/", $data);

        if (count($valor) == 3) {
            return $valor[2] .'-'. $valor[1] .'-'. $valor[0];
        } else {
            $valor = explode('-', $data);

            if (count($valor) === 3 && checkdate($valor[1], $valor[2], $valor[0])) {
                return $data;
            }
        }

        return null;
    }

    /**
     * Verifica se o valor enviado via requisi��o � verdadeiro ou falso.
     *
     * @param string $valor Valor booleano no formato texto.
     *
     * @return boolean
     */
    public static function valorBooleano($valor) {
        if ($valor === 'true') {
            return true;
        } else if ($valor === 'false') {
            return false;
        }

        return null;
    }

    /**
     * Verifica se o item existe na lista de objetos.
     *
     * @param array $lista Lista de objetos.
     * @param integer $id Código do objeto procurado.
     *
     * @return boolean
     */
    public static function ischecked($lista, $id, $metodo = '') {
        if (empty($metodo)) {
            $metodo = 'getId';
        }

        if (!is_null($lista)) {
            foreach($lista as $objeto) {
                if ($objeto->$metodo() == $id) {
                    return 'checked';
                }
            }
        }
        return '';
    }

    public static function timeToDateTime($time) {
        $value = explode(":", $time);

        if (empty($time) || count($value) !== 2) {
            return null;
        }

        $dt = new DateTime();
        $dt->setTime((int)$value[0], (int)$value[1], 0);
        return $dt;
    }


    public static function dateAndTimeToDateTime($data, $time) {
        $valor = explode("/", $data);
        $dateTime = null;

        if (count($valor) == 3) {
            $dateTime = new DateTime($valor[2] .'-'. $valor[1] .'-'. $valor[0]);
        } else if (substr_count($data, '-') == 2) {
            $dateTime = new DateTime($data);
        }

        $value = explode(":", $time);

        if (empty($time) || count($value) !== 2) {
            return $dateTime;
        }

        if (is_null($dateTime)) {
            $dateTime = new DateTime();
        }


        $dateTime->setTime((int)$value[0], (int)$value[1], 0);
        return $dateTime;
    }


    /**
     * Converte coordenada do formato GMS para objeto do tipo Geometry.
     *
     * @param string $geoLatitude Latitude no formato GGºMM'SS"S.
     * @param string $geoLongitude Longitude no formato GGGºMM'SS"W.
     *
     * @return Geometry
     */
    public static function reverseTransformGMS($geoLatitude, $geoLongitude) {
        $geom = null;

        $lat = $geoLatitude;
        $lat = str_replace("º", " ", $lat);
        $lat = str_replace("'", " ", $lat);
        $lat = str_replace('"', " ", $lat);
        $lat = str_replace('S', "", $lat);
        $arrayLat = explode(' ', $lat);
        if(sizeof($arrayLat) >= 2){
            $geom = new Geometry();
            $arrayLat[0] = (int) $arrayLat[0];
            $arrayLat[1] = (int) $arrayLat[1];
            $arrayLat[2] = str_replace(',' , '.', $arrayLat[2]);
            $arrayLat[2] = (double) $arrayLat[2];

            $lng = $geoLongitude;
            $lng = str_replace("º", " ", $lng);
            $lng = str_replace("'", " ", $lng);
            $lng = str_replace('"', " ", $lng);
            $lng = str_replace('W', "", $lng);
            $arrayLng = explode(' ', $lng);

            $arrayLng[0] = (int) $arrayLng[0];
            $arrayLng[1] = (int) $arrayLng[1];
            $arrayLng[2] = str_replace(',' , '.', $arrayLng[2]);
            $arrayLng[2] = (double) $arrayLng[2];

            $latitude = ($arrayLat[0] + ($arrayLat[1]/60) + ($arrayLat[2]/3600));
            $latitude *= -1;

            $longitude = ($arrayLng[0] + ($arrayLng[1]/60) + ($arrayLng[2]/3600));
            $longitude *= -1;

            $wkt = "SRID=".Geometry::$SRID.";POINT({$longitude} {$latitude})";
            $geom->wkt = $wkt;
        }
        return $geom;
    }

    /**
     * Converte obtejto Geometry para coordenada GMS.
     *
     * @param Geometry $value
     *
     * @return array Array contendo atributos ['lat'] GGºMM'SS" e [lng] GGGºMM'SS"
     */
    public static function transformGMS($value) {
	if ($value == null){
            return array('lat'=>null,'lng'=>null);//array('lat'=>null,'lng'=>null);
        }

        if (!$value instanceof Geometry) {
            throw new UnexpectedTypeException($value, 'Geometry');
        }


        $value = clone $value;

        /** @var Geometry $value **/
        $array = array();
        $wkt = $value->wkt;

        preg_match("/[\-?\d*\.?\d* +\-?\d*\.?\d*]+/", $wkt, $wktPreg);
        if (count($wktPreg) > 0){
            $wktPreg = explode(" ", $wktPreg[0]);

            $lat = (float) $wktPreg[1];

            $latCard = 'N';

            if ($lat < 0) {
                $latCard = 'S';
            }

            $lat = abs( round($lat * 1000000.));

            $g = (floor($lat / 1000000));
            $m = floor(  (($lat/1000000) - floor($lat/1000000)) * 60);
            $s = round(( floor((((($lat/1000000) - floor($lat/1000000)) * 60) - floor((($lat/1000000) - floor($lat/1000000)) * 60)) * 100000) *60/100000 ), 2);

            if ($s == 60) {
                $s = 0;
                $m = $m + 1;
            }

            if ($g < 10) {
              $g = "0".$g;
            }

            if ($m < 10) {
              $m = "0".$m;
            }

            if ($s < 10) {
              $s = "0".$s;
            }

            //$lt = str_replace('.', ',', $g . '°' . $m . '\'' . $s . '"' . $latCard);
            $lt = str_replace('.', ',', $g . 'º' . $m . '\'' . $s . '&quot;S');

            $lng = (float) $wktPreg[0];

            $lngCard = 'E';

            if ($lng < 0) {
               $lngCard = 'W';
            }

            $lng = abs( round($lng * 1000000.));

            $g = (floor($lng / 1000000));
            $m = floor((($lng/1000000) - floor($lng/1000000)) * 60);
            $s = round(( floor((((($lng/1000000) - floor($lng/1000000)) * 60) - floor((($lng/1000000) - floor($lng/1000000)) * 60)) * 100000) *60/100000 ), 2);

            if ($s == 60) {
                $s = 0;
                $m = $m + 1;
            }

            if ($g < 10) {
              $g = "00".$g;
            } else if ($g < 100) {
              $g = "0".$g;
            }

            if ($m < 10) {
              $m = "0".$m;
            }

            if ($s < 10) {
              $s = "0".$s;
            }

            //$lg = str_replace('.', ',', $g . '°' . $m . '\'' . $s . '"' . $lngCard);
            $lg = str_replace('.', ',', $g . 'º' . $m . '\'' . $s . '&quot;W');

            $array['lat'] = $lt;
            $array['lng'] = $lg;
        } else {
            $array['lat'] = null;
            $array['lng'] = null;
        }

        return $array;
    }
}
