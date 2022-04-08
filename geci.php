<?php 
var_dump("5" . "2");
echo "<br>";
$var = ["alma" => 45, "körte" => 45];

$arak = [
    "sült kru" => 400,
    "megyek" => 800,
    "backend devnek" => 300
];

foreach($arak as $x => $y) {
    echo $x . "<br>";
}



if(in_array("alma", ["alma" => 45, "körte" => 130])) {
    echo "asd";
} else {
    echo "asdf" . "<br>";
}

$arak = false;

echo $arak ? "igaz" : "hamis";

?>