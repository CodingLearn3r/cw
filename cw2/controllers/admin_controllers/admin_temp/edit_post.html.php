<form action ="" method ="post">
    <input type ="hidden" name ="postid" value="<?=$post['id'];?>">

    <label for='posttext'>Post's text </label> 
    <textarea name='posttext' rows="3" cols="40"> <?=$post['posttext']?></textarea>

    <label for='postimage'>Image: </label>
    <input type='text' name='postimage' value="<?=$post['img']?>">

    <label for='postmodule'>Module/Topic: </label>
    <input type='text' name='postmodule' value="<?=$post['moduleid']?>">

    <input type = "submit" name ="submit" value="Save">
</form>
</form>