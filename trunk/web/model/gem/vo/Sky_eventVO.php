<?php


class Sky_eventVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_eventVO";
	
	public $sky_id;
	public $sky_action;
	public $sky_description;
	public $sky_time;
	public $sky_entity_id;
	public $sky_table;
	public $sky_user_id;

	
	public function Sky_eventVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_action = $data["sky_action"];
		$this->sky_description = $data["sky_description"];
		$this->sky_time = $data["sky_time"];
		$this->sky_entity_id = $data["sky_entity_id"];
		$this->sky_table = $data["sky_table"];
		$this->sky_user_id = $data["sky_user_id"];
	

	}

}
?>