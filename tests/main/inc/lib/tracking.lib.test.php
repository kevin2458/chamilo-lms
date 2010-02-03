<?php
require_once(api_get_path(LIBRARY_PATH).'tracking.lib.php');
require_once(api_get_path(LIBRARY_PATH).'document.lib.php');

class TestTracking extends UnitTestCase {

	function testget_first_connection_date() {
		global $_user;
		$student_id=$_user;
		$res=Tracking::get_first_connection_date($student_id);
	 	if(!is_bool($res)){
	 		$this->assertTrue(is_string($res));
	 	}
	}

	function testget_first_connection_date_on_the_course() {
		global $_course;
		$student_id='';
		$course_code=$_course;
		$res=Tracking::get_first_connection_date_on_the_course($student_id, $course_code);
	 	if(!is_null($res))$this->assertTrue(is_bool($res));
	 	//var_dump($res);
	}
	
	
	function testchat_connections_during_last_x_days_by_course() {
	 	global $_course;
	 	$course_code=$_course;
		$last_days=8;
		$this->tracking = new Tracking();
		$res=$this->tracking->chat_connections_during_last_x_days_by_course($course_code,$last_days);
		$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
        //var_dump($docman);
    }

	function testcount_course_per_student() {
		$user_id=1;
		$this->tracking = new Tracking();
		$res=$this->tracking->count_course_per_student($user_id);
		$this->assertTrue(is_object($this->tracking));
		$this->assertTrue(is_numeric($res));
		//var_dump($res);
	}

	function testcount_login_per_student() {
		$student_id=1;
		$course_code=001;
		$this->tracking = new Tracking();
		$res=$this->tracking->count_login_per_student($student_id, $course_code);
		$this->assertTrue(is_object($this->tracking));
		$this->assertTrue(is_numeric($res));
		//var_dump($res);
	}

