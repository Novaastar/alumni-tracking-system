<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body class="login-body">
    <div class="login-container">
        <div class="login-box">
            <h2>Login Admin</h2>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>