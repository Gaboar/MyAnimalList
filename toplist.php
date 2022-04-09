<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');
$user="";

$fetch = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM allatok ORDER BY ertekeles DESC"));
$count = mysqli_num_rows(mysqli_query($db, "SELECT * FROM allatok ORDER BY ertekeles DESC"));

if(isset($_SESSION['username'])) {
	$currentUser = $_SESSION['username'];
	$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username = '$currentUser'"));

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
			</tr>
			<?php 

			$ertekelt="";
			
			for($i=0; $i<$count; $i++) {
				echo "<tr>";
				echo "<td class='rank'>" . $i+1 . "</td>";
				echo "<td class='info'>";
				echo "<a href='animal.php?nev=". $fetch['alias'] ."'><img src='img/".$fetch['alias']."/1.png' alt='". $fetch['alias'] . "'></a>";
				echo "<div style='margin-left: 0.5em'>";
				echo "<h3><a href='animal.php?nev=" . $fetch['alias'] ."'>" . $fetch['name'] . "</a></h3>";
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
			}
			
			
			?>

		</table>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>