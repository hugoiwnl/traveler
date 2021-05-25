<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/styles/style_enter.css" ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <title>Traveler</title>
</head>
<body>
    
    <div class="circle"></div>
    <div class="circle1"></div>
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
    <div class="choice1">
        <div class="explore">
            <h1 class="explore-tekst">Explore the world with Traveler!</h1>

        </div>
    </div>
    <div class="search-bar" id="app">
        <input type="text" placeholder="where would you like to travel?" id="bar" v-on:keyup="search" autofocus>
        <ul id="lista">
            <li v-for="city in cities">
               <i class="material-icons">location_city</i><a :href="'<?= BASE_URL . "city?id=" ?>' + city.id" class="city-search"> {{city.nm}}</a>
            </li>
        </ul>
    </div>
    <div class="search-icon"><i class="material-icons">search</i> </div>
    <div class="pictures">
        <img src="<?= ASSETS_URL . "travel_woman.jpg" ?>" alt="woman_travel" id="woman">
    </div>
    <div class="description">
        <p>Jobs fill your pockets, adventures fill your soul.<br>Explore the globe with <b>Traveler</b>.</p>
    </div>
    <p class="moje">Predrag Djindjic: 63180362</p>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const app = new Vue({
            el: '#app',     // Vue app will live in the context of the #app element
            data: {         // contains vue App data
                cities: []   // intitially the list of books is empty
            },
            methods: {
                search(event) { // method to be invoked on ever keyup event
                    const query = event.target.value
                    if (query == "") { // abort if parameter is empty
                        app.cities = []
                        return
                    }
                    // Axios is library for making HTTP requests from browsers (and node.js).
                    // It is an alternative to jQuery's $.ajax
                    axios.get(
                        "<?= BASE_URL . "api/city/search/" ?>",
                        { params: { query } }
                    // handle successful response
                    // all we have to do is to set received data into our books variable, vue will
                    // render elements as specified in the template above
                    ).then(response => app.cities = response.data 
                    // handle error
                    ).catch(error => console.log(error))
                }
            }
        });
    </script> 
</body>
</html>