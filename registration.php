<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <body>
            <div class="container">
                <h1>Register</h1>
                <form action="registration-submit.php" method="post">
                    <input type="text" name="Username" placeholder="Username" maxlength="16" required>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="age" placeholder="Age" maxlength="2" required>
                    <input type="text" name="password" placeholder="Password" required>
                    <input type="submit" value="Register" name="login-button">
                </form>
            </div>
        </body>
    </head>
</html>