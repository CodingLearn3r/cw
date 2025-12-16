<?php

    include '../../includes/DatabaseConnection.php'; 
    include '../../includes/DatabaseFunctions.php';

    $senders = allSenders($pdo);
    $title = 'All messages to admin'; 


    ob_start();
    include 'admin_temp/check_mail.html.php';
    $output = ob_get_clean();


include 'admin_temp/layout.html.php';
?>