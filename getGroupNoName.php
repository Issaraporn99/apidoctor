<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$organ_id = $_GET['organ_id'];


		$result = mysqli_query($link, "SELECT symptom_id, disease_id, disease_symptoms.group_id, des_id
FROM `group_symptom`
LEFT JOIN symptom
USING ( group_id )
LEFT JOIN disease_symptoms
USING ( `symptom_id` )
WHERE group_symptom.organ_id =$organ_id");

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