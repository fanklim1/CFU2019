
  	 <?php 
  	 require('action.php');

  	 if(isset($_POST['username']) && isset($_POST['password'])){
  	 $username = $_POST['username'];
  	  $email = $_POST['email'];
  	  $password = $_POST['password'];
  	  $query = "INSERT INTO regist (username, email, password) VALUES ('$username', '$email', '$password')"; 
  	  $result = mysqli_query($conection, $query); 

  	  if ($result){
  	  	$smsg="You are successfully registered";

  	}
  	 else {
  	 	$smsg ="Error";
  	 
  	 }
  	 echo $smsg;

  	 } else{
  	 	echo "Bad reqest";
  	 } ?>
	
	

