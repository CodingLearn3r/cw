<?php
include '../../includes/DatabaseConnection.php';
include '../../includes/DatabaseFunctions.php';

if(isset($_POST['username'])){  
    try{
        $password = getUser($pdo,$_POST['userid'])['password'];
        updateUser($pdo,$_POST['userid'],$_POST['username'],$_POST['email'],$password,$_POST['role']);
        header('location:all_users.php'); 
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }

}else {
    $user = getUser($pdo,$_GET['id']);
    $title = 'Edit user'; 
    ob_start();
    include 'admin_temp/edit_user.html.php'; 
    $output=ob_get_clean();
}
include 'admin_temp/layout_u.html.php'; 
?>