<?php

include 'DataTypeFieldM.php';

class DataTypeM
{
	protected $mName = null;
	protected $mKind = null;
	protected $mFields = null;
	protected $mContainer = null;
	protected $mBaseType = null;

	static public function create ($iDataTypesArray)
	{
		foreach ( $iDataTypesArray as $key => &$dataType )
	   	{
	   		Logger::log("Processing DataType '$key'");	   		
	   		$dataType = DataTypeM::createSingleDataType( $dataType );
	   	}

	   	return $iDataTypesArray;
	} 

	private function createSingleDataType( $dataType )
	{
		$iName = $dataType['Name'];
		$iKind = $dataType['Kind'];
		$iFields = $dataType['Fields'] == null ? null : DataTypeFieldM::create($dataType['Fields']);
		$iContainer = $dataType['Container'];
		$iBaseType  = $dataType['BaseType'];

		return new DataTypeM ($iName, $iKind, $iFields, $iContainer, $iBaseType);
	}

	public function __construct($iName, $iKind, $iFields, $iContainer, $iBaseType)
	{
		$this->mName = $iName;
		$this->mKind = $iKind;
		$this->mFields = $iFields;
		$this->mContainer = $iContainer;
		$this->mBaseType = $iBaseType;
	}

	public function getName()
	{
		return $this->mName ;
	}

	public function getKind()
	{
		return $this->mKind ;
	}

	public function getFields()
	{
		return $this->mFields ;
	}

	public function getContainer()
	{
		return $this->mContainer ;
	}

	public function getBaseType()
	{
		return $this->mBaseType ;
	}
}