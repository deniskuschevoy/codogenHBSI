<?php

include "MethodParameterM.php";

class MethodM
{
	protected $mName = null;
	protected $mType = null;
	protected $mResponse = null;
	protected $mParameters = null;

	static public function create($methodsArray)
	{
		foreach ( $methodsArray as $key => &$method )
	   	{
	   		Logger::log("Processing Method '$key'");	   		
	   		$method = MethodM::createSingleMethod( $method );
	   	}

	   	return $methodsArray;
	}

	private function createSingleMethod( $method )
	{
		$iName = $method['Name'];
		$iType = $method['Type'];
		$iResponse = $method['Response'];
		$iParameters = MethodParameterM::create($method['Parameters']);
		
		return new MethodM($iName, $iType, $iResponse, $iParameters);
	}

	public function __construct($iName, $iType, $iResponse, $iParameters)
	{
		$this->mName = $iName;
		$this->mType = $iType;
		$this->mResponse = $iResponse;
		$this->mParameters = $iParameters;
	}

	public function getName()
	{
		return $this->mName;
	}

	public function getType()
	{
		return $this->mType;
	}

	public function getResponse()
	{
		return $this->mResponse;
	}

	public function getParameters()
	{
		return $this->mParameters;
	}
}