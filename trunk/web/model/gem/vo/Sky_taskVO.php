<?php


class Sky_taskVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_taskVO";
	
	public $sky_id;
	public $sky_subproject_id;
	public $sky_title;
	public $sky_description;
	public $sky_start;
	public $sky_end;
	public $sky_status;

	
	public function Sky_taskVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_subproject_id = $data["sky_subproject_id"];
		$this->sky_title = $data["sky_title"];
		$this->sky_description = $data["sky_description"];
		$this->sky_start = $data["sky_start"];
		$this->sky_end = $data["sky_end"];
		$this->sky_status = $data["sky_status"];
	

	}

}
?>