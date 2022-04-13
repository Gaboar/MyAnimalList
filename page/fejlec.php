<?php 
$db = mysqli_connect('localhost', 'root', '', 'myanimallist');

if(isset($_SESSION['username'])) {
	$fejlecfetch = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'"));
}
	

?>

<header>
	<h1><a href="main.php">MyAnimalList</a></h1>
</header>
<nav>
	<ul>
		<li><a href="toplist.php">Ranglista</a>
		</li><li><a href="users.php">Felhasználók</a>
		<?php if(isset($_SESSION['username']) && $fejlecfetch['isadmin']) : ?>
			</li><li><a href="addanimal.php">Állat hozzáadása</a>
			</li><li><a href="removeanimal.php">Állat törlése</a>
		<?php endif ?>	
		<?php if(isset($_SESSION['username'])) : ?>
			</li><li><a href="profile.php?user=<?=$_SESSION['username']?>">Profil</a>
			</li><li><a href="page/logout_action.php?logout='1'">Kijelentkezés</a>
		<?php else : ?>
			</li><li><a href="login.php">Bejelentkezés</a></li>
		<?php endif ?>
	</ul>
</nav>