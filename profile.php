<?php 

session_start();

$user="";
$currentUser="";

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');
if(isset($_GET['user'])) {
	$currentUser=$_GET['user'];

	$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='$currentUser'"));

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

	$q = mysqli_query($db, "SELECT allatid, ertekeles FROM ertekeles WHERE username='$currentUser'");

	$ertekelesDb = mysqli_num_rows($q);
	$ertSum=0;
	$kedvencallat="";


	$list = mysqli_fetch_assoc($q);

	for($i=0; $i < $ertekelesDb; $i++) {
		$ertSum += $list['ertekeles'];
	}

	$q = mysqli_query($db, "SELECT alias FROM allatok WHERE id = " . $user['kedvencid']);
	$fetch = mysqli_fetch_assoc($q);

	if($fetch && $fetch['alias'] == '') {
		$kedvencallat = "-";
	}
	elseif($fetch)
		$kedvencallat=$fetch['alias'];

	//list todo



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
	<title>MyAnimalList - <?= $currentUser ?></title>
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
				<h2>Bemutatkozás&emsp;<?php if(isset($_SESSION['username']) && ($_SESSION['username'] != $currentUser)) : ?>
					<a href="uzi.php?partner=<?= $user['username']?>"><button>Üzenet küldés</button></a>
					<?php elseif(isset($_SESSION['username']) && ($_SESSION['username'] == $currentUser)) : ?>
					<a href="profileedit.php"><button>Szerkesztés</button></a>
					<?php endif ?>
				</h2>
				<br>
				<p><?= $bemutatkozas ?></p>
				<?php if($user['szullathato']) : ?>
				<br>
				<p class="i"><b>Születési dátum:</b> <?=$user['szulido'] ?></p>
				<?php endif ?>
				<?php if($user['nemlathato']) : ?>
				<p class="i"><b>Nem:</b> <?=$user['nem'] ? "férfi" : "nő" ?></p>
				<?php endif ?>
				<h2 style="margin-top: 2em;">Statisztika</h2>
				<br>
				<p>Értékelések: <?= $ertekelesDb ?></p>
				<br>
				<p>Átlagos pontszám: <?php if($ertekelesDb != 0) { echo $ertSum / $ertekelesDb; } else { echo 0; } ?></p>
				<br>
				<p>Kedvenc állat: <?= $kedvencallat ?></p>
			</div>
		</section>
		<hr>
		<section id="list">
			<h2>Értékelések</h2>
			<div>
				<table>
					<tr>
						<th>Név</th>
						<th class="s">Értékelés</th>
					</tr>
					<tr>
						<?php 

							$db = mysqli_connect('localhost', 'root', '', 'myanimallist');
							$ertekeles = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM ertekeles"));
							
							//print_r($ertekeles);
							//0 -> nem fontos (id)
							//1 -> usernév
							//2 -> allatid
							//3 -> értékelés
						for($i=0; $i<count($ertekeles); $i++ ) {

							if($ertekeles[$i][1] == $user['username']) {
								echo "<tr>";
								echo "<td class='info'>";
								$fetch = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM allatok WHERE id = " . $ertekeles[$i][2]));
								echo "<a href='animal.php'><img src='img/". $fetch['alias'] ."/1.png' alt='". $fetch['alias'] ."'></a>";
								echo "<div style='margin-left: 0.5em'>";
								echo "<h3><a href='animal.php'>". $fetch['name'] ."</a></h3>";
								echo "<div>";
								echo $fetch['tipus'];
								echo "<br>";
								echo $fetch['ertekelesdb'] . " értékelés";
								echo "</div>";
								echo "</div>";
								echo "</td>";
								echo "<td>" . $ertekeles[$i][3] . "</td>";
								echo "</tr>";
							}

						}
				
						
						?>



<!--					<tr>
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
					</tr> -->
				</table>
			</div>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>