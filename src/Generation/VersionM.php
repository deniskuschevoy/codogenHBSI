<?php

class VersionM
{
	protected $mMajor = 32;
	protected $mMinor = 55;

	public function __construct( $data )
	{
		$this->mMajor = $data['Major'];
		$this->mMinor = $data['Minor'];
	}

	public function getMajor()
	{
		return $this->mMajor;
	}

	public function getMinor()
	{
		return $this->mMinor;
	}

}