<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$expertiseId = $_GET['expertise_id'];
		
												
		$sql = "SELECT * FROM `expertise` WHERE `expertise_id` ='$expertiseId'";

		$result = mysqli_query($link, $sql);

			if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// whiles

			echo json_encode($output);

		} 

	} else echo "Welcome Master UNG";
   
}
	mysqli_close($link);
?>