 <?php 
    session_start();
    
     require('action.php');

     if(isset($_POST['username_log']) and isset($_POST['password_log'])){


     $username_log = $_POST['username_log'];
     $password_log = $_POST['password_log'];
     
     $query_log ="SELECT * FROM regist WHERE username='$username_log' and password='$password_log'";
        $result_log = mysqli_query($conection, $query_log) or die(mysqli_erro($conection));
        $count = mysqli_num_rows($result_log);
        if ($count == 1) {
         $_SESSION['username_log'] = $_REQUEST['username_log']; // сессия создание 
         
          	$msg= "$username_log";
            echo $msg;

        }else {
        $fmsg = "Error ";
        echo $fmsg;
        
        }

} else{
    echo "Bad reqest";
}   
     
 ?>