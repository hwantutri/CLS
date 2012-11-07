<?php

include_once 'database.php';

class Login{
	public function __construct(){
		$db = new Database();
	}
	public function validate($username,$password){
		$pass = md5($password);
		$result = mysql_query("select * from faculty where faculty_uid='$username' and password='$pass'");
			$user_data=mysql_fetch_array($result);
			$no_rows = mysql_num_rows($result);
			if($no_rows == 1){
				$_SESSION['user_new'] = true;
				$_SESSION['uid_new'] = $user_data['faculty_uid'];
				$start = date('Y-m-d H:i:s');
				$curr_day = date('Y-m-d');
				mysql_query("UPDATE faculty SET status=1 where faculty_uid='$username'");
				$the_same_date = mysql_query("SELECT * from daily_timer where hours_per_day LIKE '%$curr_day%' AND f_id='$username'");
				$no_of_same_date = mysql_num_rows($the_same_date);
				if($no_of_same_date > 0){
					mysql_query("UPDATE daily_timer SET start_time='$start' where hours_per_day LIKE '%$curr_day%' AND f_id='$username'");
				}else{
					mysql_query("INSERT INTO daily_timer (hours_per_day,end_time,start_time,f_id) VALUES ('new_stamp','','$start','$username')");
				}
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
		$result = mysql_query("select name from faculty where faculty_uid = '$uid'");
		$user_data = mysql_fetch_array($result);
		echo $user_data['name'];
	}
	//logout
	//public function logout(){
	//	$_SESSION['user_new'] = FALSE;
	//	session_destroy();
	//}
}
?>