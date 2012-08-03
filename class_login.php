<?php

include_once 'database.php';

class Login{
	public function __construct(){
		$db = new Database();
	}
	public function validate($username,$password){
		$result = mysql_query("select * from faculty where Fac_id='$username' and Password='$password'");
			$user_data=mysql_fetch_array($result);
			$no_rows = mysql_num_rows($result);
			if($no_rows == 1){
				$_SESSION['user_new'] = true;
				$_SESSION['uid_new'] = $user_data['id'];
				return TRUE;
			}else{
				return FALSE;
			}
	}
	//get sessions
	public function get_session(){
		return $_SESSION['user_new'];
	}
	//get name
	public function get_name($uid){
		$result = mysql_query("select Name from faculty where Fac_id = '$uid'");
		$user_data = mysql_fetch_array($result);
		echo $user_data['name'];
	}
	//logout
	public function logout(){
		$_SESSION['user_new'] = FALSE;
		session_destroy();
	}
}
?>