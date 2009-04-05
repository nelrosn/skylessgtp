<?php


class Sky_permissionVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_permissionVO";
	
	public $sky_id;
	public $sky_creator_id;
	public $sky_project_id;
	public $sky_responsibility_id;
	public $sky_stakeholder_id;

	
	public function Sky_permissionVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_creator_id = $data["sky_creator_id"];
		$this->sky_project_id = $data["sky_project_id"];
		$this->sky_responsibility_id = $data["sky_responsibility_id"];
		$this->sky_stakeholder_id = $data["sky_stakeholder_id"];
	

	}

}
?>