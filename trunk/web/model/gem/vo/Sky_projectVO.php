<?php


class Sky_projectVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_projectVO";
	
	public $sky_id;
	public $sky_applicant_id;
	public $sky_creator_id;
	public $sky_project_id;
	public $sky_name;
	public $sky_objectives;
	public $sky_description;
	public $sky_start;
	public $sky_end;
	public $sky_status;

	
	public function Sky_projectVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_applicant_id = $data["sky_applicant_id"];
		$this->sky_creator_id = $data["sky_creator_id"];
		$this->sky_project_id = $data["sky_project_id"];
		$this->sky_name = $data["sky_name"];
		$this->sky_objectives = $data["sky_objectives"];
		$this->sky_description = $data["sky_description"];
		$this->sky_start = $data["sky_start"];
		$this->sky_end = $data["sky_end"];
		$this->sky_status = $data["sky_status"];
	

	}

}
?>