<?php

    include '../../includes/DatabaseConnection.php'; 
    include '../../includes/DatabaseFunctions.php';

    $users=allUsers($pdo);

    $title = 'Users'; 
    $totalUsers=totalUsers($pdo);

    ob_start();
    include 'admin_temp/all_users.html.php';
    $output = ob_get_clean();


include 'admin_temp/layout_u.html.php';
?>