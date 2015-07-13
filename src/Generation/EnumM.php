<?php

class EnumM
{
	protected $mName = null;
	protected $mEnumsIDs = null;

	static public function create($enumsArray)
	{
		foreach ( $enumsArray as $key => &$enum )
	   	{
	   		Logger::log("Processing Enum '$key'");		
	   		$enum = EnumM::createSingleEnum( $enum );
	   	}

	   	return $enumsArray;
	}

	private function createSingleEnum($enum)
	{
		$iName = $enum['Name'];
		$iEnumsIDs = $enum['EnumIDs'];
		return new EnumM($iName, $iEnumsIDs);
	}

	public function __construct($iName, $iEnumsIDs)
	{
		$this->mName = $iName;
		$this->mEnumsIDs = $iEnumsIDs;
	}

	public function getName()
	{
		return $this->mName;
	}

	public function getEnumsIDs()
	{
		return $this->mEnumsIDs;
	}
}