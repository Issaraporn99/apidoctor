<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
$before_id = $_GET['before_id'];
$idbf = $_GET['idbf'];

		$sql =  "UPDATE `before` SET `status`=$idbf WHERE `before_id`='$before_id'";


        $result = mysqli_query($link, $sql);
        echo $sql;
        if ($result) {
			echo "true";
			} else {
				echo "false";
			}
		}

	} else echo "Welcome Master UNG";	// if2



	mysqli_close($link);
?>