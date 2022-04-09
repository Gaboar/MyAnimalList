<?php
session_start();

if(isset($_SESSION['username']) && isset($_GET['partner'])) {
        $db = mysqli_connect('localhost', 'root', '', 'myanimallist');

        $partner = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='" . $_GET['partner'] . "'"));
        $user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'"));
    
        //ezt automatizalni kene
        if(!$partner['profilkep']) {
            $pfp = "default.jpg";
        }
        else $pfp = $partner['profilkep'];
        
        $uzenetekSzama = mysqli_num_rows(mysqli_query($db, "SELECT * FROM uzenet WHERE (feladonev = '" . $partner['username'] . "'" . " AND vevonev = '" . $user['username'] . "') OR (feladonev = '" . $user['username'] . "'" . " AND vevonev = '" . $partner['username'] . "')"));



        if(isset($_POST['submit-msg'])) {
            $uzenetBody = $_POST['message'];

            $felado = $user['username'];
            $vevo = $partner['username'];

            echo $uzenetBody;
            


            if($uzenetBody != '') {
                $addmsgq = "INSERT INTO uzenet (feladonev, vevonev, ido, uzenet) VALUES ('$felado', '$vevo', now(), '$uzenetBody')";

                if(!mysqli_query($db, $addmsgq)) {
                    echo mysqli_error($db);
                }
    
    
    
                header('refresh: 0');
            }
           

        }

}
else {
    header('location: main.php');
}





//print(date('Y-m-d H:i:s'));





?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="img/mal.png" type="image/x-icon">
	<title>MyAnimalList - <?= $partner['username'] ?></title>
</head>
<body>

	<?php include_once("page/fejlec.php"); ?> 
	
	<main>
		<section>
			<h2>
                <img src="img/users/<?= $pfp ?>" alt="profilkép" width="50" height="50">
                <?= $partner['username'] ?>
            </h2>
		</section>
		<section id="messages">
            <?php
                if($uzenetekSzama == 0) {
                    echo "<p style='text-align:center;'>Úgy tűnik még nem beszéltél <b>". $partner['username'] . "</b> felhasználóval. Köszönj rá!";
                } else {

                    $uzik = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM uzenet WHERE (feladonev = '" . $partner['username'] . "'" . " AND vevonev = '" . $user['username'] . "') OR (feladonev = '" . $user['username'] . "'" . " AND vevonev = '" . $partner['username'] . "') ORDER BY ido ASC"));
                    //print_r($uzik);
                    for($i=0; $i<$uzenetekSzama; $i++) {
                        if($uzik[$i][1] == $user['username']) {
                            echo "<div class='message this'><p class='time'>". $uzik[$i][3] . "</p><p>". $uzik[$i][4] . "</p></div>";
                        }
                        else {
                            echo "<div class='message other'><p class='time'>". $uzik[$i][3] . "</p><p>". $uzik[$i][4] . "</p></div>";
                        }
                    }
                }
            ?>
		</section>
        <script>
            var element = document.getElementById("messages");
            element.scrollTop = element.scrollHeight;
        </script>
		<section id="send">
			<form action="uzi.php?partner=<?= $partner['username'] ?>" method="POST">
				<input type="text" name="message" id="msg" autocomplete="off">	
                <input type="submit" name="submit-msg" id="submit-btn" style="display: none;">
            </form>
		</section>
	</main>

	<?php include_once("page/footer.php"); ?>
</body>
</html>
