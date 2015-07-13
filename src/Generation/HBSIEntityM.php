<?php

include "VersionM.php";
include "DataTypeM.php";
include "EnumM.php";
include "MethodM.php";
include "AttributeM.php";

class HBSIEntityM
{
   protected $mName = null;
   protected $mType = nul;
   protected $mVersion = null;
   protected $mDataTypes = null;
   protected $mEnums = null;
   protected $mMethods = null;
   protected $mAttributes = null;

   
   static public function create( &$iDataArray )
   {
   	$name = $iDataArray['Name'];
      $type = $iDataArray['Type'];
      $version = new VersionM($iDataArray['Version']);
      $dataTypes = DataTypeM::create($iDataArray['DataTypes']);
      $enums = EnumM::create($iDataArray['Enums']);
      $methods = MethodM::create($iDataArray['Methods']);
      $attributes = AttributeM::create($iDataArray['Attributes']);
      
   	return new HBSIEntityM($name, $type, $version, $dataTypes, $enums, $methods, $attributes);
   }
   
   protected function __construct( $iName, $iType, VersionM $iVersion, $iDataTypes, $iEnums, $iMethods, $iAttributes)
   {
      $this->mName = $iName;
      $this->mType = $iType;
      $this->mVersion = $iVersion;
      $this->mDataTypes = $iDataTypes;
      $this->mEnums = $iEnums;
      $this->mMethods = $iMethods;
      $this->mAttributes = $iAttributes;
   }

   public function getName()
   {
      return $this->mName;
   }

   public function getType()
   {
      return $this->mType;
   }

   public function getVersion()
   {
      return $this->mVersion;
   }

   public function getDataTypes()
   {
      return $this->mDataTypes;
   }

   public function getEnums()
   {
      return $this->mEnums;
   }

   public function getAttributes()
   {
      return $this->mAttributes;
   }

   public function getMethods()
   {
      return $this->mMethods;
   }

}