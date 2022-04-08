<?php include('page/auth.php') ?>

<?php

if(isset($_SESSION['username'])) {
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
	<script src="event.js"></script>
	<title>MyAnimalList - Login</title>
</head>
<body>
	
	<?php include_once("page/fejlec.php"); ?> 

	<main style="display: flex; flex-flow: row; gap: 50%; overflow: hidden;">
		<section id="login">
			<h2 class="formtitle">Bejelentkezés</h2>

			<?php include('page/errors.php'); ?> <br> 

			<form action="login.php" method="POST" autocomplete="off">
				<input type="text" name="username" id="login_uname" placeholder="Felhasználónév" required>
				<input type="password" name="password" id="login_pswd" placeholder="Jelszó" required>
				<input type="submit" name="login" value="Bejelentkezés">
				<button type="reset" onclick="reg_btn_click()">Regisztráció</button>
			</form>
			<hr style="visibility: hidden;">
		</section>
		<section id="register">
			<h2 class="formtitle">Regisztráció</h2>
			<form action="login.php" method="POST" autocomplete="off">
			<?php include('page/errors.php'); ?> <br>

				<label for="reg_uname" class="required">Felhasználónév:</label>
				<input type="text" name="username" id="reg_uname" required>
				<label for="reg_pswd" class="required">Jelszó:</label>
				<input type="password" name="password" id="reg_pswd" required>
				<label for="reg_pswd-check" class="required">Jelszó ismét:</label>
				<input type="password" name="password-check" id="reg_pswd-check" required>
				<label for="email" class="required">Email cím:</label>
				<input type="email" name="email" id="email" required>
				<label for="dob">Születésnap:</label>
				<input type="date" name="date-of-birth" id="dob">
				<div>
					Nem:
					<label><input type="radio" name="gender" value="male" checked> Férfi</label>
					<label><input type="radio" name="gender" value="female"> Nő</label>
				</div>
				<label for="intro">Bemutatkozás:</label>
				<textarea name="introduction" id="intro" maxlength="300" rows="6"></textarea>
				<div>
					<label for="pfp">Profilkép:</label>
					<input type="file" name="profile-picture" id="pfp">
				</div>
				<input type="reset" name="reset" value="Visszaállítás">
				<input type="submit" name="signup" value="Regisztráció">
			</form>
			<hr style="visibility: hidden;">
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>