<?php 

session_start();

$username="";
$pass="";
$pass_again="";
$email="";
$date="";
$gender="";
$intro="";
$pfp="";

$password="";

$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');

if(isset($_POST['signup'])) {

    //tőcsük fel
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $pass_again = $_POST['password-check'];
    $email = $_POST['email'];
    $date = $_POST['date-of-birth'];

    $gender = $_POST['gender'];

    $intro = $_POST['introduction'];
    //$pfp = $_FILES['profile-picture']['name'];

    //feltőtve

    //ellenőrzés
    if (preg_match('/\s/',$username)) {
        array_push($errors, "A neved nem tartalmazhat szóközt.");
    }
    if (empty($username)) { 
        array_push($errors, "Felhasználónév mező nincs kitöltve."); 
    }
    elseif(!ctype_alnum($username)) { 
        array_push($errors, "A felhasználónév csak alfanumerikus karaktereket használhat.");
    }
    if (empty($email)) { 
        array_push($errors, "Email mező nincs kitöltve."); 
    }
    elseif(strpos($email, '@') == false) { 
        array_push($errors, "Hibás formátumú email cím."); 
    }
    if (empty($pass)) { 
        array_push($errors, "Jelszó mező nincs kitöltve."); 
    }

    $q = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $user = mysqli_fetch_assoc(mysqli_query($db, $q));

    if($user) {
        if($user['username'] === $username) {
            array_push($errors, "A felhasználónév már foglalt.");
        }
        if($user['email'] === $email) {
            array_push($errors, "Az email cím már foglalt.");
        }
    }

    if(strlen($pass) < 4) {
        array_push($errors, "A jelszó túl rövid. (legalább 4 karakter szükséges)");
    }
    

	if ($pass != $pass_again) {
        array_push($errors, "A két jelszó nem egyezik meg.");
	}

    if($gender == 'male') {
        $gender = true;
    }
    else $gender = false;


    

    //ellenőrzés vége

    if(count($errors) == 0) {
        $password = hash('sha256', $pass);

        $q = "INSERT INTO users (username, password, email, szulido, nem, bemutatkozas, profilkep)
        VALUES ('$username', '$password', '$email', '$date', '$gender', '$intro', '$pfp')";
    
        mysqli_query($db, $q);


        //echo $password . "<br>";
        //echo $date;
    }

}


if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $pass = $_POST['password'];

    if (preg_match('/\s/',$username)) {
        array_push($errors, "A neved nem tartalmazhat szóközt.");
    }
    if (empty($username)) { 
        array_push($errors, "Felhasználónév mező nincs kitöltve."); 
    }
    if (empty($pass)) { 
        array_push($errors, "Jelszó mező nincs kitöltve."); 
    }

    $password = hash('sha256', $pass);

    $q = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $res = mysqli_query($db, $q);

    if(mysqli_num_rows($res) == 1) {
        $_SESSION['username'] = $username;

        header('location: main.php');
    }
    else {
        array_push($errors, "Hibás felhasználónév / jelszó!");
    }

}




?>