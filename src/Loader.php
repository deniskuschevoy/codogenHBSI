<?php

include "/Configuration/impl/MappingConfiguration.php";
include "/Configuration/impl/HbsiConfiguration.php";

class Loader
{
   const TYPE_HBSI    = "HBSI";
   const TYPE_MAPPING = "Mappings";

   public static function LoadData( &$entitiesPath, $type )
   {
      if ( !file_exists($entitiesPath) || filesize ($entitiesPath) == 0 ) throw new \InvalidArgumentException("Configuration '$entitiesPath' cannot be found or empty");
      if ( $type != self::TYPE_MAPPING && $type != self::TYPE_HBSI ) throw new \InvalidArgumentException("Unknown configuration type '$type'.");
      
      if ($type == self::TYPE_HBSI )
         Logger::log("Reading entities...");
      else
         Logger::Log("Reading mappings...");
      $entities_file_content = file_get_contents( $entitiesPath );
      Logger::log("Read " . strlen($entities_file_content) . " symbols from file");
      
      
      Logger::log("Parsing read data...");
      $entities_data = yaml_parse( $entities_file_content );
      $yaml = null;

      Logger::log("YAML parsers' work done. Creating configuration model");

      $configuration = self::createConfiguration( $type, $entities_data);
      
      if ( $configuration == null ) throw new \RuntimeException("Cannot create Configuration instance");
      
      Logger::log("Configuration model successfully created");
      
      return $configuration;
   }
   
   protected static function createConfiguration( $type, $data )
   {
      switch ( $type )
      {
         case self::TYPE_HBSI:
            return new HbsiConfiguration($data);
         case self::TYPE_MAPPING:
            return new MappingConfiguration($data);
         default:
            throw new \InvalidArgumentException("Unknown configuration type '$type'.");
      }
   }
}