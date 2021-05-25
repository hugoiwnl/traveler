<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/styles/style_restaurant_detail.css" ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
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
        <div class="naslov">
            <div class="titl">
                <h1 class="ime-hotela"><?= $restaurant["nm"] ?></h1>
                <h5>#<?= $restaurant["id"] ?> of 15 best restaurants on Traveler!</h5>
            </div>  
        </div>
        <div class="drugi-deo">
            <div class="slike">
                <div class="slika1">
                    <img src="<?= ASSETS_URL . "restaurants/" . $restaurant["pic"] ?>" alt="restaurant" class="pic1">
                </div>
                <div class="slika2">
                    <img src="<?= ASSETS_URL . "restaurants/" . $restaurant["pic1"] ?>" alt="restaurant" class="pic2">
                </div>
            </div>
            <div class="tekst">
                <div class="levo">
                    <div class="opis">
                        <div class="opis-naslov">
                            <i class="material-icons">description</i>
                            <p class="about">About</p>
                        </div>
                        <p class="deskripcija"><?= $restaurant["descr"] ?></p>
                    </div>
                    <div class="hrana">
                        <div class="opis-naslov">
                            <i class="material-icons">restaurant_menu</i>
                            <p class="about">Cousine</p>
                        </div>
                        
                        <p class="cousine"><?= $restaurant["food"] ?></p>
                        
                    </div>
                </div>
                <div class="desno">
                    <div class="rating">
                        <div class="opis-naslov">
                            <i class="material-icons">thumb_up</i>
                            <p class="about">Rating</p>
                        </div>
                        <div class="rating-tekst">
                            <p class="stars"><?= $restaurant["rating"] ?> Stars</p>
                        </div>
                    </div>
                    <div class="kontakt">
                        <div class="opis-naslov">
                            <i class="material-icons">call</i>
                            <p class="about">Contact</p>
                        </div>
                        <div class="kontakt-tekst">
                            <div class="lokacija">
                                <i class="material-icons">location_on</i>
                                <p class="lok"><?= $restaurant["loc"] ?></p>
                            </div>
                            <div class="website">
                                <i class="material-icons">laptop</i>
                                <p class="web"><a href="<?= $restaurant["site"] ?>" class="linkk" target="_blank">Website</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reviews">
            <div class="ocenjivanje">
                <h1 class="review-naslov">Reviews</h1>
            </div>
            <?php if(empty($reviews)): ?>
                <div class="re">
                    <h3>There are no reviews yet.</h3>
                </div>
            <?php else: ?>
                <?php foreach ($reviews as $rev): ?>
                <div class="ocene">
                
                    <div class="gornji">
                        <h3 class="ime"><?= $rev["username"] ?></h3>
                        <h3 class="wrote">wrote a review!</h3>
                        
                    </div>
                    <div class="oceni">
                        <h3 class="zvezde">Rating:</h3>
                        <h3 class="rat"><?= $rev["rating"] ?> stars</h3>
                    </div>
                    
                    <div class="pricaa">
                        <h3 class="prica">"<?= $rev["description"] ?>"</h3>    
                    </div>
                    <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["username"]==$rev["username"]): ?>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8') ?>" method="post">
                            <div class="del">
                                <input type="hidden" name="object_id" value="<?= $restaurant["id"] ?>">
                                <input type="hidden" name="type" value="restaurant">
                                <input type="hidden" name="review_id" value="<?= $rev["review_id"] ?>">
                                <i class="material-icons">delete</i>
                                <button class="del-text">Delete</button>
                            </div>
                        </form>
                    <?php endif; ?>
                    
                
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if(isset($_SESSION["user"])): ?>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8') ?>" method="post">
                <input type="hidden" name="username" value="<?= $_SESSION["user"]["username"] ?>">
                <input type="hidden" name="type" value="restaurant">
                <input type="hidden" name="object_id" value="<?= $restaurant["id"] ?>">
                    <div class="napisi">
                        <div class="napisi-title">
                            <h3 class="wr">Write a review!</h3>
                        </div>
                        <div class="ocena">
                            <h3 class="type">Type a rating for the restaurant: </h3>
                            <input type="number" placeholder="rating" class="input1" name="rating">
                        </div>
                        <div class="deskrip">
                            <h3 class="napisi1">Describe your rating: </h3>
                            <input type="text" placeholder="description" class="input2" name="descr">
                        </div>
                        <div class="posalji">
                            <button class="btn">Post</button>
                        </div>
                    </div>
                </form>
                
            <?php else: ?>
                <div class="up">
                    <h3 class="upozorilo">Sign in to review!</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>