<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

if(isset($_POST['joketext'])){  
    try{    
        updateJoke($pdo,$_POST['jokeid'],$_POST['joketext']);
        header('location:jokes.php'); 
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output= 'Database error: '.$e -> getMessage();
    }

}else {
    
    $joke = getJoke($pdo,$_GET['id']);
    $title = 'Edit Joke'; 
    ob_start();
    include 'templates/editjoke.html.php'; 
    $output=ob_get_clean();
}
include 'templates/layout.html.php'; 
?>