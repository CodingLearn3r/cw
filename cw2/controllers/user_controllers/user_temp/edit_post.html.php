<form action ="" method ="post">
    <input type ="hidden" name ="postid" value="<?=$post['id'];?>">

    <label for='posttext'>Post's text </label> 
    <textarea name='posttext' rows="3" cols="40"> <?=$post['posttext']?></textarea>

    <label for='postimage'>Image: </label>
    <input type='text' name='postimage' value="<?=$post['img']?>">

    <select name ="postmodule">
        <option value="">Select a module/topic</option>
        <?php foreach ($modules as $module):?>
            <option value ="<?=htmlspecialchars($module['id'],ENT_QUOTES, 'UTF-8'); ?>">
                <?=htmlspecialchars($module['name'],ENT_QUOTES, 'UTF-8');?>
        </option>
        <?php endforeach;?>
    </select>

    <input type = "submit" name ="submit" value="Save">
</form>
</form>