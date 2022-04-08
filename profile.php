<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');
if(isset($_GET['user'])) {
	$current=$_GET['user'];

	$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='$current'"));

	if(!$user) {
		header('location: users.php');
	}

	$bemutatkozas="";
	$profilkep="";

	if($user['bemutatkozas'] == '') {
		$bemutatkozas = "Ennek a felhasználónak nincs bemutatkozása!";
	}
	else {
		$bemutatkozas = $user['bemutatkozas'];
	}

	if($user['profilkep'] == '') {
		$profilkep="default.jpg";
	}
	else {
		$profilkep = $user['profilkep'];
	} 

	$q = mysqli_query($db, "SELECT allatid, ertekeles FROM ertekeles WHERE username='$current'");

	$ertekelesDb = mysqli_num_rows($q);
	$ertSum=0;
	$kedvencallat="";


	$list = mysqli_fetch_assoc($q);

	for($i=0; $i < $ertekelesDb; $i++) {
		$ertSum += $list['ertekeles'];
	}

	$q = mysqli_query($db, "SELECT alias FROM allatok WHERE id = " . $user['kedvencid']);
	$fetch = mysqli_fetch_assoc($q);

	if($fetch['alias'] == '') {
		$kedvencallat = "-";
	}
	else 
		$kedvencallat=$fetch['alias'];

	



}
else {
	header('location: users.php');
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
	<title>MyAnimalList - Profile</title>
</head>
<body>

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section id="info">
			<div id="profp" class="center">
				<h2><?= $user['username'] ?> profilja</h2>
				<img src="img/users/<?= $profilkep ?>" alt="profilkép" width="250" height="250">
			</div>
			<div id="stat">
				<h2>Bemutatkozás</h2>
				<br>
				<p><?= $bemutatkozas ?></p>
				<h2 style="margin-top: 2em;">Statisztika</h2>
				<br>
				<p>Értékelések: <?= $ertekelesDb ?></p>
				<br>
				<p>Átlagos pontszám: <?= $ertSum / $ertekelesDb ?></p>
				<br>
				<p>Kedvenc állat: <?= $kedvencallat ?></p>
			</div>
		</section>
		<hr>
		<section id="list">
			<h2>Értékelések (ez mar nem automatizalt)</h2>
			<div>
				<table>
					<tr>
						<th>Név</th>
						<th class="s">Értékelés</th>
						<th class="s">Múvelet</th>
					</tr>
					<tr>
						<td class="info">
							<a href="animal.php"><img src="img/macska/1.png" alt="macska"></a>
							<div>
								<h3><a href="animal.php">Macska (Felis silvestris catus)</a></h3>
								<div>
									Háziállat
									<br>
									Ragadozó
									<br>
									5723 értékelés
								</div>
							</div>
						</td>
						<td>1</td>
						<td>edit</td>
					</tr>
					<tr>
						<td class="info">
							<a href="animal.php"><img src="img/kutya/1.png" alt="kutya"></a>
							<div>
								<h3><a href="animal.php">Kutya (Canis lupus familiaris)</a></h3>
								<div>
									Háziállat
									<br>
									Ragadozó
									<br>
									6513 értékelés
								</div>
							</div>
						</td>
						<td>1</td>
						<td>edit</td>
					</tr>
					<tr>
						<td class="info">
							<a href="animal.php"><img src="img/szarvasmarha/1.png" alt="szarvasmarha"></a>
							<div>
								<h3><a href="animal.php">Szarvasmarha (Bos taurus taurus)</a></h3>
								<div>
									Háziállat
									<br>
									Hövényevő
									<br>
									3923 értékelés
								</div>
							</div>
						</td>
						<td>1</td>
						<td>edit</td>
					</tr>
					<tr>
						<td class="info">
							<a href="animal.php"><img src="img/filler.png" alt="macska"></a>
							<div>
								<h3><a href="animal.php">filler</a></h3>
								<div>
									filler informacio
									<br>
									unknown
									<br>
									98xy értékelés
								</div>
							</div>
						</td>
						<td>2</td>
						<td>edit</td>
					</tr>
					<tr>
						<td class="info">
							<a href="animal.php"><img src="img/filler.png" alt="macska"></a>
							<div>
								<h3><a href="animal.php">filler</a></h3>
								<div>
									filler informacio
									<br>
									unknown
									<br>
									98xy értékelés
								</div>
							</div>
						</td>
						<td>1</td>
						<td>edit</td>
					</tr>
					<tr>
						<td class="info">
							<a href="animal.php"><img src="img/filler.png" alt="macska"></a>
							<div>
								<h3><a href="animal.php">filler</a></h3>
								<div>
									filler informacio
									<br>
									unknown
									<br>
									98xy értékelés
								</div>
							</div>
						</td>
						<td>1</td>
						<td>edit</td>
					</tr>
				</table>
			</div>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>