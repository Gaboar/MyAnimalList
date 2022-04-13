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
		<p style="color:red; text-align:center;"><?php include('page/informationbox.php'); ?></p>
			<h2>Népszerű</h2>
			<p>A legnépszerűbb állat, amit a felhasználók többsége nagyon szeret, nem lett más, mint
			</p>
			<table>
				<tr>
					<th class="s">Rangsor</th>
					<th>Név</th>
					<th class="s">Értékelés</th>
					<th class="s">Saját értékelés</th>
				</tr>

				<?php

				$fetch = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM allatok ORDER BY ertekeles DESC LIMIT 1"));
				
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

		<?php 
		
		$allAllat = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM allatok"));
		$count = mysqli_num_rows(mysqli_query($db, "SELECT * FROM allatok"));
		
		?>
			<h2>Ajánlott állatok</h2>
			<ul>
				<?php for($i = 0; $i < 5; $i++): ?>
				<li>
					<a href="animal.php?nev=<?=$allAllat[$i][2]?>">
						<h4>
							<span class="haver"><span><?=$allAllat[$i][2]?></span></span>
						</h4>
						<img src="img/<?=$allAllat[$i][2]?>/1.png" alt="<?=$allAllat[$i][2]?>">
					</a>
				</li> <?php endfor; ?>
			</ul>
		</section>
		<hr>
		<section id="news" class="padding">
			<h2>Aktuális híreink</h2>
			<p>Egyre több felhasználó regisztrál a MyAnimalList weboldalra. Hálánk jeléül kisorsolunk egy Webtervezés
				gyakorlat jeles osztályzatot. 
			</p>
			<p>Elkészült a weboldal beadásra.
			</p>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>

</html>