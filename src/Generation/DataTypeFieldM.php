<?php

class DataTypeFieldM
{
	protected $mName = null;
	protected $mDescription = null;
	protected $mDefaultValue = null;
	protected $mType = null;

	static public function create($dataTypeFiledsArray)
	{
		foreach ( $dataTypeFiledsArray as $key => &$dataTypeField )
	   	{
	   		Logger::log("Processing DataTypeField '$key'");	   		
	   		$dataTypeField = DataTypeFieldM::createSingleDataTypeField( $dataTypeField );
	   	}
	   	return $dataTypeFiledsArray;
	}

	private function createSingleDataTypeField($dataTypeField)
	{
		$iName = $dataTypeField['Name'];
		$iDescription = $dataTypeField['Description'];
		$iDefaultValue = $dataTypeField['DefaultValue'];
		$iType = $dataTypeField['Type'];;
		return new DataTypeFieldM ($iName, $iDescription, $iDefaultValue, $iType);
	}

	public function __construct($iName, $iDescription, $iDefaultValue, $iType)
	{
		$this->mName = $iName;
		$this->mDescription = $iDescription;
		$this->mDefaultValue = $iDefaultValue;
		$this->mType = $iType;
	}


	public function getName()
	{
		return $this->mName;
	}

	public function getDescription()
	{
		return $this->mDescription;
	}

	public function getDefaultValue()
	{
		return $this->mDefaultValue;
	}

	public function getType()
	{
		return $this->mType;
	}
}