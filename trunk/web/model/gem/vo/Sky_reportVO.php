<?php


class Sky_reportVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_reportVO";
	
	public $sky_id;
	public $sky_task_id;
	public $sky_note;
	public $sky_type;

	
	public function Sky_reportVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_task_id = $data["sky_task_id"];
		$this->sky_note = $data["sky_note"];
		$this->sky_type = $data["sky_type"];
	

	}

}
?>