<?php session_start();
error_reporting(0);
 $_SESSION['test___id'] = $_REQUEST['?test=<?=$test["id"]?'];
 
 ?>


<?php 
ini_set("display_errors", 1);
error_reporting(-1);
require_once 'action.php';
require_once 'functions_5.php';
// список тестов 
if (isset($_POST['test'])){
	$test = (int)$_POST['test'];
	unset($_POST['test']);
	$result = get_correct_answers($test);
	
	if ( !is_array($result)) exit ('Ошибка');
// данные теста
	$test_all_data = get_test_data($test);
	// 1  массив вопрос / ответы, 2 - правельные ответы 3 - ответы пользоввателя 
	$test_all_data_result = get_test_data_result($test_all_data, $result, $_POST);
	 // print_r($_POST);
	 //  print_r($result);
	 //  print_r($test_all_data_result);

	 // print_r ($test_all_data);
	echo print_result($test_all_data_result);
	die; 

}

$tests = get_tests();

if(isset($_GET['test'])){
	$test_id =(int)$_GET['test'];
	$test_data = get_test_data($test_id);
	

	if(is_array($test_data)){
	 $count_questions = count($test_data);
	 $pagination = pagination($count_questions, $test_data);
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Система тестирования</title>
		<link rel="stylesheet" href="web_style_2.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="scripts_5.js"></script> 
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
	<link rel="stylesheet" href="web_style_3.css">
 	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<body>
	<header class="header_test">
		
			<div class="row">
				<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
			<div class="col-lg-3">
			<a href="#" target="_blank" class="navbar-brand"><img src="https://x-lines.ru/letters/i/cyrillicfancy/1329/000000/20/0/4no7bqgto8eafwfi4n6pbcby4gbpbpqto8eafwfa4gypbxsosmembwf74nhpdda.png" border="0" /></a>
		</div>
	
		<div class="col-lg-5 ml-auto ">
			
				<ul class="menu d-flex justify-content-center">
					<li class="menu_item">
						<h3><?php echo $_SESSION['username_log']; ?></h3>

					</li>
					<li class="menu_item">
						<a href="logout.php" >Выйти</a>
						
					</li>
				</ul>
			</div>
		</nav>
	</div>

<div class="wrap_test">

<br><hr><br>
<div class = "content">
<?php if(isset($test_data)): ?>
	<?php if (is_array($test_data)): ?>
		<p>Всего вопросов: <?=$count_questions?></p>
		<?=$pagination?>
		<span class="none" id ="test-id"><?=$test_id?></span>
 <div class="test-data">
	<?php foreach($test_data as $id_question => $item): ?>
		<div class="question" data-id="<?=$id_question?>" id="question-<?=$id_question?>">
			<?php foreach ($item as $id_answer => $answer): ?>
				<?php if(!$id_answer): ?>
					<p class="q"> <?=$answer?></p>
					<?php else: ?>			<p class="a">
						<input type="radio" id="answer-<?$=$id_answer?>" name ="question-<?=$id_question?>" value="<?=$id_answer?>">
						<label for="answer-<?=$id_answer?>"><?=$answer?></label>

					</p>

				<?php endif; ?>
			<?php endforeach; ?>

		</div>
	<?php endforeach; ?>
</div>
<div class="but">
	<button class="but_test" id="but_test">Закончить тест</button> 
	</div>
	</section> 
		<?php else: ?>
			<h3>Нет тестов</h3>
	<?php endif; ?>
<?php endif;?>
	
</div>
</div>

	
</body>
</html>