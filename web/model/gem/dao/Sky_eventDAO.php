<?php



class Sky_eventDAO {
	
	private $table = "sky_event";
	
	public function Sky_eventDAO()
	{
		//require_once "header.php";

		
		// credentials must be defined in the header.php file
		//mysql_connect($host, $user, $password);
		//mysql_select_db($db) ;	
		
		
	}

	
	private function mapRecordSet($recordset){
	
		$list=array();
		
		while($data=mysql_fetch_array($recordset)){
			$vo = new Sky_eventVO();
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
		$rs = mysql_query("SELECT * FROM ".$this->table." WHERE sky_id = ".$id);
		$list = $this->mapRecordSet($rs);
		return $list[0];		
	}



	public function create($obj)
	{
	
		$requete = "INSERT INTO ".$this->table."
		
		( 
		sky_action,
		sky_description,
		sky_time,
		sky_entity_id,
		sky_table,
		sky_user_id

		)
		
		VALUES
		
		(
		'".mysql_real_escape_string($obj->sky_action)."',
		'".mysql_real_escape_string($obj->sky_description)."',
		'".mysql_real_escape_string($obj->sky_time)."',
		'".mysql_real_escape_string($obj->sky_entity_id)."',
		'".mysql_real_escape_string($obj->sky_table)."',
		'".mysql_real_escape_string($obj->sky_user_id)."'
		
		)";

		if(!mysql_query($requete)) {
			trigger_error("Unable to create Sky_event", E_USER_ERROR);
			return;
		}
				
		return $this->getOne( mysql_insert_id() );
				
	}

	public function update($obj)
	{
		
		$id = $obj->sky_id;

		$requete = "UPDATE ".$this->table." SET 
		sky_action = '".mysql_real_escape_string($obj->sky_action)."',
		sky_description = '".mysql_real_escape_string($obj->sky_description)."',
		sky_time = '".mysql_real_escape_string($obj->sky_time)."',
		sky_entity_id = '".mysql_real_escape_string($obj->sky_entity_id)."',
		sky_table = '".mysql_real_escape_string($obj->sky_table)."',
		sky_user_id = '".mysql_real_escape_string($obj->sky_user_id)."'

		WHERE sky_id =". $id;
	
		if(!mysql_query($requete)){
			trigger_error("Unable to update Sky_event", E_USER_ERROR);
			return ;		
		}
				
		return $this->getOne($id);
		
	}

	public function delete($id)
	{
		$resultat = mysql_query("DELETE FROM ".$this->table." WHERE sky_id = ".$id);
		
		if(!$resultat){
			trigger_error("Unable to delete Sky_event", E_USER_ERROR);
			return;
		}
		else return true ;						
		
	}



}

?>