<?php



class Sky_stakeholderDAO {
	
	public $table = "sky_stakeholder";
	
	public function Sky_stakeholderDAO()
	{
		//require_once "header.php";

		
		// credentials must be defined in the header.php file
		//mysql_connect($host, $user, $password);
		//mysql_select_db($db) ;	
		
		
	}

	
	public function mapRecordSet($recordset){
	
		$list=array();
		
		while($data=mysql_fetch_array($recordset)){
			$vo = new Sky_stakeholderVO();
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
		sky_responsibility_id,
		sky_creator_id,
		sky_name,
		sky_email,
		sky_phone,
		sky_mobile,
		sky_login,
		sky_password

		)
		
		VALUES
		
		(
		'".mysql_real_escape_string($obj->sky_responsibility_id)."',
		'".mysql_real_escape_string($obj->sky_creator_id)."',
		'".mysql_real_escape_string($obj->sky_name)."',
		'".mysql_real_escape_string($obj->sky_email)."',
		'".mysql_real_escape_string($obj->sky_phone)."',
		'".mysql_real_escape_string($obj->sky_mobile)."',
		'".mysql_real_escape_string($obj->sky_login)."',
		'".mysql_real_escape_string($obj->sky_password)."'
		
		)";

		if(!mysql_query($requete)) {
			trigger_error("Unable to create Sky_stakeholder", E_USER_ERROR);
			return;
		}
				
		return $this->getOne( mysql_insert_id() );
				
	}

	public function update($obj)
	{
		
		$id = $obj->sky_id;

		$requete = "UPDATE ".$this->table." SET 
		sky_responsibility_id = '".mysql_real_escape_string($obj->sky_responsibility_id)."',
		sky_creator_id = '".mysql_real_escape_string($obj->sky_creator_id)."',
		sky_name = '".mysql_real_escape_string($obj->sky_name)."',
		sky_email = '".mysql_real_escape_string($obj->sky_email)."',
		sky_phone = '".mysql_real_escape_string($obj->sky_phone)."',
		sky_mobile = '".mysql_real_escape_string($obj->sky_mobile)."',
		sky_login = '".mysql_real_escape_string($obj->sky_login)."',
		sky_password = '".mysql_real_escape_string($obj->sky_password)."'

		WHERE sky_id =". $id;
	
		if(!mysql_query($requete)){
			trigger_error("Unable to update Sky_stakeholder", E_USER_ERROR);
			return ;		
		}
				
		return $this->getOne($id);
		
	}

	public function delete($id)
	{
		$resultat = mysql_query("DELETE FROM ".$this->table." WHERE sky_id = ".$id);
		
		if(!$resultat){
			trigger_error("Unable to delete Sky_stakeholder", E_USER_ERROR);
			return;
		}
		else return true ;						
		
	}



}

?>