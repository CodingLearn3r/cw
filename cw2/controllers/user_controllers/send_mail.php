<?php 
session_start();
#For security reasons
if (!isset($_SESSION['logged'])){
    header('Location: ../../index.php');
}
elseif ($_SESSION['logged'] == "N"){
    header('Location: ../../../public/index.php');
}
$user_id = $_SESSION['userid'];



if (isset($_POST['submit'])) {
    include '../../includes/DatabaseConnection.php'; 
    include '../../includes/DatabaseFunctions.php';

    $title = 'Send Email to Admin';
    $message = $_POST['message']; 
    $user_email = getUser($pdo, $user_id)['email'];

    insertMessage($pdo, $user_id, $message, $date);
    
    #mail($user_email, 'User Message to Admin', $message);
    $output = 'Email sent successfully. We will get back to you soon.';
    include 'user_temp/layout.html.php';
} else {
    include '../../includes/DatabaseConnection.php'; 
    include '../../includes/DatabaseFunctions.php';

    $title = 'Send Email to Admin'; 

    ob_start();
    include 'user_temp/send_mail.html.php'; 
    $output=ob_get_clean();
    include 'user_temp/layout.html.php';
}
