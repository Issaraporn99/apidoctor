<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$organ_id = $_GET['organ_id'];


		// $result = mysqli_query($link, "SELECT `group_id`,`group_name`,symptom_name,symptom_id,organ_id,disease_id
		// 								FROM `group_symptom`
		// 								left join symptom 
		// 								using(group_id) 
		// 								LEFT JOIN disease_symptoms USING ( `symptom_id` )
		// 								WHERE group_symptom.organ_id =$organ_id
		// 								group by group_id");
		$result = mysqli_query($link, "SELECT `group_id` , `group_name` , symptom_name, symptom_id, organ_id,organ_name
										FROM `group_symptom`
										LEFT JOIN symptom
										USING ( group_id )
										JOIN organ USING ( organ_id )
										WHERE group_symptom.organ_id =$organ_id
										GROUP BY CONVERT(  group_name USING tis620 ) ASC");

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
