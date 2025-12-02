<?php
include '../../includes/DatabaseConnection.php';
include '../../includes/DatabaseFunctions.php';

if(isset($_POST['posttext'])){  
    try{
        updatePost($pdo,$_POST['postid'],$_POST['posttext']);
        header('location:all_posts.php'); 
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }

}else {

    $post = getPost($pdo,$_GET['id']);
    $title = 'Edit Post'; 
    ob_start();
    include 'admin_temp/edit_post.html.php'; 
    $output=ob_get_clean();
}
include 'admin_temp/layout.html.php'; 
?>