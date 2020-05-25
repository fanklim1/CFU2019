<?php session_start();
 // if(isset($_REQUEST['username_log'])&&) {
 // 	$_SESSION['username_log'] = $_REQUEST['username_log'];
 // 	echo '($_SESSION)';
 // }
 ?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
	<link rel="stylesheet" href="web_style_3.css">
 	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <title>Система тестирования  </title>
  </head>
  <body>

  	 <?php 
  	 require('action.php');

  	 if(isset($_POST['username']) && isset($_POST['password'])){
  	 $username = $_POST['username'];
  	  $email = $_POST['email'];
  	  $password = $_POST['password'];
  	  $query = "INSERT INTO regist (username, email, password) VALUES ('$username', '$email', '$password')"; 
  	  $result = mysqli_query($conection, $query); 

  	  if ($result){
  	  	$smsg="Регистрация прошла успешно";

  	}
  	 else {
  	 	$fsmsg ="Ошибка";
  	 }
  	 } ?>
	
	<?php 
	require_once 'functions_5.php';

  	 require('action.php'); 
  	 $tests = get_tests();

if(isset($_GET['test'])){
	$test_id =(int)$_GET['test'];
	$test_data = get_test_data($test_id);
	// print_arr($test_data); 
	$_SESSION['test___id'] = $_REQUEST['?test=<?=$test["id"]?']; // попытка присвоить id
}
	if(is_array($test_data)){
	 $count_questions = count($test_data);
	}
