<?php


require_once "vo/Sky_responsibilityVO.php";
require_once "dao/Sky_responsibilityDAO.php";
require_once "vo/Sky_eventVO.php";
require_once "dao/Sky_eventDAO.php";
require_once "vo/Sky_stakeholderVO.php";
require_once "dao/Sky_stakeholderDAO.php";
require_once "vo/Sky_projectVO.php";
require_once "dao/Sky_projectDAO.php";
require_once "vo/Sky_permissionVO.php";
require_once "dao/Sky_permissionDAO.php";
require_once "vo/Sky_taskVO.php";
require_once "dao/Sky_taskDAO.php";
require_once "vo/Sky_reportVO.php";
require_once "dao/Sky_reportDAO.php";
require_once "vo/Sky_executorVO.php";
require_once "dao/Sky_executorDAO.php";
require_once "vo/Sky_task_dependencyVO.php";
require_once "dao/Sky_task_dependencyDAO.php";
require_once "vo/Sky_subproject_dependencyVO.php";
require_once "dao/Sky_subproject_dependencyDAO.php";



class ApplicationService {
	
	 private $sky_responsibilityDAO;
	 private $sky_eventDAO;
	 private $sky_stakeholderDAO;
	 private $sky_projectDAO;
	 private $sky_permissionDAO;
	 private $sky_taskDAO;
	 private $sky_reportDAO;
	 private $sky_executorDAO;
	 private $sky_task_dependencyDAO;
	 private $sky_subproject_dependencyDAO;
	
		
	public function ApplicationService()
	{
		require_once "header.php";

		
		// credentials must be defined in the header.php file
		mysql_connect($host, $user, $password);
		mysql_select_db($db) ;	

		$this->sky_responsibilityDAO = new Sky_responsibilityDAO;
		$this->sky_eventDAO = new Sky_eventDAO;
		$this->sky_stakeholderDAO = new Sky_stakeholderDAO;
		$this->sky_projectDAO = new Sky_projectDAO;
		$this->sky_permissionDAO = new Sky_permissionDAO;
		$this->sky_taskDAO = new Sky_taskDAO;
		$this->sky_reportDAO = new Sky_reportDAO;
		$this->sky_executorDAO = new Sky_executorDAO;
		$this->sky_task_dependencyDAO = new Sky_task_dependencyDAO;
		$this->sky_subproject_dependencyDAO = new Sky_subproject_dependencyDAO;
	
		
		
	}

	
	// Sky_responsibility

	public function getAllSky_responsibility()
	{
		return $this->sky_responsibilityDAO->getAll();
	}


	public function getOneSky_responsibility($pSky_responsibilityID)
	{
		return $this->sky_responsibilityDAO->getOne($pSky_responsibilityID);
	}


	public function createSky_responsibility($pSky_responsibility)
	{
		return $this->sky_responsibilityDAO->create($pSky_responsibility);
	}


	public function updateSky_responsibility($pSky_responsibility)
	{
		return $this->sky_responsibilityDAO->update($pSky_responsibility);
	}


	public function deleteSky_responsibility($pSky_responsibilityID)
	{
		return $this->sky_responsibilityDAO->delete($pSky_responsibilityID);
	}


	// Sky_event

	public function getAllSky_event()
	{
		return $this->sky_eventDAO->getAll();
	}


	public function getOneSky_event($pSky_eventID)
	{
		return $this->sky_eventDAO->getOne($pSky_eventID);
	}


	public function createSky_event($pSky_event)
	{
		return $this->sky_eventDAO->create($pSky_event);
	}


	public function updateSky_event($pSky_event)
	{
		return $this->sky_eventDAO->update($pSky_event);
	}


	public function deleteSky_event($pSky_eventID)
	{
		return $this->sky_eventDAO->delete($pSky_eventID);
	}


	// Sky_stakeholder

	public function getAllSky_stakeholder()
	{
		return $this->sky_stakeholderDAO->getAll();
	}


	public function getOneSky_stakeholder($pSky_stakeholderID)
	{
		return $this->sky_stakeholderDAO->getOne($pSky_stakeholderID);
	}


	public function createSky_stakeholder($pSky_stakeholder)
	{
		return $this->sky_stakeholderDAO->create($pSky_stakeholder);
	}


	public function updateSky_stakeholder($pSky_stakeholder)
	{
		return $this->sky_stakeholderDAO->update($pSky_stakeholder);
	}


	public function deleteSky_stakeholder($pSky_stakeholderID)
	{
		return $this->sky_stakeholderDAO->delete($pSky_stakeholderID);
	}


	// Sky_project

	public function getAllSky_project()
	{
		return $this->sky_projectDAO->getAll();
	}


