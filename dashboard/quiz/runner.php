<?php

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$correct = $_POST['correct'];
$length = $_POST['total'];
$append = "$correct/$length";
fwrite($myfile, $append);
fclose($myfile);

?>