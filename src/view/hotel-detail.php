<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/styles/style_hotel_detail.css" ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">


    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Hotel Details</title>
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
                <h1 class="ime_hotela"><?= $hotel["nm"] ?></h1>
                <h5>#<?= $hotel["id"] ?> of 15 best hotels on Traveler!</h5>
            </div>   
        </div>
        <div class="drugi-deo">
                <div class="tekst">
                    <div class="lokacija">
                        <i class="material-icons">location_on</i>
                        <h3 class="ulica"><?= $hotel["loc"] ?></h3>
                    </div>
                    <div class="cena">
                        <h3 class="price">Price for a two-person room from:</h3>
                        <h3 class="eur"><?= $hotel["price"] ?>EUR</h3>
                    </div>
                    <div class="zvezde">
                        <h3>Hotel class:</h3>
                        <h3 class="stars"> <?= $hotel["stars"] ?> stars</h3>
                    </div>
                    
                    <div class="opis">
                        <p><?= $hotel["descr"] ?></p>
                    </div>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8')  ?>" method="post">
                        <input type="hidden" name="hotel_id" value="<?= $hotel["id"] ?>">
                        <input type="hidden" name="hotel_name" value="<?= $hotel["nm"] ?>">
                        <input type="hidden" name="price" value="<?= $hotel["price"] ?>">
                        <div class="datum">
                            <div class="date">
                                <h3 class="choose">Choose the dates: </h3>
                                <input type="text" name="daterange" value="05/25/2021 - 05/27/2021" class="datepicker" />
                            </div>
                            <div class="broj-osoba">
                                <h3 class="number-of">Number of people: </h3>
                                <input type="number" name="people" class="numpicker" placeholder="2" min="1" max="5" required>
                            </div>
                        </div>
                        <div class="book">
                            <button class="bukuj">Book</button>
                        </div>
                        <?php if (!empty($errorMessage)): ?>
                            <div class="err">
                                <p class="importe"><?= $errorMessage ?></p>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="slike">
                    <div class="slidershow-middle">

                        <div class="slides">
                            <input type="radio" name="r" id="r1" checked>
                            <input type="radio" name="r" id="r2">
                            <input type="radio" name="r" id="r3">
                            <div class="slide s1" >
                                <img src="<?= ASSETS_URL . "hotels/" . $hotel["pic"] ?>" alt="hotel" class="slika">
                            </div>
                            <div class="slide">
                                <img src="<?= ASSETS_URL . "hotels/" . $hotel["pic1"] ?>" alt="hotel" class="slika">
                            </div>
                            <div class="slide">
                                <img src="<?= ASSETS_URL . "hotels/" . $hotel["pic2"] ?>" alt="hotel" class="slika">
                            </div>
                        </div>
                        <div class="navigation">
                            <label for="r1" class="bar"></label>
                            <label for="r2" class="bar"></label>
                            <label for="r3" class="bar"></label>
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
                        <h3 class="zvz"><?= $rev["rating"] ?> stars</h3>
                    </div>
                    
                    <div class="pricaa">
                        <h3 class="prica">"<?= $rev["description"] ?>"</h3>    
                    </div>

                    <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["username"]==$rev["username"]): ?>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8') ?>" method="post">
                            <div class="del">
                                <input type="hidden" name="del" value="nista">
                                <input type="hidden" name="object_id" value="<?= $hotel["id"] ?>">
                                <input type="hidden" name="type" value="hotel">
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
                
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, 'utf-8')  ?>" method="post">
                <input type="hidden" name="username" value="<?= $_SESSION["user"]["username"] ?>">
                <input type="hidden" name="type" value="hotel">
                <input type="hidden" name="object_id" value="<?= $hotel["id"] ?>">
                    <div class="napisi">
                        <div class="napisi-title">
                            <h3 class="wr">Write a review!</h3>
                        </div>
                        <div class="ocena">
                            <h3 class="type">Type a rating for the restaurant: </h3>
                            <input type="number" placeholder="rating" class="input1" name="rating" min="1" max="5" required>
                        </div>
                        <div class="deskrip">
                            <h3 class="napisi1">Describe your rating: </h3>
                            <input type="text" placeholder="description" class="input2" name="descr" pattern="[ a-zA-ZšđčćžŠĐČĆŽ\.\-]+" required>
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
    <script>
        $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        });
    

    </script>
</body>
</html>