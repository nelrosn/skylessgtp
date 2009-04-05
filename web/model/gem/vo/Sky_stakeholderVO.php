<?php


class Sky_stakeholderVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_stakeholderVO";
	
	public $sky_id;
	public $sky_responsibility_id;
	public $sky_creator_id;
	public $sky_name;
	public $sky_email;
	public $sky_phone;
	public $sky_mobile;
	public $sky_login;
	public $sky_password;

	
	public function Sky_stakeholderVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_id = $data["sky_id"];
		$this->sky_responsibility_id = $data["sky_responsibility_id"];
		$this->sky_creator_id = $data["sky_creator_id"];
		$this->sky_name = $data["sky_name"];
		$this->sky_email = $data["sky_email"];
		$this->sky_phone = $data["sky_phone"];
		$this->sky_mobile = $data["sky_mobile"];
		$this->sky_login = $data["sky_login"];
		$this->sky_password = $data["sky_password"];
	

	}

}
?>