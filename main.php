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
	<title>MyAnimalList</title>
</head>

<body class="vantoplist">

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section id="popular" class="padding">
			<h2>Népszerű</h2>
			<p>A hónap legnépszerűbb állata, amit a felhasználók többsége nagyon szeret, nem lett más, mint a <strong style="color:#1e1e1e">macska</strong>.
			</p>
			<table>
				<tr>
					<th class="s">Rangsor</th>
					<th>Név</th>
					<th class="s">Értékelés</th>
					<th class="s">Saját értékelés</th>
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
				</tr>
			</table>
		</section>
		<hr>
		<section id="recommended" class="padding">
			<h2>Ajánlott állatok</h2>
			<ul>
				<li>
					<a href="animal.php">
						<h4>
							<span class="haver"><span>Marha</span></span>
						</h4>
						<img src="img/szarvasmarha/1.png" alt="marha">
					</a>
				</li><li>
					<a href="animal.php">
						<h4>
							<span class="haver"><span>Macska</span></span>
						</h4>
						<img src="img/macska/1.png" alt="macska">
					</a>
				</li><li>
					<a href="animal.php">
						<h4>
							<span class="haver"><span>Kutya</span></span>
						</h4>
						<img src="img/kutya/1.png" alt="kutya">
					</a>
				</li><li>
					<a href="animal.php">
						<h4>
							<span class="haver"><span>filler</span></span>
						</h4>
						<img src="img/filler.png" alt="filler">
					</a>
				</li><li>
					<a href="animal.php">
						<h4>
							<span class="haver"><span>filler</span></span>
						</h4>
						<img src="img/filler.png" alt="filler">
					</a>
				</li><li>
					<a href="animal.php">
						<h4>
							<span class="haver"><span>filler</span></span>
						</h4>
						<img src="img/filler.png" alt="filler">
					</a>
				</li><li>
					<a href="animal.php">
						<h4>
							<span class="haver"><span>filler</span></span>
						</h4>
						<img src="img/filler.png" alt="filler">
					</a>
				</li>
			</ul>
		</section>
		<hr>
		<section id="news" class="padding">
			<h2>Aktuális híreink</h2>
			<p>Egyre több felhasználó regisztrál a MyAnimalList weboldalra. Hálánk jeléül kisorsolunk egy Webtervezés
				gyakorlat jeles osztályzatot. 
			</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus interdum diam non vestibulum. Fusce
				eleifend aliquam felis at imperdiet. Donec id euismod ligula. Integer iaculis mi mollis interdum mollis.
				Maecenas justo augue, consectetur vel scelerisque sit amet, volutpat id nibh. Pellentesque suscipit
				risus vel velit scelerisque vestibulum. Mauris porta, tellus id consequat ullamcorper, est leo porttitor
				massa, quis porta ligula tellus sed ante. Nulla elementum euismod elit, eget pellentesque nisi iaculis
				non. Fusce lacinia efficitur massa, ut fringilla arcu mollis id. Integer rutrum tempor enim quis rutrum.
				Praesent in eros libero. Ut sed leo eros. Ut ultrices vestibulum sapien interdum tempor. Sed vel
				venenatis arcu.
			</p>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>

</html>