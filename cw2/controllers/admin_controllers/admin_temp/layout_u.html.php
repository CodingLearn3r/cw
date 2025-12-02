<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../../assets/style.css">
    <title><?=$title?></title> 
</head>
<body>
    <header><h1>Student Forum</h1></header> 
    <nav>
        <ul>
            <li><a href ="index.php">Home</a></li> 
            <li><a href ="all_users.php">Manage accounts</a></li>
            <li><a href ="add_user.php">Add a new user</a></li>
            <li><a href ="../../logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <?=$output?> 
    </main>
    <footer>&copy; UGW 2025</footer>
</body>
</html>