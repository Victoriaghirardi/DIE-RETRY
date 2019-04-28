<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
<html>
    <head>
        <title>CRUD PHP</title>
    </head>

    <body>
    	<header class="mb-3">
    		<img src="logo.jpg" class="logoindex">
    			<form  method="get" action="search.php">
  		<table border="1" class="tablesearch">
    <tr>
      <th>
      <input name="var1" type="text" id="var1">
      <input type="submit" value="search"></th>
    </tr>
  </table>
</form>
    		
    	</header>
    	<button><a href=formulaireUtilisateur.php?id=0>Create new</a></button> 

    <TABLE>
	<?php
		include 'mesFunctionsSQL.php';
		include 'mesFunctionsTable.php';

		$headers = getHeaderTable();
		$users = getAllUsers();
		afficherTableau($users, $headers);
	?>
</TABLE>
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    </body>
</html>

