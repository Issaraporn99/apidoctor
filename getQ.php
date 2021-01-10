<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$result = mysqli_query($link, "SELECT `question_id`,`question_name`,`question`,doctorname,`question_date`,answer_name,
			COUNT(answer_id),answer_id FROM `question` LEFT join answer USING(`question_id`) LEFT JOIN user USING(id) group by question.`question_id` ORDER BY question.`question_date` DESC");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// whiles

			echo json_encode($output);

		} //if

	} else echo "Welcome Master UNG";	// if2
   
}	// if1


	mysqli_close($link);
?>