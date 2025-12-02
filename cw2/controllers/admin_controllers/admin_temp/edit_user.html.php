<form action ="" method ="post">
    <input type ="hidden" name ="userid" value="<?=$user['id'];?>">

    <label for='username'>New username: </label> 
    <textarea name='posttext' rows="3" cols="40"> <?=$user['posttext']?></textarea>

    <label for='email'>Email: </label>
    <input type='text' name='postimage' value="<?=$user['img']?>">

    <label for='role'>Role: </label>
    <input type='text' name='postmodule' value="<?=$user['moduleid']?>">

    <input type = "submit" name ="submit" value="Save">
</form>
</form>