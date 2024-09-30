<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" text="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="POST">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])){ ?>
            <p class="error"> <?php echo $_GET['error']?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username"><br>
        <label>Password</label>
        <input type="Password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>