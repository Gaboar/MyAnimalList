<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');

if(isset($_SESSION['username'])) {
	$currentUser=$_SESSION['username'];

	$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='$currentUser'"));

	if($user['isadmin']) {

		if(isset($_POST['upload'])) {

			$nev = $_POST['name'];
			$alias = $_POST['alias'];
			$desc = $_POST['desc'];

			$megengedettFormat = array('png');

			$kiterjesztes = pathinfo($_FILES['animal-picture1']['name'], PATHINFO_EXTENSION);
			if(in_array($kiterjesztes, $megengedettFormat)) {
				$feltoltottFajl = 'img/' . $alias . '/'. 1 . '.' . $kiterjesztes);
				move_uploaded_file($_FILES['animal-picture1']['tmp_name'], $feltoltottFajl);
			}

			$kiterjesztes = pathinfo($_FILES['animal-picture2']['name'], PATHINFO_EXTENSION);
			if(in_array($kiterjesztes, $megengedettFormat)) {
				$feltoltottFajl = 'img/' . $alias . '/'. 2 . '.' . $kiterjesztes);
				move_uploaded_file($_FILES['animal-picture2']['tmp_name'], $feltoltottFajl);
			}

			$kiterjesztes = pathinfo($_FILES['animal-picture3']['name'], PATHINFO_EXTENSION);
			if(in_array($kiterjesztes, $megengedettFormat)) {
				$feltoltottFajl = 'img/' . $alias . '/'. 3 . '.' . $kiterjesztes);
				move_uploaded_file($_FILES['animal-picture3']['tmp_name'], $feltoltottFajl);
			}

			$kiterjesztes = pathinfo($_FILES['animal-picture4']['name'], PATHINFO_EXTENSION);
			if(in_array($kiterjesztes, $megengedettFormat)) {
				$feltoltottFajl = 'img/' . $alias . '/'. 4 . '.' . $kiterjesztes);
				move_uploaded_file($_FILES['animal-picture4']['tmp_name'], $feltoltottFajl);
			}

			
			//copypaste ezt kell formázni
			
			
	
			



		}


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
	<title>MyAnimalList - Upload</title>
</head>
<body>

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section id="adminadd">
			<h2 class="formtitle">Állat feltöltése</h2>
			<form enctype="multipart/form-data" action="asd.html" method="POST" autocomplete="off" style="width: 70%">
				<label for="name" class="required">Név:</label>
				<input type="text" name="name" id="name" required>
				<label for="alias" class="required">Alias:</label>
				<input type="text" name="alias" id="alias" required>
				<label for="desc" class="required">Leírás:</label>
				<textarea name="description" id="desc" rows="6" required></textarea>
				<label for="type" class="required">Típus:</label>
				<input type="text" name="type" id="type" required>
				<div>
					<label for="pic1">Első kép (kizárólag png):</label>
					<input type="file" name="animal-picture1" id="pic1">
				</div>
				<div>
					<label for="pic2">Második kép (kizárólag png):</label>
					<input type="file" name="animal-picture2" id="pic2">
				</div>
				<div>
					<label for="pic3">Harmadik kép (kizárólag png):</label>
					<input type="file" name="animal-picture3" id="pic3">
				</div>
				<div>
					<label for="pic4">Negyedik kép (kizárólag png):</label>
					<input type="file" name="animal-picture4" id="pic4">
				</div>
				<div>
					<label for="vid">Videó (kizárólag mp4):</label>
					<input type="file" name="video" id="vid">
				</div>
				<input type="submit" name="upload" value="Feltöltés">
			</form>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>