<form action ="" method ="post">

    <label for='posttext'>Post text content here: </label> 
    <textarea name='posttext' rows="3" cols="40"></textarea>

    <label for='postimage'>Image for the post: </label> 
    <input type="file" name ="postimage"> 

    <input type="hidden" name ="postuser" value = <?=htmlspecialchars($userid,ENT_QUOTES, 'UTF-8');?>> 

    <select name ="postmodule">
        <option value="">Select a module/topic</option>
        <?php foreach ($modules as $module):?>
            <option value ="<?=htmlspecialchars($module['id'],ENT_QUOTES, 'UTF-8'); ?>">
                <?=htmlspecialchars($module['name'],ENT_QUOTES, 'UTF-8');?>
        </option>
        <?php endforeach;?>
    </select>


    <input type = "submit" name ="submit" value="Add">
</form>
