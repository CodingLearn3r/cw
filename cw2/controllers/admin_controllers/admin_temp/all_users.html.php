<p><?=$totalUsers?> Users are active in the Student Forum.</p>
<?php foreach ($users as $user): ?>
    <blockquote>
        User: <?=htmlspecialchars($user['name'],ENT_QUOTES, 'UTF-8')?>
        <br>
        Email: <a href="mailto:<?=htmlspecialchars($user['email'],ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($user['email'],ENT_QUOTES, 'UTF-8'); ?></a>
        <br>
        Role: <?=htmlspecialchars($user['role'],ENT_QUOTES, 'UTF-8')?>
        <br>

        <a href="edit_user.php?id=<?=$user['id']?>">  Edit</a>

        <form action="delete_user.php" method="post"> 
            <input type="hidden" name ="id" value ="<?=$user['id']?>"> 
            <input type ="submit" value ="Delete">
        </form>
        
    </blockquote> 
    <?php endforeach;?>