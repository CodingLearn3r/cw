<?php session_start();?>
<p><?=$totalPosts?> posts have been submitted to the Student Forum.</p>
<?php foreach ($posts as $post): ?> 
    <blockquote>
        <?=htmlspecialchars($post['posttext'],ENT_QUOTES, 'UTF-8')?> 

        (by<a href="mailto:<?=htmlspecialchars($post['email'],ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($post['user'],ENT_QUOTES, 'UTF-8'); ?></a>)

        <br /><?=htmlspecialchars($post['module'],ENT_QUOTES, 'UTF-8')?>
        <br>
        
        <?=htmlspecialchars($post['postdate'],ENT_QUOTES, 'UTF-8')?>
        <br>
        <br>
        <br /> 

        <img height ="100px" src = "../../assets/images/<?=htmlspecialchars($post['img'], ENT_QUOTES, 'UTF-8'); ?>" />

        <a href="edit_post.php?id=<?=$post['id']?>">  Edit</a>
        
        <form action="delete_post.php" method="post"> 
            <input type="hidden" name ="id" value ="<?=$post['id']?>"> 
            <input type ="submit" value ="Delete">
        </form>
        
    </blockquote> 
    <?php endforeach;?>