<form action ="" method ="post">
    <input type ="hidden" name ="userid" value="<?=$user['id'];?>">

    <label for='username'>New username: </label> 
    <textarea name='username' rows="3" cols="40"> <?=$user['name']?></textarea>

    <label for='email'>Email: </label>
    <input type='text' name='email' value="<?=$user['email']?>">

    <label for='role'>Role: </label>
    <input type='text' name='role' value="<?=$user['role']?>">

    <input type = "submit" name ="submit" value="Save">
</form>