	public function getOneSky_project($pSky_projectID)
	{
		return $this->sky_projectDAO->getOne($pSky_projectID);
	}


	public function createSky_project($pSky_project)
	{
		return $this->sky_projectDAO->create($pSky_project);
	}


	public function updateSky_project($pSky_project)
	{
		return $this->sky_projectDAO->update($pSky_project);
	}


	public function deleteSky_project($pSky_projectID)
	{
		return $this->sky_projectDAO->delete($pSky_projectID);
	}


	// Sky_permission

	public function getAllSky_permission()
	{
		return $this->sky_permissionDAO->getAll();
	}


	public function getOneSky_permission($pSky_permissionID)
	{
		return $this->sky_permissionDAO->getOne($pSky_permissionID);
	}


	public function createSky_permission($pSky_permission)
	{
		return $this->sky_permissionDAO->create($pSky_permission);
	}


	public function updateSky_permission($pSky_permission)
	{
		return $this->sky_permissionDAO->update($pSky_permission);
	}


	public function deleteSky_permission($pSky_permissionID)
	{
		return $this->sky_permissionDAO->delete($pSky_permissionID);
	}


	// Sky_task

	public function getAllSky_task()
	{
		return $this->sky_taskDAO->getAll();
	}


	public function getOneSky_task($pSky_taskID)
	{
		return $this->sky_taskDAO->getOne($pSky_taskID);
	}


	public function createSky_task($pSky_task)
	{
		return $this->sky_taskDAO->create($pSky_task);
	}


	public function updateSky_task($pSky_task)
	{
		return $this->sky_taskDAO->update($pSky_task);
	}


	public function deleteSky_task($pSky_taskID)
	{
		return $this->sky_taskDAO->delete($pSky_taskID);
	}


	// Sky_report

	public function getAllSky_report()
	{
		return $this->sky_reportDAO->getAll();
	}


	public function getOneSky_report($pSky_reportID)
	{
		return $this->sky_reportDAO->getOne($pSky_reportID);
	}


	public function createSky_report($pSky_report)
	{
		return $this->sky_reportDAO->create($pSky_report);
	}


	public function updateSky_report($pSky_report)
	{
		return $this->sky_reportDAO->update($pSky_report);
	}


	public function deleteSky_report($pSky_reportID)
	{
		return $this->sky_reportDAO->delete($pSky_reportID);
	}


	// Sky_executor

	public function getAllSky_executor()
	{
		return $this->sky_executorDAO->getAll();
	}


	public function getOneSky_executor($pSky_executorID)
	{
		return $this->sky_executorDAO->getOne($pSky_executorID);
	}


	public function createSky_executor($pSky_executor)
	{
		return $this->sky_executorDAO->create($pSky_executor);
	}


	public function updateSky_executor($pSky_executor)
	{
		return $this->sky_executorDAO->update($pSky_executor);
	}


	public function deleteSky_executor($pSky_executorID)
	{
		return $this->sky_executorDAO->delete($pSky_executorID);
	}


	// Sky_task_dependency

	public function getAllSky_task_dependency()
	{
		return $this->sky_task_dependencyDAO->getAll();
	}


	public function getOneSky_task_dependency($pSky_task_dependencyID)
	{
		return $this->sky_task_dependencyDAO->getOne($pSky_task_dependencyID);
	}


	public function createSky_task_dependency($pSky_task_dependency)
	{
		return $this->sky_task_dependencyDAO->create($pSky_task_dependency);
	}


	public function updateSky_task_dependency($pSky_task_dependency)
	{
		return $this->sky_task_dependencyDAO->update($pSky_task_dependency);
	}


	public function deleteSky_task_dependency($pSky_task_dependencyID)
	{
		return $this->sky_task_dependencyDAO->delete($pSky_task_dependencyID);
	}


	// Sky_subproject_dependency

	public function getAllSky_subproject_dependency()
	{
		return $this->sky_subproject_dependencyDAO->getAll();
	}


	public function getOneSky_subproject_dependency($pSky_subproject_dependencyID)
	{
		return $this->sky_subproject_dependencyDAO->getOne($pSky_subproject_dependencyID);
	}


	public function createSky_subproject_dependency($pSky_subproject_dependency)
	{
		return $this->sky_subproject_dependencyDAO->create($pSky_subproject_dependency);
	}


	public function updateSky_subproject_dependency($pSky_subproject_dependency)
	{
		return $this->sky_subproject_dependencyDAO->update($pSky_subproject_dependency);
	}


	public function deleteSky_subproject_dependency($pSky_subproject_dependencyID)
	{
		return $this->sky_subproject_dependencyDAO->delete($pSky_subproject_dependencyID);
	}


	

}

?>