<?php
#Naming: placeholder: no capitals
#placeholder -> variable: camelCase
#normal variable: snake_case
#db name: no capitals

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function findUserByName($pdo,$userName){
    $parameters=[':name'=>$userName];
    $query = query($pdo,'SELECT id FROM users WHERE name=:name',$parameters);
    return $query->fetch();
}



##############################################################
function totalPosts($pdo){
    $query=query($pdo, 'SELECT COUNT(*) FROM posts');
    $row = $query->fetch();
    return $row[0];
}

function totalUsers($pdo){
    $query=query($pdo, 'SELECT COUNT(*) FROM users');
    $row = $query->fetch();
    return $row[0];
}

function totalModules($pdo){
    $query=query($pdo, 'SELECT COUNT(*) FROM modules');
    $row = $query->fetch();
    return $row[0];
}
##############################################################



##############################################################
function getPost($pdo,$postId){
    $parameters=[':id'=>$postId];
    $query = query($pdo,'SELECT * FROM posts WHERE id=:id',$parameters);
    return $query->fetch();
}

function getUser($pdo,$userId){
    $parameters=[':id'=>$userId];
    $query = query($pdo,'SELECT * FROM users WHERE id=:id',$parameters);
    return $query->fetch();
}

function getModule($pdo,$moduleId){
    $parameters=[':id'=>$moduleId];
    $query = query($pdo,'SELECT * FROM modules WHERE id=:id',$parameters);
    return $query->fetch();
}
##############################################################


##############################################################
function updatePost($pdo, $postId,$postText){
    $query = 'UPDATE posts SET 
        posttext =:posttext WHERE id =:id'; 
    $parameters = [':posttext' => $postText, ':id'=>$postId];
    query($pdo,$query,$parameters);
}

function updateUser($pdo, $userId,$userName,$email,$password,$role){
    $query = 'UPDATE users SET 
        name =:name,
        email =:email,
        password =:password,
        role =:role 
        WHERE id =:id'
        ; 
    $parameters = [':name' => $userName, ':email'=>$email, ':password'=>$password, ':role'=>$role, ':id'=>$userId];
    query($pdo,$query,$parameters);
}

function updateModule($pdo, $moduleId,$moduleName){
    $query = 'UPDATE modules SET 
        name =:name WHERE id =:id'; 
    $parameters = [':name' => $moduleName, ':id'=>$moduleId];
    query($pdo,$query,$parameters);
}
##############################################################



##############################################################
function deletePost($pdo,$postId){
    $parameters = [':id'=>$postId];
    query($pdo, 'DELETE FROM posts WHERE id = :id',$parameters);
}

function deleteUser($pdo,$userId){
    $parameters = [':id'=>$userId];
    query($pdo, 'DELETE FROM users WHERE id = :id',$parameters);
}

function deleteModule($pdo,$moduleId){
    $parameters = [':id'=>$moduleId];
    query($pdo, 'DELETE FROM modules WHERE id = :id',$parameters);
}
##############################################################




##############################################################
function insertPost($pdo,$postText, $userId,$postImage,$moduleId){
    $query = 'INSERT INTO posts SET 
        posttext =:posttext,
        postdate = CURDATE(),
        uid = :uid,
        img = :postimage,
        moduleid=:moduleid';
    $parameters = [':posttext'=>$postText, ':uid'=>$userId, ':postimage'=>$postImage, ':moduleid'=>$moduleId];
    query($pdo,$query,$parameters);
}

function insertUser($pdo,$userName,$email,$password,$role){
    $query = 'INSERT INTO users SET 
        name =:name,
        email =:email,
        password =:password,
        role =:role';
    $parameters = [':name'=>$userName, ':email'=>$email, ':password'=>$password, ':role'=>$role];
    query($pdo,$query,$parameters);
}

function insertModule($pdo,$moduleName){
    $query = 'INSERT INTO modules SET 
        name =:name';
    $parameters = [':name'=>$moduleName];
    query($pdo,$query,$parameters);
}
##############################################################




function getValidation($pdo,$userName,$password){
    $parameters=[':name'=>$userName, ':password'=>$password];
    $query = query($pdo,'SELECT * FROM users WHERE name=:name and password =:password',$parameters);
    return $query->fetch();
}


//all Functions
function allUsers($pdo){
    $users = query($pdo,'SELECT * FROM users');
    return $users->fetchAll();
}

function allModules($pdo){
    $modules = query($pdo, 'SELECT * FROM modules');
    return $modules -> fetchAll();
}

function allPosts($pdo){
    $query ='SELECT posts.id, posttext, postdate, `img`, users.name as user, users.id as uid,email, modules.name as module FROM posts
    INNER JOIN users ON uid = users.id
    INNER JOIN modules ON moduleid = modules.id';
    $posts = query($pdo,$query);
    return $posts->fetchAll();
}

###############################################################
function sendAdminEmail(string $subject, string $message, array $extraHeaders = []): bool
{
    // Change this to your real admin email
    $adminEmail = 'you@yoursite.com';   // <-- PUT YOUR EMAIL HERE

    $fullSubject = '[IJDB] ' . $subject;

    // Basic headers every email should have
    $headers = [
        'From'           => 'no-reply@yoursite.com',
        'X-Mailer'       => 'PHP/' . phpversion(),
        'Content-Type'   => 'text/plain; charset=UTF-8'
    ];

    // Merge any extra headers the caller passed
    foreach ($extraHeaders as $key => $value) {
        $headers[$key] = $value;
    }

    // Convert headers array to string
    $headerString = '';
    foreach ($headers as $k => $v) {
        $headerString .= "$k: $v\r\n";
    }

    // Clean up message (remove any injected headers)
    $cleanMessage = strip_tags(trim($message));

    // Send the email
    return mail($adminEmail, $fullSubject, $cleanMessage, $headerString);
}

