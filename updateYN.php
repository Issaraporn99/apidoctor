<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		foreach($_GET['diss'] as $row=>$art){
			$getdata1=(int)$_GET['dess'][$row];
	        $getdata2=(int)$_GET['diss'][$row];
	       

		// $sql =  "UPDATE `get_dissym` SET `yn`= 'y' WHERE `symptom_id`=$getdata1 and `disease_id`=$getdata2";
		$sql =  "UPDATE `get_dissym` SET `yn`= 'y' WHERE `des_id`=$getdata1 and `disease_id`=$getdata2";

        $result = mysqli_query($link, $sql);
        echo $sql;
        if ($result) {
			echo "true";
			} else {
				echo "false";
			}
		}

	} else echo "Welcome Master UNG";	// if2
   
}	


	mysqli_close($link);
?>