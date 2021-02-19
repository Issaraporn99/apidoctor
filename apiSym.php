<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$group_id = $_GET['group_id'];


// 		$result = mysqli_query($link, "SELECT symptom_name,symptom_id,disease_id,status,yn,count(*)
// FROM symptom 
// LEFT JOIN get_dissym using(`symptom_id`)
// WHERE group_id=$group_id
// group by symptom_name,symptom_id
// order by count(*) desc,`symptom_id` LIMIT 0 , 1");

				$result = mysqli_query($link, "SELECT get_dissym.`symptom_id` , symptom_name, `disease_id` , get_dissym.`des_id` , description.des_name, get_dissym.`group_id` , group_name
FROM symptom
RIGHT JOIN get_dissym
USING ( `symptom_id` )
JOIN `group_symptom` ON get_dissym.`group_id` = group_symptom.`group_id`
JOIN description ON get_dissym.des_id = description.des_id
WHERE get_dissym.`group_id` = $group_id LIMIT 0 , 1");


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