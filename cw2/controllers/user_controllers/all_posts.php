<?php
    include '../../includes/databaseConnection.php'; 
    include '../../includes/databaseFunctions.php';

    $posts=allPosts($pdo);

    $title = 'Student posts'; 
    $totalPosts=totalPosts($pdo);

    ob_start();
    include 'user_temp/all_posts.html.php'; 
    $output = ob_get_clean();


include 'user_temp/layout.html.php'; 
?>