?>

	 <?php 
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

        }else{
        $fmsg = "Ошибка ";

        }
} ?>

	<header class="header">
		
			<div class="row">
				<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
			<div class="col-lg-3">
			<a href="#" target="_blank" class="navbar-brand"><img src="https://x-lines.ru/letters/i/cyrillicfancy/1329/000000/20/0/4no7bqgto8eafwfi4n6pbcby4gbpbpqto8eafwfa4gypbxsosmembwf74nhpdda.png" border="0" /></a>
		</div>
	
		<div class="col-lg-5 ml-auto ">
			<?php if(isset($msg)):?>
				<ul class="menu d-flex justify-content-center">
					<li class="menu_item">
						<h3><?=$msg?></h3>

					</li>
					<li class="menu_item">
						<a href="logout.php" >Выйти</a>
						
					</li>
				</ul>
				<?php else:?> 
				<ul class="menu d-flex justify-content-center">
					<li class="menu_item">
						<a href="#" data-toggle="modal" data-target="#exampleModalLog">Войти</a>
					</li>
					<li class="menu_item">
						<a href="#" data-toggle="modal"  data-target="#exampleModal">Регистрация</a>
					</li>
				</ul>
				<?php endif; ?>
			</nav>
		</div>

		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-ml-auto">
				<div class="offer">
					<h1 class="offer_title">Система тестирования</h1>
					<div class="offer_intro">
						Узнай что ты знаешь!
						
					</div>
					<p class="offer_text">
						Система тестирования ФТИ – это профессиональный инструмент автоматизации процесса тестирования и обработки результатов, который предназначен для тестирование и контроль знаний учащихся.
					</p>
			
					
				</div>


			</div>
			<div class="col-lg-5 ml-auto ">
				<img  class="ipad"  src="img/imgonline-com-ua-Transparent-backgr-eta7GXsPH9FGxHB.png"/>
			</div>

		 </div>
	</div>
	</header>
	<section class="sec1">
		<div class="cyn">  <!-- Изменить -->
			<div class="row">
				<div class="col-lg-12">
				<div class="title">
					<h2 class="title_main">
						Выберите тест
					</h2>
				
				</div>
					
			
			</div>

		</div>
		<!--  -->

			<div class="row">
				<div class="container "> <!-- Изменить --> 
					<div class="wrap ">
						
						<?php if( $tests ): ?>
								<?php foreach($tests as $test): ?>
						<form action= "" method="get" >
						<div class="infBlock">
							
							<h4 class="procent"><?=$test['test_name']?></h4>
							<p class="textInform">Тест предназначен для 1 курса специальности  Иноформатика и Вычислительная техника группы ИВТ 191 и ИВТ 192 </p>
						<a class="btn_infBlock"  <?php if ((isset($msg)) /*or (isset($smsg))*/): ?> href ="tests.php?test=<?=$test['id']?>"  <?php else: ?> data-target="#exampleModalLog" <?php endif;?>?test=<?=$test['id']?> > Перейти </a>

						</div>
						</form>
						<?php if (($test['test_name'])&&($test['id'])) continue; ?>
						<form action="" method="get">
						<div class="infBlock">
							<h4 class="procent"><?=$test['test_name']?></h4>
							<p class="textInform">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. До безорфографичный, правилами.</p>

							<a href="?test=<?=$test['id']?>" class="btn_infBlock">Перейти</a>
						</div>
						
						</form>
							<form action="" method="get">
						<div class="infBlock">
							<h4 class="procent"><?=$test['test_name']?></h4>
							<p class="textInform">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. До безорфографичный, правилами.</p>
							<a href="?test=<?=$test['id']?>"  class="btn_infBlock">Перейти</a>
							<?php if (($test['test_name'])&&($test['id'])) continue; ?>
						</div>
						</form>
					</div>
				

				</div>

			</div>


				<div class="row">
				<div class="container"> <!-- Изменить --> 
					<div class="wrap ">
						
						<div class="infBlock">
							<form action="" method="get">
							<h4 class="procent"><?=$test['test_name']?></h4>
							<p class="textInform">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. До безорфографичный, правилами.</p>
							<a href="#" class="btn_infBlock">Перейти</a>
							</form>
						</div>
						
						<div class="infBlock">
							<form action="" method="get">
							<h4 class="procent">5</h4>
							<p class="textInform">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. До безорфографичный, правилами.</p>
							<a href="#" class="btn_infBlock">Перейти</a>
							<?php if (($test['test_name'])&&($test['id'])) continue; ?>
						</form>
						</div>
						<div class="infBlock">
							<form action="" method="get">
							<h4 class="procent">6</h4>
							<p class="textInform">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. До безорфографичный, правилами.</p>
							<a href="#" class="btn_infBlock">Перейти</a>
							<?php if (($test['test_name'])&&($test['id'])) continue; ?>
						</form>
						</div>
						
					</div>
				

				</div>
					
			</div>
			<?php endforeach; ?>
							<?php endif; ?>
		
	</section>

	
	<footer class="footer">
		<div class="container"> 
			<div class="row">
				<div class="col-md-12">
					<div class="credits">
						
						 Крымский федеральный университет 
						 <p>Физико-технический институт</p>
						 <p>2014-2020</p>
					</div>

				</div>


			</div>

		</div>

	</footer>

	
	 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form action="" method="post">
						<div class="form-froup">
							<label for="exampleInputEmail">Адрес электронной почты</label>
							<input type="email" name ="email" class="form-control" id="exampleInputEmail" aria-describdby="emailHelp" placeholder="Email"	required>
							<small id="emailHelp"  class="form-text text-muted">Введите адрес электронной почты</small>
						</div>	
							

							<div class="form-froup">
							<label for="exampleInputUsername">Имя пользователя </label>
							<input type="name" name="username" class="form-control" id="exampleInputUsername" aria-describdby="emailHelp" placeholder="Имя"	required>
							<small id="emailHelp" class="form-text text-muted">Введите имя пользователя</small>
						</div>	


						<div class="form-froup">
							<label for="exampleInputPass">Пароль</label>
							<input type="password" name="password" class="form-control" id="exampleInputpass"  placeholder="Пароль" required>
							<small id="passHelp" class="form-text text-muted">Введите пароль</small>
						</div>


						<!--
						<div class="form-froup">
							<label for="exampleInputCheckPass">Подвердите пароль</label>
							<input type="password" class="form-control" id="exampleInputCheckPass"  placeholder="Пароль" required>
							<small id="passHelp" class="form-text text-muted">Пароль должен содержать 8 символов</small>
						</div>	
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Запомнить меня 
							</label>
						</div>
						-->
						<?php if(isset($smsg)){ ?><div class="alert alter-success" role="alter"> <?php echo $smsg; ?> </div> <?php }?>
						 <?php if(isset($fsmsg)){ ?>
						 <div class="alert alter-danger" role="alter"> <?php echo $fsmsg; ?> </div> <?php }?>
						<button class="btn btn-primary">Отправить</button> 	
						</form>

					</div>
				</div>

			</div>

		</div>


	</div>
	

	 <div class="modal fade" id="exampleModalLog" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabelLog">Вход</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form action ="" method="POST">
						<div class="form-froup">
							<label for="exampleInputEmailLog">Имя</label>
							<input type="text" name="username_log" class="form-control" id="exampleInputEmailLog" aria-describdby="emailHelp" placeholder="Имя"	required>
							<small id="emailHelpLog" class="form-text text-muted"> Введите имя</small>
						</div>	
								
						<!--
							<div class="form-froup">
							<label for="exampleInputUsername">Направление подготовки  </label>
							<input type="name" name="napravl" class="form-control" id="exampleInputUsernameLog" aria-describdby="emailHelp" placeholder="Направление подготовки"	required>
							<small id="emailHelpLog" class="form-text text-muted">Введите направление подготовки </small>
						</div -->	


						<div class="form-froup">
							<label for="exampleInputPass">Пароль</label>
							<input type="password" name="password_log" class="form-control" id="exampleInputpassLog"  placeholder="Пароль" required>
							<small id="passHelpLog" class="form-text text-muted">Введите пароль</small>
						</div>	
					
        <!-- // if (isset($_SESSION['username_log'])){
        //   $username_log = $_SESSION['username_log'];
        //   echo "Hello" .$username_log;
        //  echo "<a href='logout.php' > Выйти со страницы </a>";
        // }  -->
        	
						 <?php if(isset($fmsg)){ ?>
						 <div class="alert alter-danger" role="alter"> <?php echo $fmsg; ?> </div> <?php }?>
						  <?php if(isset($msg)){ ?>
						 <div class="alert alter-danger" role="alter"> <?php echo $msg; ?> </div> <?php }?>
						<button class="btn btn-primary">Отправить</button> 	
						</form>

					
					</div>
				</div>

			</div>

		</div>


	</div>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
 
</html>


