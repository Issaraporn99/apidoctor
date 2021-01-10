<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('student.crru.ac.th','601463046','issaraporn@5075','601463046');


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {

		$idOrgan = $_GET['idOrgan'];

		$result = mysqli_query($link, "SELECT * FROM `organ` WHERE `idOrgan`= '$idOrgan'");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// while

			echo json_encode($output);

		} //if

	} else echo "Welcome Master UNG";	// if2
   
}	// if1


	mysqli_close($link);
?>