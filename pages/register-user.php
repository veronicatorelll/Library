
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
</head>
<body>

<h1>Register User</h1>

<nav>
    <a href="/library">Home</a>
</nav>


<form action="/library/scripts/post-register-user.php" method="post">
    <input type="text" name="username" placeholder="Username"> <br>
    <input type="text" name="password" placeholder="Password"> <br>
    <input type="submit" value="Register"> <br>
</form>
    
</body>
</html>