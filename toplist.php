<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="img/mal.png" type="image/x-icon">
	<title>MyAnimalList - Rankings</title>
</head>
<body class="vantoplist">
	
	<?php include_once("page/fejlec.php"); ?> 

	<main>
		<table>
			<tr>
				<th class="s">Rangsor</th>
				<th>Név</th>
				<th class="s">Értékelés</th>
				<th class="s">Saját értékelés</th>
				<th class="s">Művelet</th>
			</tr>
			<tr>
				<td class="rank">1</td>
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
				<td>9.14</td>
				<td>-</td>
				<td>szerkesztés</td>
			</tr>
			<tr>
				<td class="rank">2</td>
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
				<td>8.47</td>
				<td>-</td>
				<td>szerkesztés</td>
			</tr>
			<tr>
				<td class="rank">3</td>
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
				<td>6.21</td>
				<td>-</td>
				<td>szerkesztés</td>
			</tr>
			<tr>
				<td class="rank">4</td>
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
				<td>x.y1</td>
				<td>-</td>
				<td>szerkesztés</td>
			</tr>
			<tr>
				<td class="rank">5</td>
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
				<td>x.y1</td>
				<td>-</td>
				<td>szerkesztés</td>
			</tr>
			<tr>
				<td class="rank">6</td>
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
				<td>x.y1</td>
				<td>-</td>
				<td>szerkesztés</td>
			</tr>
		</table>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>