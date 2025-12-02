<?php
if(isset($_POST['posttext'])){ 
    try{
        include '../../includes/databaseConnection.php'; 
        include '../../includes/databaseFunctions.php';

        insertPost($pdo, $_POST['posttext'],$_POST['postuser'],$_POST['postimage'],$_POST['postmodule']);

        header('location: all_posts.php'); 
    } 
    catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }
}else {
    include '../../includes/DatabaseConnection.php';
    include '../../includes/DatabaseFunctions.php';
    session_start();
    $title = 'Add a new post'; 
    $userid = $_SESSION['userid'];
    $modules = allModules($pdo);

    ob_start();
    include 'admin_temp/add_post.html.php'; 
    $output=ob_get_clean();
}
include 'admin_temp/layout.html.php'; 
?>