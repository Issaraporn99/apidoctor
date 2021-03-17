<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$symptom_id = $_GET['symptom_id'];
		$group_id = $_GET['group_id'];
		$text = $_GET['text'];


		$result = mysqli_query($link, "SELECT `symptom_id` , `symptom_name` , `disease_id` , `img`,COUNT( `symptom_id` ) , `yn` , get_dissym.`group_id`
FROM get_dissym JOIN `symptom` USING ( `symptom_id` ) WHERE `disease_id` NOT IN ( $text ) AND NOT (`yn` IN ('y','u'))
AND get_dissym.group_id =$group_id
GROUP BY `symptom_id` , `symptom_name`
ORDER BY COUNT( * ) DESC , `symptom_id`
LIMIT 0 , 1");

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