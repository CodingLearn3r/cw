<?php
if(isset($_POST['modulename'])){ 
    try{
        include '../../includes/databaseConnection.php'; 
        include '../../includes/databaseFunctions.php';

        insertModule($pdo, $_POST['modulename']);

        header('location: all_modules.php'); 
    } 
    catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }
}else {
    include '../../includes/DatabaseConnection.php';
    include '../../includes/DatabaseFunctions.php';
    session_start();
    $title = 'Add a new module'; 

    ob_start();
    include 'admin_temp/add_module.html.php'; 
    $output=ob_get_clean();
}
include 'admin_temp/layout_m.html.php'; 
?>