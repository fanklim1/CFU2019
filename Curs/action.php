<?php 

//echo $_GET['name'];
//$a=print_r($_GET)
//htmlspecialchars($_POST['name']);
//if ($a) {
//	echo "Привет",$a ;
//}

 $conection =  @mysqli_connect('localhost', 'root', '');
 $select_db = mysqli_select_db($conection, 'testsystem');
 ?>