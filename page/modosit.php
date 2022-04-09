<?php 

session_start();

//itt csak informativ az errors
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'myanimallist');

$username = $_SESSION['username'];

if(isset($_POST['modify'])) {

    //jelszóváltás

    if($_POST['password']) {
        $password1 = $_POST['password'];

        if($_POST['password-check']) {
            $password2 = $_POST['password-check'];

            if($password1 == $password2) {

                if(strlen($password1) >= 4) {
                    $password = hash('sha256', $password1);

                    $q = "UPDATE users SET password='$password' WHERE username='$username'";
    
                    mysqli_query($db, $q);
                }
                else {
                    array_push($errors, "A jelszó túl rövid!");
                }



            }

            else {
                array_push($errors, "A két jelszó nem egyezik meg!");
            }

        }
    }

    //szulinap change
    if($_POST['date-of-birth']) {
        $date = $_POST['date-of-birth'];
        $q = "UPDATE users SET szulido='$date' WHERE username='$username'";
        mysqli_query($db, $q);
    }
    //szulinap visible change
    if(isset($_POST['dob-visible'])) {
        $q = "UPDATE users SET szullathato = 1 WHERE username='$username'";
        mysqli_query($db, $q);
    }
    else {
        $q = "UPDATE users SET szullathato = 0 WHERE username='$username'";
        mysqli_query($db, $q);
    }

    //nem change
    if($_POST['gender']) {
        $gender = $_POST['gender'];
        if($gender == 'male') {
            $gender = true;
        }
        else $gender = false;

        $q = "UPDATE users SET nem='$gender' WHERE username='$username'";
        mysqli_query($db, $q);
    }

    //nem visible change
    if(isset($_POST['gender-visible'])) {
        $q = "UPDATE users SET nemlathato = 1 WHERE username='$username'";
        mysqli_query($db, $q);
    }
    else {
        $q = "UPDATE users SET nemlathato = 0 WHERE username='$username'";
        mysqli_query($db, $q);
    }

    if($_POST['introduction']) {
        $intro = $_POST['introduction'];
        $q = "UPDATE users SET bemutatkozas='$intro' WHERE username='$username'";
        mysqli_query($db, $q);
    }


}

    //giga fioktorles
if(isset($_POST['delete'])) {
    if($_POST['password']) {
        $q = "SELECT * FROM users WHERE username = '$username'";
        $user = mysqli_fetch_assoc(mysqli_query($db, $q));

        if(hash('sha256', $_POST['password']) == $user['password']) {
            $q = "DELETE FROM users WHERE username = $username";
            
            //byebye :(
            mysqli_query($db, $q);

            unset($_SESSION['username']);
            session_destroy();
            header('location: main.php');
        }
    }        
}


?>