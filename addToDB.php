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
        
           $sql = "INSERT INTO `get_dissym`( `symptom_id`, `disease_id`, `status`,`yn`) VALUES ('$getdata1','$getdata2','$getdata3','a')";
           
           		$result = mysqli_query($link, $sql);
           
		}

  
           if ($result) {
			echo "true";
			} else {
				echo "false";
			}

	} else echo "Welcome Master UNG";
   
}


	mysqli_close($link);
?>