	function testcount_number_of_forums_by_course() {
	 	global $_course;
	 	$course_code=$_course;
		$this->tracking = new Tracking();
		$res=$this->tracking->count_number_of_forums_by_course($course_code);
		$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testcount_number_of_posts_by_course() {
	 	global $_course;
	 	$course_code=$_course;
		$this->tracking = new Tracking();
		$res=$this->tracking->count_number_of_posts_by_course($course_code);
		$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testcount_number_of_threads_by_course() {
		global $_course;
	 	$course_code=$_course;
		$this->tracking = new Tracking();
		$res=$this->tracking->count_number_of_threads_by_course($course_code);
		$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testcount_student_assignments() {
	 	require_once (api_get_path(LIBRARY_PATH) . 'course.lib.php');
		global $_user,$_course;
	 	$student_id=$_user;
	 	$course_code=$_course;
		$a_course = CourseManager :: get_course_information($course_code);
		$this->tracking = new Tracking();
		$res=$this->tracking->count_student_assignments($student_id, $course_code);
		$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testcount_student_downloaded_documents() {
	 	global $_user,$_course;
	 	$student_id=$_user;
	 	$course_code=$_course;
	 	$this->tracking = new Tracking();
	 	$res=$this->tracking->count_student_downloaded_documents($student_id, $course_code);
	 	$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testcount_student_messages() {
	 	require_once (api_get_path(LIBRARY_PATH) . 'course.lib.php');
		global $_user,$_course;
	 	$student_id=$_user;
	 	$course_code=$_course;
	 	$a_course = CourseManager :: get_course_information($course_code);
		$this->tracking = new Tracking();
		$res=$this->tracking->count_student_messages($student_id, $course_code);
		$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testcount_student_visited_links() {
	 	global $_user,$_course;
	 	$student_id=$_user;
	 	$course_code=$_course;
	 	$this->tracking = new Tracking();
	 	$res=$this->tracking->count_student_visited_links($student_id, $course_code);
	 	$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testget_average_test_scorm_and_lp () {
	 	global $_user,$_course;
	 	$user_id=$_user;
	 	$course_id=$_course;
	 	$this->tracking = new Tracking();
	 	$res=$this->tracking->get_average_test_scorm_and_lp($user_id,$course_id);
	 	$this->assertTrue(is_object($this->tracking));

		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testget_avg_student_exercise_score() {
	 	global $_user,$_course;
	 	$student_id=$_user;
	 	$course_code=$_course;
	 	$this->tracking = new Tracking();
	 	$res=$this->tracking->get_avg_student_exercise_score($student_id, $course_code);
	 	$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testget_avg_student_progress() {
		require_once (api_get_path(LIBRARY_PATH) . 'course.lib.php');
		global $_user,$_course;
	 	$student_id=$_user;
	 	$course_code=$_course;
	 	$this->tracking = new Tracking();
	 	$res=$this->tracking->get_avg_student_progress($student_id, $course_code);
	 	$this->assertTrue(is_object($this->tracking));
		if(!is_numeric($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }

	 function testget_avg_student_score() {
	 	global $_user,$_course;
		$student_id=$_user;
	 	$course_code=$_course;
	 	$res=$this->tracking->get_avg_student_score($student_id, $course_code, $lp_ids=array());
		if(!is_string($res))$this->assertTrue(is_null($res));
		//var_dump($res);
	 }


	 function testget_course_list_in_session_from_student() {
	 	global $_user;
		$user_id = $_user;
	 	$session_id= 1;
	 	$res=Tracking::get_course_list_in_session_from_student($user_id, $session_id);
	 	$this->assertTrue(is_array($res));
	 }


	function testget_courses_followed_by_coach() {
		$coach_id='';
		$res=Tracking::get_courses_followed_by_coach($coach_id, $id_session='');
	 	if(!is_null($res))$this->assertTrue(is_array($res));
	 	//var_dump($res);
	}

	function testget_courses_list_from_session() {
		$session_id='';
		$res=Tracking::get_courses_list_from_session($session_id);
	 	if(!is_null($res))$this->assertTrue(is_array($res));
	 	//var_dump($res);
	}

	function testget_inactives_students_in_course() {
		global $_course;
		$course_code = $_course; 
		$since='2010-10-02';
		$session_id='';
		$res=Tracking::get_inactives_students_in_course($course_code, $since, $session_id);
	 	if(!is_null($res))$this->assertTrue(is_array($res));
	 	//var_dump($res);
	}

	function testget_sessions_coached_by_user() {
		$coach_id='';
		$res=Tracking::get_sessions_coached_by_user($coach_id);
	 	if(!is_null($res))$this->assertTrue(is_array($res));
	 	//var_dump($res);
	}

	function testget_student_followed_by_coach() {
		$coach_id='';
		$res=Tracking::get_student_followed_by_coach($coach_id);
	 	if(!is_null($res))$this->assertTrue(is_array($res));
	 	//var_dump($res);
	}

	function testget_student_followed_by_coach_in_a_session() {
		$id_session='';
		$coach_id='';
		$res=Tracking::get_student_followed_by_coach_in_a_session($id_session, $coach_id);
	 	if(!is_null($res))$this->assertTrue(is_array($res));
	 	//var_dump($res);
	}

	function testget_student_followed_by_drh() {
		$hr_dept_id='';
		$res=Tracking::get_student_followed_by_drh($hr_dept_id);
	 	if(!is_null($res))$this->assertTrue(is_array($res));
	 	//var_dump($res);
	}

	function testget_time_spent_on_the_course() {
		$user_id='';
		$course_code='';
		$res=Tracking::get_time_spent_on_the_course($user_id, $course_code);
	 	if(!is_null($res))$this->assertTrue(is_numeric($res));
	 	//var_dump($res);
	}

	function testget_time_spent_on_the_platform(){
		$user_id='';
		$res=Tracking::get_time_spent_on_the_platform($user_id);
	 	if(!is_null($res))$this->assertTrue(is_numeric($res));
	 	//var_dump($res);
	}

	function testis_allowed_to_coach_student() {
		$coach_id='';
		$student_id='';
		$res=Tracking::is_allowed_to_coach_student($coach_id, $student_id);
	 	if(!is_null($res))$this->assertTrue(is_bool($res));
	 	//var_dump($res);
	}
	
	function testchat_last_connection() {
		require_once (api_get_path(LIBRARY_PATH) . 'course.lib.php');
		global $_course;
		$student_id= $_POST['student_id'];
		$course_code= $_course;
		$this->tracking = new Tracking();
		$res=$this->tracking->chat_last_connection($student_id,$course_code);
		$this->assertTrue(is_object($this->tracking));
		if(!is_string($res))$this->assertTrue(is_null($res));
	}
	
		function testget_last_connection_date() {
		$student_id=1;
		$res=Tracking::get_last_connection_date($student_id);
	 	if(!is_bool($res))$this->assertTrue(is_string($res));
	}

	function testget_last_connection_date_on_the_course() {
		$student_id='';
		$course_code='';
		$res=Tracking::get_last_connection_date_on_the_course($student_id, $course_code);
	 	if(!is_null($res))$this->assertTrue(is_bool($res));
	 	//var_dump($res);
	}
}
?>
