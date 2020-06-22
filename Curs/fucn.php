<?php
session_start();
require_once 'functions_5.php';

  	 require('action.php'); 
  	 $tests = get_tests();


				
			 if($tests){
			 	foreach($tests as $test){
					
					
			 		echo iconv('UTF-8', 'CP866', $test['id'].$test['test_name'].' ' );
			 		
							 if (($test['test_name'])&&($test['id']))  continue;
							}
						} 
						if(isset($_POST['id'])){
				$test_id = $_POST['id'];
	$test_data = get_test_data($test_id);
	print_r($test_data); 
	  // foreach ($test_data as $key) {
	  // 	echo $test_data[$key];
	  // 	 $answer = $_POST['answer'];

	  }

								// $test_id = $_POST[$test['id']];
								 
								 
?>
							 	
				
