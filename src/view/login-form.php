<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/styles/style_login_form.css" ?>">
    <title>Login Form</title>
</head>
<body>
    <div class="wrap">
        <div class="slika">
            <img src="../assets/about.png" alt="plane" id="plane_photo">
        </div>
        <div class="content">
            <div class="register">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8') ?>" method="post">
                    <h3 id="register-naslov">Register</h3>
                    <input type="text" placeholder="name" class="inputi" name="nm" pattern="[ a-zA-ZšđčćžŠĐČĆŽ\.\-]+" minlength="4" maxlength="20" required> <br>
                    <input type="text" placeholder="username" class="inputi" name="username" pattern="[A-Za-z0-9]+" minlength="4" maxlength="10" required><br>
                    <input type="password" placeholder="password" class="inputi" name="password" minlength="3" maxlength="10" required><br>
                    <button class="dugmi">Register</button>
                </form>   
            </div>
            <div class="already">Already have an account?</div>
            <div class="login">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8') ?>" method="post">
                    <h3 id="sign-naslov">Sign In</h3>
                    <input type="hidden" name="in"  value="in">
                    <input type="text" placeholder="username" class="inputi" name="username"> <br>
                    <input type="password" placeholder="password" class="inputi" name="password"> <br>
                    <button class="dugmi">Sign In</button> 
                    <?php if (!empty($errorMessage1)): ?>
                        <p class="success"><?= $errorMessage1 ?></p>
                    <?php endif; ?>
                    <?php if (!empty($errorMessage)): ?>
                        <p class="important"><?= $errorMessage ?></p>
                    <?php endif; ?>
                </form>              
            </div>
        </div>
    </div>
    
</body>
</html>