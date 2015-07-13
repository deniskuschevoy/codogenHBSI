<?php

include "ClassesValidator.php";
include "/../../Generation/EntityM.php";

class ClassesConfiguration extends Configuration
{

   public function __construct( $data )
   {
      parent::__construct($data, new ClassesValidator());
      $this->SetEntities(
      	$this->transformEntitiesArrayToModel( $this->GetEntities() )
		);
   }
      
   public function GetEntities()
   {
      return $this->mData["Entities"];
   }
   
   protected function SetEntities ( $entities )
   {
   	if ( $entities==null ) throw new \InvalidArgumentException("Cannot set entities. Entities cannot be empty.");
   	if ( !is_array($entities) ) throw new \InvalidArgumentException("Cannot set entities. Entities shall be an array.");
   	$this->mData["Entities"] = $entities;
   }
   
   private function transformEntitiesArrayToModel( $entities )
   {
   	Logger::log("Transforming entities array from model.");
   	if ( $entities==null ) throw new \InvalidArgumentException("Cannot set entities. Entities cannot be empty.");
   	if ( !is_array($entities) ) throw new \InvalidArgumentException("Cannot set entities. Entities shall be an array.");
   	Logger::log("Array contains " . count($entities) . " entities");
   	
   	foreach ( $entities as $key => &$entity )
   	{
   		Logger::log("Processing entity '$key'");
   		if ( $entity==null ) throw new \InvalidArgumentException("Single entity from a list is null.");
   		if ( !is_array($entity) ) throw new \InvalidArgumentException("Single entity from shall be array.");
   		
   		$entity = EntityM::create( $entity );
   	}
   	
   	return $entities;
   }
}