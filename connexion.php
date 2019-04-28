
<!DOCTYPE html>
<html>
<head>
	<title>form in design</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="connexion.css">
			<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<img src="logo.jpg">
		<form method="POST" action="">
			<div class="form-input">
				<input type="username" name="username" class="form-control mt-3" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
				<input type="password" name="password" placeholder="Password" class="form-control mt-3" aria-label="Username" aria-describedby="basic-addon1">			
				<input type="submit" type="submit" value="LOGIN" class="btn-login">	
			</div>			
		</form>
	</div>
		
	<?php 

$host="localhost";
$user="root";
$password="";
$db="videogames";

try {
	$db = new PDO('mysql:dbname=videogames;host=127.0.0.1','root','');

}catch (PDOException $e){
	echo 'Erreur connexion BDD : '.$e->getMessage();
}
if(isset($_POST['username'])){

	$uname=$_POST['username'];
	$password=$_POST['password'];

	$query = $db->prepare("SELECT * FROM loginform WHERE User=? AND Pass=? limit 1");
	$query->bindParam(1,$uname,PDO::PARAM_STR);
	$query->bindParam(2,$password,PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$result = $query->rowCount();
	if( $result == 1 ){
		session_start();
		$_SESSION['id'] = $res[0]['ID'];
		 header('Location: index.php');
	}
	else{
		echo " Le pseudo ou le mot de passe est incorrect";

	}
}

?>
		
	<footer>
	</footer>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>