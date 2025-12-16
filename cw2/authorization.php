<?php
session_start();
$message = '';

if (!isset($_SESSION['logged'])){
    $message = 'Log in to continue';
    include 'login.html.php';
}

elseif ($_SESSION['logged'] == "N"){
    $message = 'Invalid username or password. Please try again';
    include 'login.html.php';
} 

elseif ($_SESSION['logged'] == "Y"){
    if ($_SESSION['role'] == "admin"){
        header('Location: controllers/admin_controllers/index.php');
    } elseif ($_SESSION['role'] == "user"){
        header('Location: controllers/user_controllers/index.php');
    }
}
?>