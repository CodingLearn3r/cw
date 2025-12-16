<?php
try{
    include '../../includes/DatabaseConnection.php'; 
    include '../../includes/DatabaseFunctions.php';

    deleteUser($pdo,$_POST['id']);
    
    header('location: all_users.php'); 

}catch(PDOException $e){
    $title = 'An error has occurred'; 
    $output='Unable to connect to delete joke: '.$e->getMessage(); 
}
include 'user_temp/layout_u.html.php'; 