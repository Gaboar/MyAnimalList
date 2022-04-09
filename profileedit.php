<?php 
include('page/modosit.php');


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


	if(isset($_POST['modify'])) {
		if(count($errors) == 0) {
			$megengedettFormat = array('jpg', 'png');
			$kiterjesztes = pathinfo($_FILES['profile-picture']['name'], PATHINFO_EXTENSION);
	
			if(in_array($kiterjesztes, $megengedettFormat)) {
				$feltoltottFajl = 'img/users/' . basename($currentUser . '.' . $kiterjesztes);
				move_uploaded_file($_FILES['profile-picture']['tmp_name'], $feltoltottFajl);
				$q = "UPDATE users SET profilkep = '". $currentUser . '.' . $kiterjesztes . "' WHERE username='$currentUser'";
				mysqli_query($db, $q);
			}
		}

		header('refresh: 0');
	}

	if($user['bemutatkozas'] != "") {
		$bemutatkozas = $user['bemutatkozas'];
	} else {
		$bemutatkozas = "";
	}
	if($user['szulido'] != "") {
		$szulido = $user['szulido'];
	}
	else $szulido = "";


	
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
	<title>MyAnimalList - <?= $currentUser ?></title>
</head>
<body>

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section id="edit">
			<h2 class="formtitle">Profil szerkesztése</h2>
			<p style="margin-bottom:1em; color:grey;">Tetszőlegesen változtathatod adataidat és láthatóságukat.<br>Természetesen, amit üresen hagysz, az nem fog változni!</p>
			<br>
			<form enctype="multipart/form-data" action="profileedit.php" method="POST" autocomplete="off" style="width: 70%">
				<?php include('page/errors.php'); ?>
				<label for="pswd">Jelszó (min. 4 karakter):</label>
				<input type="password" name="password" id="pswd">
				<label for="pswd-check">Jelszó ismét:</label>
				<input type="password" name="password-check" id="pswd-check">
				<label for="dob">Születésnap:</label>
				<input type="date" name="date-of-birth" id="dob" style="margin-bottom: 0.5em;" value="<?=$szulido?>">
				<label class="pub" for="dvis">Publikus <?php if($user['szullathato']) : ?><input type="checkbox" name="dob-visible" id="dvis" checked> <?php else : ?> <input type="checkbox" name="dob-visible" id="dvis"> <?php endif ?></label>
				<div style="margin-top: 1.5em;">
					Nem:
				<?php if($user['nem']) : ?>
					<label><input type="radio" name="gender" value="male" checked> Férfi</label>
					<label><input type="radio" name="gender" value="female"> Nő</label>
				<?php else : ?>
					<label><input type="radio" name="gender" value="male" > Férfi</label>
					<label><input type="radio" name="gender" value="female" checked> Nő</label>
				<?php endif ?>
					<label class="pub" for="gvis">Publikus <?php if($user['nemlathato']) : ?> <input type="checkbox" name="gender-visible" id="gvis" checked> <?php else : ?> <input type="checkbox" name="gender-visible" id="gvis"> <?php endif ?></label>
				</div>
				<label for="intro">Bemutatkozás:</label>
				<textarea name="introduction" id="intro" maxlength="300" rows="6" ><?=$bemutatkozas?></textarea>
				<div>
					<div id="profp">
						<img src="img/users/<?= $profilkep ?>" alt="profilkép" width="180" height="180">
					</div>
					<label for="pfp">Profilkép (kizárólag jpg, png):</label>
					<input type="file" name="profile-picture" id="pfp">
				</div>
				<input type="submit" name="modify" value="Módosítás">
			</form>
			<h2 class="formtitle" style="margin-top: 4em;">Fiók törlése</h2>
			<form enctype="multipart/form-data" action="asd.html" method="POST" autocomplete="off" style="width: 70%">
				<label for="del_pswd" class="required">Add meg a jelszavad:</label>
				<input type="password" name="password" id="del_pswd" required>
				<input type="submit" name="delete" value="Törlés">
			</form>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>