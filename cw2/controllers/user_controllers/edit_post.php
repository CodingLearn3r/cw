<?php
include '../../includes/DatabaseConnection.php';
include '../../includes/DatabaseFunctions.php';

if(isset($_POST['posttext'])){  
    try{
        if ($_POST['postmodule'] == "") {
            $_POST['postmodule'] = getPost($pdo,$_POST['postid'])['moduleid'];
        }
        updatePost($pdo,$_POST['postid'],$_POST['posttext'], $_POST['postmodule']);
        header('location:all_posts.php'); 
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }

}else {
    $modules = allModules($pdo);
    $post = getPost($pdo,$_GET['id']);
    $title = 'Edit Post'; 
    ob_start();
    include 'user_temp/edit_post.html.php'; 
    $output=ob_get_clean();
}
include 'user_temp/layout.html.php'; 
?>