<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/styles/style_user_detail.css" ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="<?= ASSETS_URL . "logo6.png" ?>" alt="logo" id="logo-slika">
            <h4 class="logo"><a href="<?= BASE_URL . "start" ?>" class="traveler">Traveler</a></h4>
        </div>
        <nav>
            <ul class="nav-links">
                <li class="izbor"><a href="<?= BASE_URL . "about" ?>" class="nav-link">About</a></li>
            </ul>
        </nav>
        <div class="sign-in">
            <?php if ( isset($_SESSION["user"])): ?>                                
                <h3 id="logout"><a href="<?= BASE_URL . "logout" ?>" id="log-out-text">Log out</a></h3>
            <?php else: ?>
                <h3 id="signn"><a href="<?= BASE_URL . "login" ?>" id="sign-text">Sign in</a></h3>
            <?php endif; ?>
            
        </div>
        
        
    </header>
    <div class="naslov">
        <h1 class="user-naslov">User profile</h1>
    </div>
    <div class="karta">
        <div class="slika">
                <div class="ikona">
                    <img src="<?= ASSETS_URL . "profile1.png" ?>" alt="profile" class="slika">
                </div>
        </div>
        <div class="ime">
                <h3 class="nm"><?= $_SESSION["user"]["nm"] ?></h3>
                <h3 class="username">@<?= $_SESSION["user"]["username"] ?></h3>
        </div>
        
    </div>
    <div class="bookings">
            <div class="naslov-bookings">
                <h3 class="bookings-tekst">Your bookings:</h3>
            </div>
            <?php if(empty($bookings)): ?>
                <h3 class="yet">You have no bookings yet!</h3>
                <h3>Browse hotels to make a reservation!</h3>
            <?php else: ?>
                <?php foreach ($bookings as $book): ?>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8') ?>" method="post">
                    <input type="hidden" name="booking_id" value="<?= $book["booking_id"] ?>">
                    <div class="tabela">
                        <table>
                            <tr>
                                <th></th>
                                <th>Hotel Name</th>
                                <th>Dates of visit</th>
                                <th>Number of people</th>
                                <th>Price</th>
                            </tr>
                            <tr>
                                <td><button class="btn-del">Delete</button></td>
                                <td><?= $book["hotel_name"] ?></td>
                                <td><?= $book["dates"] ?></td>
                                <td><?= $book["people"] ?> person(s)</td>
                                <td><?= $book["price"] ?> EUR</td>
                            </tr>
                        </table>
                        
                    </div>
                </form>
                <?php endforeach; ?>
            <?php endif; ?>
    </div>
</body>
</html>