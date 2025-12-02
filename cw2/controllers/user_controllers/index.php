<?php
session_start();
#For security reasons
if (!isset($_SESSION['logged'])){
    header('Location: ../../index.php');
}

elseif ($_SESSION['logged'] == "N"){
    header('Location: ../../../public/index.php');
} 

ob_start();
include '../templates/homeOutput.html.php';
$output= ob_get_clean();

$title = 'Home - Student Forum';
include 'user_temp/layout.html.php';
?>