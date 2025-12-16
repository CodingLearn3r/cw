<?php

    include '../../includes/DatabaseConnection.php'; 
    include '../../includes/DatabaseFunctions.php';

    $modules=allModules($pdo);

    $title = 'Modules'; 
    $totalModules=totalModules($pdo);

    ob_start();
    include 'admin_temp/all_modules.html.php'; 
    $output = ob_get_clean();


include 'admin_temp/layout_m.html.php'; 
?>