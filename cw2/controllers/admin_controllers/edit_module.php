<?php
include '../../includes/DatabaseConnection.php';
include '../../includes/DatabaseFunctions.php';

if(isset($_POST['modulename'])){  
    try{
        updateModule($pdo,$_POST['moduleid'],$_POST['modulename']);
        header('location:all_modules.php'); 
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }

}else {

    $module = getModule($pdo,$_GET['id']);
    $title = 'Edit module'; 
    ob_start();
    include 'admin_temp/edit_module.html.php'; 
    $output=ob_get_clean();
}
include 'admin_temp/layout_m.html.php'; 
?>