<p><?=$totalModules?> modules are available in the Student Forum.</p>
<?php foreach ($modules as $module): ?> 
    <blockquote>
        <?=htmlspecialchars($module['name'],ENT_QUOTES, 'UTF-8')?> 
        <br>
        <a href="edit_module.php?id=<?=$module['id']?>">  Edit</a>

        <form action="delete_module.php" method="post"> 
            <input type="hidden" name ="id" value ="<?=$module['id']?>"> 
            <input type ="submit" value ="Delete">
        </form>
    </blockquote> 
    <?php endforeach;?>