<?php


class Sky_executorVO {

//	AMFPHP only
//	var $_explicitType="vo.Sky_executorVO";
	
	public $sky_executor_id;
	public $sky_task_id;

	
	public function Sky_executorVO() 
	{
		
	}
	
	public function mapObject($data)
	{
		
		$this->sky_executor_id = $data["sky_executor_id"];
		$this->sky_task_id = $data["sky_task_id"];
	

	}

}
?>