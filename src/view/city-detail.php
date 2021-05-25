<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/styles/style_city.css" ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <title>Document</title>
</head>
<body>
    <input type="hidden" value="<?= $city["lat"] ?>" id="lat">
    <input type="hidden" value="<?= $city["lng"] ?>" id="lng">
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
            <div id="visit"><h1>Visit</h1> </div>
            <div id="grad"><h1><?= $city["nm"] ?>!</h1></div>
        </div>
        <div class="slika">
            <img src="<?= ASSETS_URL . "cities/" . $city["pic"] ?>" alt="slika" id="pic">
            <img src="<?= ASSETS_URL . "cities/" . $city["pic1"] ?>" alt="slika1" id="pic1">
            <p id="opis"><?= $city["descr"] ?></p>
        </div>
        <div class="dole">
            <div class="hotels-logo">
                <h3 id="hotels-name"><a href="<?= BASE_URL . "city/hotels?id=" . $city["id"] ?>" class="linkk">Hotels</a></h3>
                <i class="material-icons">bed</i>
            </div>
            <div class="restaurant-logo">
                <h3 id="res-name"><a href="<?= BASE_URL . "city/restaurants?id=" . $city["id"] ?>" class="linkk">Restaurants</a></h3>
                <i class="material-icons">restaurant</i>
            </div>  
        </div>
        <div id="map">
                
        </div>
    </div>
    <script>
        var lt=parseFloat(document.getElementById("lat").value);
        var lg=parseFloat(document.getElementById("lng").value);

        var map = L.map('map').setView([45,22],5);
        L.tileLayer('https://api.maptiler.com/maps/streets/256/{z}/{x}/{y}.png?key=6lugAGV3bMrqSao7AT9g',{
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
        }).addTo(map);

        var marker = L.marker([lt,lg]).addTo(map);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA15pzUI2QJep1Vlo_ahshf-eY36uEhb1E&callback=initMap&libraries=&v=weekly"async></script>
</body>
</html>


