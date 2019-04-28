<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
</head>
<body>


<?php 
	
	function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "";
			$pdo = new PDO('mysql:host=localhost;dbname=videogames', $user, $pass);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	
	// récupere tous les users
	function getAllUsers() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT videogames.id, Title, ReleaseDate, platform.name, publishers.name, developers.name
					from videogames 
					inner join  platform on platform.id = videogames.idPlatform
					inner join publishers on publishers.id = videogames.idPublisher
					inner join developers on developers.id = videogames.idDeveloper
					order by videogames.id
					';
		$rows = $con->query($requete);
		return $rows;
	}

	// creer un user
	function createUser($Id,$Title, $ReleaseDate, $idPlateform, $idPublisher, $idDeveloper) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO videogames (Id, Title, ReleaseDate, IdPlateform, IdPublisher, IdDeveloper) 
					VALUES ('$Id, $Title, $ReleaseDate, $IdPlateform, $IdPublisher, $IdDeveloper')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	//recupere un user
	function readUser($id) {
		$con = getDatabaseConnexion();
		$requete = "SELECT * from videogames where id = '$id' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}

	//met à jour le user
	function updateUser($id, $Title, $ReleaseDate, $idPlateform, $idPublisher, $idDeveloper) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE videogames set 
						Id = '$Id',
						Title = '$Title',
						ReleaseDate = '$ReleaseDate',
						IdPlateform = '$IdPlateform',
						IdPublisher = '$IdPublisher'
						IdDeveloper = '$IdDeveloper' 
						where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	// suprime un user
	function deleteUser($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from videogames where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	function getNewUser() {
		$user['Id'] = "";
		$user['Title'] = "";
		$user['ReleaseDate'] = "";
		$user['IdPlateform'] = "";
		$user['IdPublisher'] = "";
		$user['IdDeveloper'] = "";
		
	}
	

function searchtitle(){

try{
        $user = "root";
        $pass = "";
        $pdo =  new PDO('mysql:host=localhost;dbname=videogames;charset=utf8', $user, $pass);
        $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

$var1 = $_GET['var1'];


$query = "SELECT * FROM videogames WHERE Title LIKE :search ";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_STR);
$stmt->execute();

print("Liste de résultats:\n").'<br>';


 
 

if ($stmt->rowCount() > 0) { 
$result = $stmt->fetchAll();

foreach( $result as $row ) {
echo '<a href=formulaireutilisateur.php?id='.$row["id"].' >'.$row["id"].'</a>'; ["id"].'  '  ;
echo $row["Title"].'<br>';
}
} else {
echo 'Rien à afficher';
}
}



 
 ?>

</body>
</html>