<?php 

session_start();
$db = mysqli_connect('localhost', 'root', '', 'myanimallist');
$ertekelesek="";
$ertekelesekdb=0;

if(isset($_SESSION['username'])) {
	$usernev = $_SESSION['username'];
	$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username = '$usernev'"));
}

if(isset($_GET['nev']) && $_GET['nev'] != '') {
	$nev = $_GET['nev'];



	$allat = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM allatok WHERE alias = '$nev'"));


	$ertekelesek = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ertekeles WHERE allatid='". $allat['id'] . "'"));
	$ertekelesekdb = mysqli_num_rows(mysqli_query($db, "SELECT * FROM ertekeles WHERE allatid='". $allat['id'] . "'"));



	//ertekeles cucc
	if(isset($_POST['ertekeles'])) {
		//ellenorizzuk mar ratelte-e

		$ujpont = $_POST['pontszam'];

		$voltrate = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM ertekeles WHERE username='$usernev' AND allatid='" . $allat['id'] . "'"));

		if($voltrate) {
			$q = "UPDATE ertekeles SET ertekeles = $ujpont WHERE username='$usernev' AND allatid='" . $allat['id'] . "'";
			
		}
		else {
			$q = "INSERT INTO ertekeles (username, allatid, ertekeles) VALUES ('$usernev', '" . $allat['id'] . "', '$ujpont')";
		}


		//értékelés tábla
		if(!mysqli_query($db, $q)) {
			echo "Adatbázis hiba!";
		}

		//ujrahivjuk query utan :D
		$ertekelesek = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ertekeles WHERE allatid='". $allat['id'] . "'"));
		$ertekelesekdb = mysqli_num_rows(mysqli_query($db, "SELECT * FROM ertekeles WHERE allatid='". $allat['id'] . "'"));

		$ertekelesSum = 0;

		foreach($ertekelesek as $ertekeles) {
			$ertekelesSum += $ertekeles[3];
		}
	
		$ujertekeles = $ertekelesSum / $ertekelesekdb;
	
		$q = "UPDATE allatok SET ertekelesdb = '$ertekelesekdb', ertekeles = '$ujertekeles' WHERE id='". $allat['id'] . "'";
	
		//állatok tábla
		if(!mysqli_query($db, $q)) {
			echo "Adatbázis hiba!";
		}

		header('refresh: 0');

	}



	//kedvencem
	if(isset($_POST['kedvenc'])) {
		$q = "UPDATE users 
		SET kedvencid = '" . $allat['id'] . "'
		WHERE username='$usernev'";
		if(!mysqli_query($db, $q)) {
			echo "Adatbázis hiba!";
		}
	}

	//print_r($ertekelesek);

}
else {
	header('location: main.php');
}


?>

<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="img/mal.png" type="image/x-icon">
	<title>MyAnimalList - Állat: <?= $allat['alias'] ?></title>
	<style>
		@keyframes slide {
			0% { background-image: url("img/<?=$allat['alias']?>/1.png"); }
			25% { background-image: url("img/<?=$allat['alias']?>/2.png"); }
			50% { background-image: url("img/<?=$allat['alias']?>/3.png"); }
			100% { background-image: url("img/<?=$allat['alias']?>/4.png"); }
		}
	</style>
</head>

<body>

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section id="info">
			<div id="profp" class="center">
				<h2><?= $allat['alias'] ?></h2>
				<img src="img/<?= $allat['alias'] ?>/1.png" alt="állatkép" width="250" height="250">
			</div>
			<div id="stat">
				<h2>Statisztika</h2>
				<br>
				<p>Értékelések: <?= $allat['ertekelesdb'] ?></p>
				<br>
				<p>Pontszám: <?= $allat['ertekeles'] ?></p>
				<br>
				<br>
				<br>
				<p>
					Saját értékelés: 
					<?php if(isset($_SESSION['username'])) : ?>
					<form action="animal.php?nev=<?= $allat['alias'] ?>" method="post">
						<select name="pontszam" id="pont">
							<?php
							function ertekelte($valaki, $_ertekelesek, $_ertekelesekdb) {
								for($j=0; $j<$_ertekelesekdb; $j++) {
									if ($_ertekelesek[$j][1] == $valaki) return true;
								}
								return false;
							}

							echo "<option value='-'>-</option>";

							for($j=0; $j<$ertekelesekdb; $j++) {
								if ($ertekelesek[$j][1] == $user['username']) {
									for($i=1; $i <=10; $i++) {
										if($i == $ertekelesek[$j][3]) {
											echo "<option value='$i' selected>$i</option>";
										}
										else {
											echo "<option value='$i'>$i</option>";
										}
									}
								}
							}
							if (!ertekelte($user['username'], $ertekelesek, $ertekelesekdb)) {
								for($i=1; $i <=10; $i++) {
									echo "<option value='$i'>$i</option>";
								}
							}

							?>
  						</select>
						<input type="submit" name="ertekeles" value="Értékelés">
					</form>
				</p>
				<br>
				<p>
					<form action="animal.php?nev=<?= $allat['alias'] ?>" method="post">
						<input type="submit" name="kedvenc" value="Ez a kedvenc állatom!">
					</form>
					<?php else : ?>
					-
					<?php endif ?>
				</p>
			</div>
		</section>
		<section id="desc">
			<h2>Leírás</h2>
				<p><?= $allat['leiras'] ?></p>
		</section>
		<section id="media">
			<h2>Képek</h2>
			<div id="images"></div>
			<h2>Videó</h2>
			<video controls>
				<source src="video/<?= $allat['alias'] ?>.mp4" type="video/mp4">
				Hoppá! : (
			</video>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>

</html>