<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');
//$link = mysqli_connect('localhost','root','','doctor');

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
		foreach($_GET['statuss'] as $row=>$art){
           $getdata1=(int)$_GET['symm'][$row];
           $getdata2=(int)$_GET['diss'][$row];
           $getdata3=(int)$_GET['statuss'][$row];
           print_r($_GET['statuss']);
           $sql = "INSERT INTO `get_dissym`( `symptom_id`, `disease_id`, `status`) VALUES ('$getdata1','$getdata2','$getdata3')";
           $result = mysqli_query($link, $sql);
           echo $sql;
           if ($result) {
			echo "true";
			} else {
				echo "false";
			}
		}
		// for($i=0;$i<count($_GET['symm']);$i++){
		// $sql = "INSERT INTO `get_dissym`( `symptom_id`, `disease_id`, `status`) VALUES ('$symptom_id[$i]','$disease_id[$i]','$status[$i]')";
		// 						}						
		

		// $result = mysqli_query($link, $sql);

		// if ($result) {
		// 	echo "true";
		// } else {
		// 	echo "false";
		// }

	} else echo "Welcome Master UNG";
   
}


	mysqli_close($link);
?>