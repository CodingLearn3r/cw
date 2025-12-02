<?php
if(isset($_POST['username'])){ 
    try{
        include '../../includes/databaseConnection.php'; 
        include '../../includes/databaseFunctions.php';

        insertUser($pdo, $_POST['username'],$_POST['email'],$_POST['password'],$_POST['role']);

        header('location: all_users.php'); 
    } 
    catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }
}else {
    include '../../includes/DatabaseConnection.php';
    include '../../includes/DatabaseFunctions.php';
    session_start();
    $title = 'Add a new user'; 

    ob_start();
    include 'admin_temp/add_user.html.php'; 
    $output=ob_get_clean();
}
include 'admin_temp/layout_u.html.php'; 
?>