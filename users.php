<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');
$users = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM users"));

//i, 1 -> username
//i, 7 -> profilkép

$profilkep="";

?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="img/mal.png" type="image/x-icon">
	<title>MyAnimalList - Users</title>
</head>
<body>
	
	<?php include_once("page/fejlec.php"); ?> 

	<main>
		<section id="users" class="center">

			<?php 
			for($i=0; $i<count($users); $i++) {
				if($users[$i][8] == '') {
					$profilkep="default.jpg";
				}
				else {
					$profilkep = $users[$i][8];
				} 
				echo '<a href="profile.php?user=' . $users[$i][1] . '">';
					echo '<img src="img/users/' . $profilkep . '" alt="profilkép" width="80" height="80">';
					echo '<h5>'. $users[$i][1]. '</h5>';
				echo '</a>';
			}
			?>

		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>