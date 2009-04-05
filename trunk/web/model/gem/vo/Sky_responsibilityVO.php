<?php


class Sky_responsibilityVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_responsibilityVO";
	
	public $sky_id;
	public $sky_name;

	
	public function Sky_responsibilityVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_name = $data["sky_name"];
	

	}

}
?>