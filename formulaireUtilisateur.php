


<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$user = getNewUser();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$user = readUser($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
	
	


?>

<html>
<header>
	<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">

</header>
<body>

		
	<form action="createUpdate.php" method="get" class="formulaire">
	<p>	
		<a href="index.php" class="titre">Liste des utilisateurs</a>

		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<input type="hidden" name="action" value="<?php echo $action;  ?>"/>
		 <div>
        	<label for="name"></label>
        	<input type="text" id="nom" name="nom" value="" placeholder="Titre">
	    </div>
	    <div>
	        <label for="prenom"></label>
	        <input type="text" id="prenom" name="prenom" value="" placeholder="Date de sortie">
	    </div>
	    <div>
	        <label for="age"></label>
	        <input type="text" id="age" name="age" value="" placeholder="Console">
	    </div>
	    <div>
	        <label for="adresse"></label>
	        <textarea id="age" name="developeur" placeholder="Editeur"></textarea>
	    </div>
	    <div>
	        <label for="adresse"></label>
	        <textarea type="text "id="age" name="developeur" placeholder="Developeur" value=""></textarea>
	    </div>
		<div class="button">
			<button type="submit"><?php echo $libelle;  ?></button>
		</div>
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="createUpdate.php" method="get">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>
	</form>
	<?php } ?>

</body>
</html>