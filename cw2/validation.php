<?php
#Backend validation for login form
#passwords: AdminPassword;, Password1;, Password2;
include 'includes/databaseConnection.php';
include 'includes/databaseFunctions.php';

$_POST['username'] = htmlspecialchars($_POST['username']);
$_POST['password'] = htmlspecialchars($_POST['password']);

$validation = getValidation($pdo, $_POST['username'], $_POST['password']);

if ($_POST['username'] == $validation['name'] && $_POST['password'] == $validation['password']) {
        if($validation['role'] == 'user'){
            session_start();
            $_SESSION['logged'] = "Y";
            $_SESSION['role'] = "user";
            $_SESSION['userid'] = findUserByName($pdo,$validation['name'])['id'];
            header('Location: authorization.php');

        } elseif ($validation['role'] == 'admin'){
            session_start();
            $_SESSION['logged'] = "Y";
            $_SESSION['role'] = "admin";
            $_SESSION['userid'] = findUserByName($pdo,$validation['name'])['id'];
            header('Location: authorization.php');
        }
}
else {
    session_start();
    $_SESSION['logged'] = "N";
    header('Location: authorization.php');
}
?>