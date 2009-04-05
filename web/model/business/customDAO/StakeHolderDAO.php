<?php
	$incSky_stakeholderDAO = "../model/gem/dao/Sky_stakeholderDAO.php";
	if(!file_exists($incSky_stakeholderDAO))
		$incSky_stakeholderDAO = "model/gem/dao/Sky_stakeholderDAO.php";	

    require_once($incSky_stakeholderDAO);
	
	class StakeHolderDAO extends Sky_stakeholderDAO {
		public static $PERMISSION_DIRECTOR = 1;
		public static $PERMISSION_MANAGER  = 2;
		public static $PERMISSION_ANALYST  = 3;
		public static $PERMISSION_EXECUTOR = 4;
		
		public function getMatch(Sky_stakeholderVO $obj) {
			$whereQuery = " WHERE 1=1";
			if( !is_null($obj->sky_id) ) $whereQuery .= " AND sky_id=" . $obj->sky_id;
			if( !is_null($obj->sky_responsibility_id) ) $whereQuery .= " AND sky_responsibility_id=" . $obj->sky_responsibility_id;
			if( !is_null($obj->sky_creator_id) ) $whereQuery .= " AND sky_creator_id=" . $obj->sky_creator_id;
			if( !is_null($obj->sky_name) ) $whereQuery .= " AND sky_name='" . $obj->sky_name . "'";
			if( !is_null($obj->sky_email) ) $whereQuery .= " AND sky_email='" . $obj->sky_email . "'";
			if( !is_null($obj->sky_phone) ) $whereQuery .= " AND sky_phone='" . $obj->sky_phone . "'";
			if( !is_null($obj->sky_mobile) ) $whereQuery .= " AND sky_mobile='" . $obj->sky_mobile . "'";
			if( !is_null($obj->sky_login) ) $whereQuery .= " AND sky_login='" . $obj->sky_login . "'";
			if( !is_null($obj->sky_password) ) $whereQuery .= " AND sky_password='" . $obj->sky_password . "'";
			
			$rs = mysql_query("SELECT * FROM " . $this->table . $whereQuery);
			
			if($rs) $list = $this->mapRecordSet($rs);
			return $list[0];
		}
	}
?>