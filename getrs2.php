<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$result = mysqli_query($link, "SELECT `disease_id` , `disease_name` , expertise_name, `disease_detail` , `disease_cause` , `disease_risk` , `disease_chance` , `disease_treatment` , `disease_defence` , `disease_about` , `expertise_id`
FROM `disease`
INNER JOIN `get_dissym`
USING ( `disease_id` )
JOIN expertise
USING ( expertise_id )
GROUP BY disease_id");

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