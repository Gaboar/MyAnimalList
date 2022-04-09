<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');

if(isset($_SESSION['username'])) {
	$currentUser = $_SESSION['username'];
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
	<title>MyAnimalList</title>
</head>

<body class="vantoplist">

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section id="popular" class="padding">
			<h2>Népszerű</h2>
			<p>A legnépszerűbb állat, amit a felhasználók többsége nagyon szeret, nem lett más, mint a <strong style="color:#1e1e1e">macska</strong>.
			</p>
			<table>
				<tr>
					<th class="s">Rangsor</th>
					<th>Név</th>
					<th class="s">Értékelés</th>
					<th class="s">Saját értékelés</th>
				</tr>

				<?php

				$fetch = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM allatok ORDER BY ertekeles LIMIT 1"));
				
				echo "<tr>";
				echo "<td class='rank'>" . 1 . "</td>";
				echo "<td class='info'>";
				echo "<a href='animal.php?nev=" . $fetch['alias'] ."'><img src='img/".$fetch['alias']."/1.png' alt='". $fetch['alias'] . "'></a>";
				echo "<div style='margin-left: 0.5em'>";
				echo "<h3><a href='animal.php?nev=" . $fetch['alias'] . "'>" . $fetch['name'] . "</a></h3>";
				echo "<div>";
				echo $fetch['tipus'];
				echo "<br>";
				echo $fetch['ertekelesdb'] . " értékelés";
				echo "</div>";
				echo "</div>";
				echo "</td>";
				echo "<td>" . $fetch['ertekeles'] . "</td>";

				if(isset($_SESSION['username'])) { 
					$ertekelt=mysqli_fetch_assoc(mysqli_query($db, "SELECT ertekeles FROM ertekeles WHERE username='$currentUser' AND allatid=" . $fetch['id']));
				}

				echo "<td>";
				if(isset($_SESSION['username']) && $ertekelt) { 
					echo $ertekelt['ertekeles'] . "</td>";
				 } 
				else echo "- </td>";
				echo "</tr>";
				
				
				?>
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