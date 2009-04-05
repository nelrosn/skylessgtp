<?php
	$incApplicationService = "../model/gem/ApplicationService.php";
	$incStakeHolderDAO	   = "../model/business/customDAO/StakeHolderDAO.php";
	if(!file_exists($incApplicationService))
		$incApplicationService = "model/gem/ApplicationService.php";
	if(!file_exists($incStakeHolderDAO))
		$incStakeHolderDAO = "model/business/customDAO/StakeHolderDAO.php";
	
	require_once($incApplicationService);
	require_once($incStakeHolderDAO);
	
	class CustomApplicationService extends ApplicationService {
		public static $TABLE_PROJECT = "sky_project";
		
		private $StakeHolderDAO;
		
		public function CustomApplicationService() {
			parent::ApplicationService();
			$this->StakeHolderDAO = new StakeHolderDAO();
		}
		
		//StakeHolders
		public function getMatchStakeHolder(Sky_stakeholderVO $obj) {
			return $this->StakeHolderDAO->getMatch($obj);
		}
		
		//Events
		public function registerEvent($action, $description = null, $entity = null, $table = null) {
			session_start();
			$user = unserialize($_SESSION["user"]);
			session_write_close();
			
			$date = new DateTime();
			$event = new Sky_eventVO();
			
			$event->sky_action	= $action;
			$event->sky_time	= $date->format('Y-m-d H:i:s');
			$event->sky_user_id = $user->sky_id;
			if(!is_null($description)) $event->sky_description = $description;
			if(!is_null($entity)) $event->sky_entity_id = $entity;
			if(!is_null($table)) $event->sky_table = $table;
			
			$this->createSky_event($event);
		}
	}
?>