<?php



class Sky_taskDAO {
	
	private $table = "sky_task";
	
	public function Sky_taskDAO()
	{
		//require_once "header.php";

		
		// credentials must be defined in the header.php file
		//mysql_connect($host, $user, $password);
		//mysql_select_db($db) ;	
		
		
	}

	
	private function mapRecordSet($recordset){
	
		$list=array();
		
		while($data=mysql_fetch_array($recordset)){
			$vo = new Sky_taskVO();
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
		sky_subproject_id,
		sky_title,
		sky_description,
		sky_start,
		sky_end,
		sky_status

		)
		
		VALUES
		
		(
		'".mysql_real_escape_string($obj->sky_subproject_id)."',
		'".mysql_real_escape_string($obj->sky_title)."',
		'".mysql_real_escape_string($obj->sky_description)."',
		'".mysql_real_escape_string($obj->sky_start)."',
		'".mysql_real_escape_string($obj->sky_end)."',
		'".mysql_real_escape_string($obj->sky_status)."'
		
		)";

		if(!mysql_query($requete)) {
			trigger_error("Unable to create Sky_task", E_USER_ERROR);
			return;
		}
				
		return $this->getOne( mysql_insert_id() );
				
	}

	public function update($obj)
	{
		
		$id = $obj->sky_id;

		$requete = "UPDATE ".$this->table." SET 
		sky_subproject_id = '".mysql_real_escape_string($obj->sky_subproject_id)."',
		sky_title = '".mysql_real_escape_string($obj->sky_title)."',
		sky_description = '".mysql_real_escape_string($obj->sky_description)."',
		sky_start = '".mysql_real_escape_string($obj->sky_start)."',
		sky_end = '".mysql_real_escape_string($obj->sky_end)."',
		sky_status = '".mysql_real_escape_string($obj->sky_status)."'

		WHERE sky_id =". $id;
	
		if(!mysql_query($requete)){
			trigger_error("Unable to update Sky_task", E_USER_ERROR);
			return ;		
		}
				
		return $this->getOne($id);
		
	}

	public function delete($id)
	{
		$resultat = mysql_query("DELETE FROM ".$this->table." WHERE sky_id = ".$id);
		
		if(!$resultat){
			trigger_error("Unable to delete Sky_task", E_USER_ERROR);
			return;
		}
		else return true ;						
		
	}



}

?>