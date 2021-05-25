<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/styles/style_restaurants.css" ?>">
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
                    <p class="important">Welcome, <b><a href="<?= BASE_URL . "user?id=" . $_SESSION["user"]["id"] ?>" class="profil"><?= $_SESSION["user"]["nm"] ?></a></b>!</p>
                    <h3 id="logout"><a href="<?= BASE_URL . "logout" ?>" id="log-out-text">Log out</a></h3>
                <?php else: ?>
                    <h3 id="signn"><a href="<?= BASE_URL . "login" ?>" id="sign-text">Sign in</a></h3>
                <?php endif; ?>
                
            </div>
        </header>

        <div class="content">
            <div class="naslovv">
                <div class="title">
                    <h1 id="naslov">The 5 best restaurants in</h1>
                    <h1 class="grad"> <?= $restaurants[0]["city"] ?>!</h1>
                </div>
                 
                <p id="poruka">Find the perfect dining place, only with Traveler.</p>
            </div>
            <?php foreach ($restaurants as $res): ?>
            <div class="card">
                    <div class="picture">
                        <img src="<?= ASSETS_URL . "restaurants/" . $res["pic"] ?>" alt="restaurant" class="pic">
                    </div>
                    <div class="text">
                        <div class="ime_hotela">
                             <h1 class="ime"><?= $res["nm"] ?></h1>
                        </div>
                        <div class="opis">
                            <div class="lokacija">
                                <h2>Location</h2>
                                <div class="lok">
                                    <h4><?= $res["loc"] ?></h4>
                                </div>
                            </div>
                            <div class="cena">
                                <h2>Cousine</h2>
                                <div class="cen">
                                    <h4><?= $res["food"] ?></h4>
                                </div>
                            </div>
                            <div class="rating">
                                <h2>User rating:</h2>
                                <div class="rat">
                                    <h4><?= $res["rating"] ?> </h4>
                                    <i class="material-icons">star</i>
                                </div>
                            </div>
                            
                        </div>
                        <div class="pogled">
                                <h3><a href="<?= BASE_URL . "restaurants/detail?id=" . $res["id"] ?>" class="gledaj">See more</a></h3>
                        </div>
                    </div>
            </div>    
            <?php endforeach; ?>
        

        </div>
</body>
</html>