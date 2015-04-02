<?php
use \Geometry;
use Doctrine\DBAL\Types\Type; 
use Doctrine\DBAL\Platforms\AbstractPlatform;


class GeometryType extends Type {
    
    const GEOMETRY = 'geometry';
    
    /**
     *
     * @param array $fieldDeclaration
     * @param AbstractPlatform $platform
     * @return string 
     */
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        //var_dump($fieldDeclaration);
        //die();
        return '';//geography(POINT,'.Point::$SRID.')';
    }
    
    public function getName()
    {
        return self::GEOMETRY;
    }
    
    /**
     *
     * @param type $value
     * @param AbstractPlatform $platform
     * @return Point 
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $a = new Geometry($value);
        return $a;
    }
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return is_null($value)?null:(String)$value->wkt;
    }
    
    public function canRequireSQLConversion()
    {
        return true;
    }
    
    public function convertToPHPValueSQL($sqlExpr, $platform)
    {
        return 'st_astext('.$sqlExpr.')';
    }
    
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {
        return "geomfromewkt(".$sqlExpr.")";
    }

}