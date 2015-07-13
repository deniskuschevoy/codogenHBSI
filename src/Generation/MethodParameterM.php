<?php

class MethodParameterM
{
	protected $mName = null;
	protected $mType = null;
	protected $mIsDefault = null;

	static public function create($parametersArray)
	{
		foreach ( $parametersArray as $key => &$parameter )
	   	{
	   		Logger::log("Processing Parameter '$key'");	   		
	   		$parameter = MethodParameterM::createSingleParameter( $parameter );
	   	}

	   	return $parametersArray;
	}

	private function createSingleParameter( $parameter )
	{
		$iName = $parameter['Name'];
		$iType = $parameter['Type'];
		$iIsDefault =  $parameter['IsDefault'];

		return new MethodParameterM ($iName, $iType, $iIsDefault);
	}

	public function __construct($iName, $iType, $iIsDefault)
	{
		$this->mName = $iName;
		$this->mType = $iType;
		$this->mIsDefault = $iIsDefault;
	}

	public function getName()
	{
		return $this->mName;
	}

	public function getType()
	{
		return $this->mType;
	}

	public function getIsDefault()
	{
		return $this->mIsDefault;
	}
}