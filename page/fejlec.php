<header>
	<h1><a href="main.php">MyAnimalList</a></h1>
</header>
<nav>
	<ul>
		<li><a href="toplist.php">Ranglista</a>
		</li><li><a href="users.php">Felhasználók</a>
		<?php if(isset($_SESSION['username'])) : ?>
			<?php echo "</li><li><a href='profile.php?user=" . $_SESSION['username'] ."'>Profil</a></li>"; ?>
			</li><li><a href="page/logout_action.php?logout='1'">Kijelentkezés</a></li>
		<?php else : ?>
			</li><li><a href="login.php">Bejelentkezés</a></li>
		<?php endif ?>
	</ul>
</nav>