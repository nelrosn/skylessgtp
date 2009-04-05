<?php


class Sky_subproject_dependencyVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_subproject_dependencyVO";
	
	public $sky_id;
	public $sky_subproject_id;
	public $sky_dependency_id;
	public $sky_description;

	
	public function Sky_subproject_dependencyVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_subproject_id = $data["sky_subproject_id"];
		$this->sky_dependency_id = $data["sky_dependency_id"];
		$this->sky_description = $data["sky_description"];
	

	}

}
?>