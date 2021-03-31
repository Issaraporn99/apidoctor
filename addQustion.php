<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		$question = $_GET['question'];
		
		$questionName = $_GET['question_name'];
		$expertiseId = $_GET['expertise_id'];
		$expertiseName = $_GET['expertise_name'];
								
		$sql = "INSERT INTO `question`(`question_id`, `question`, `question_name`, `expertise_id`) VALUES (Null, '$question','$questionName','$expertiseId')";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Master UNG";
   
}
define('LINE_API',"https://notify-api.line.me/api/notify");
 
			$token = "IuSC0OXFDuFpyy6C1G1Bk2VAxkgiKbFVJVHIHhcQJ7q"; //ใส่Token ที่copy เอาไว้
			
			$str = 'สาขา'.$expertiseName.' มีคำถามใหม่ http://student.crru.ac.th/601463046';
				    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
			 
			$res = notify_message($str,$token);
			//print_r($res);
			function notify_message($message,$token){
			 $queryData = array('message' => $message);
			 $queryData = http_build_query($queryData,'','&');
			 $headerOptions = array( 
			         'http'=>array(
			            'method'=>'POST',
			            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
			                      ."Authorization: Bearer ".$token."\r\n"
			                      ."Content-Length: ".strlen($queryData)."\r\n",
			            'content' => $queryData
			         ),
			 );
			 $context = stream_context_create($headerOptions);
			 $result = file_get_contents(LINE_API,FALSE,$context);
			 $res = json_decode($result);
			 return $res;
			}
	mysqli_close($link);
?>