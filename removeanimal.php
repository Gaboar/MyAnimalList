<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');

if(isset($_SESSION['username'])) {
	$currentUser=$_SESSION['username'];

	$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='$currentUser'"));
	
	if(!$user) {
		header('location: users.php');
	}
	
	if($user['profilkep'] == '') {
		$profilkep="default.jpg";
	}
	else {
		$profilkep = $user['profilkep'];
	} 
	
}
else {
	header('location: login.php');
}


//list todo


?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="img/mal.png" type="image/x-icon">
	<title>MyAnimalList - Remove</title>
</head>
<body>

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section id="adminremove">
			<h2 class="formtitle">Állat törlése</h2>
			<form enctype="multipart/form-data" action="asd.html" method="POST" autocomplete="off" style="width: 70%">
				<label for="alias">Alias:</label>
				<input type="text" name="alias" id="alias">
				<label for="del_pswd">Add meg a jelszavad:</label>
				<input type="password" name="password" id="del_pswd">
				<input type="submit" name="delete" value="Törlés">
			</form>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>