<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
<body>
    <div class="wrapper">
    <form action="regisact.php" method="post">
            <label for="Username">Username</label>
            <input type="text" name="username" id="Username" required>

            <label for="Password">Password</label>
            <input type="password" name="password" id="password" required>
            
            <label for="Nama">Nama</label>
            <input type="text" name="nama" id="nama"required>
            
            <label for="Email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>