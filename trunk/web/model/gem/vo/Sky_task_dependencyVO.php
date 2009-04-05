<?php


class Sky_task_dependencyVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_task_dependencyVO";
	
	public $sky_id;
	public $sky_task_id;
	public $sky_dependency_id;
	public $sky_description;

	
	public function Sky_task_dependencyVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_task_id = $data["sky_task_id"];
		$this->sky_dependency_id = $data["sky_dependency_id"];
		$this->sky_description = $data["sky_description"];
	

	}

}
?>