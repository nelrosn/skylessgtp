<?php



class Sky_executorDAO {
	
	private $table = "sky_executor";
	
	public function Sky_executorDAO()
	{
		//require_once "header.php";

		
		// credentials must be defined in the header.php file
		//mysql_connect($host, $user, $password);
		//mysql_select_db($db) ;	
		
		
	}

	
	private function mapRecordSet($recordset){
	
		$list=array();
		
		while($data=mysql_fetch_array($recordset)){
			$vo = new Sky_executorVO();
			$vo->mapObject($data);
			array_push($list, $vo);
		}
		
		return $list ;
	
	}	


	public function getAll()
	{
		$rs = mysql_query("SELECT * FROM ".$this->table);	
		return $this->mapRecordSet($rs);		
	}


	public function getOne($id)
	{
		$rs = mysql_query("SELECT * FROM ".$this->table." WHERE sky_executor_id = ".$id);
		$list = $this->mapRecordSet($rs);
		return $list[0];		
	}



	public function create($obj)
	{
	
		$requete = "INSERT INTO ".$this->table."
		
		( 
		sky_task_id

		)
		
		VALUES
		
		(
		'".mysql_real_escape_string($obj->sky_task_id)."'
		
		)";

		if(!mysql_query($requete)) {
			trigger_error("Unable to create Sky_executor", E_USER_ERROR);
			return;
		}
				
		return $this->getOne( mysql_insert_id() );
				
	}

	public function update($obj)
	{
		
		$id = $obj->sky_executor_id;

		$requete = "UPDATE ".$this->table." SET 
		sky_task_id = '".mysql_real_escape_string($obj->sky_task_id)."'

		WHERE sky_executor_id =". $id;
	
		if(!mysql_query($requete)){
			trigger_error("Unable to update Sky_executor", E_USER_ERROR);
			return ;		
		}
				
		return $this->getOne($id);
		
	}

	public function delete($id)
	{
		$resultat = mysql_query("DELETE FROM ".$this->table." WHERE sky_executor_id = ".$id);
		
		if(!$resultat){
			trigger_error("Unable to delete Sky_executor", E_USER_ERROR);
			return;
		}
		else return true ;						
		
	}



}

?>