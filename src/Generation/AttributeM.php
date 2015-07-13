<?php

class AttributeM 
{

	protected $mName = null;
	protected $mDescription = null;
	protected $mType = null;
	protected $mNotify = null;

	static public function create ($attributesArray)
	{
		foreach ( $attributesArray as $key => &$attribute )
	   	{
	   		Logger::log("Processing Attribute '$key'");	   		
	   		$attribute = AttributeM::createSingleAttribute( $attribute );
	   	}

	   	return $attributesArray;
	}

	private function createSingleAttribute( $attribute )
	{
		$iName = $attribute['Name'];
		$iDescription = $attribute['Description'];
		$iType = $attribute['Type'];
		$iNotify = $attribute['Notify'];

		return new AttributeM($iName, $iDescription, $iType, $iNotify);
	}

	public function __construct($iName, $iDescription, $iType, $iNotify)
	{
		$this->mName = $iName;
		$this->mDescription = $iDescription;
		$this->mType = $iType;
		$this->mNotify = $iNotify;
	}

	public function getName()
	{
		return $this->mName;
	}

	public function getDescription()
	{
		return $this->mDescription;
	}

	public function getType()
	{
		return $this->mType;
	}

	public function getNotify()
	{
		return $this->mNotify;
	}
}