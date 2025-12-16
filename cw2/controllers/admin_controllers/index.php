<?php
session_start();
#For security reasons
if (!isset($_SESSION['logged'])){
    header('Location: ../../index.php');
}

elseif ($_SESSION['logged'] == "N"){
    header('Location: ../../index.php');
} 

ob_start();
include '../templates/homeOutput.html.php';
$output= ob_get_clean();

$title = 'Home - Student Forum (Admin)';
include 'admin_temp/layout.html.php';
?>