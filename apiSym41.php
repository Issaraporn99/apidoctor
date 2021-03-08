<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$text = $_GET['text'];


		// $result = mysqli_query($link, "SELECT symptom_id,disease_id,status FROM `symptom`LEFT JOIN disease_symptoms 
		// 							   USING ( `symptom_id` )
		// 							   WHERE group_id =$group_id");
		
		$result = mysqli_query($link, "SELECT `symptom_id` , `disease_id`,group_id
FROM `disease_symptoms`
LEFT JOIN symptom
USING ( `symptom_id` )
LEFT JOIN group_symptom 
USING ( `group_id` )
WHERE `disease_id`
IN ( $text ) and symptom_id IS NOT NULL");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// whiles

			echo json_encode($output);

		} //if

	} else echo "Welcome Master UNG";	// if2
   
}


	mysqli_close($link);
?>