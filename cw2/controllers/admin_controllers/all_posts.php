<?php

    include '../../includes/DatabaseConnection.php'; 
    include '../../includes/DatabaseFunctions.php';

    $posts=allPosts($pdo);

    $title = 'Student posts';
    $totalPosts=totalPosts($pdo);

    ob_start();
    include 'admin_temp/all_posts.html.php';
    $output = ob_get_clean();


include 'admin_temp/layout.html.php';
?>