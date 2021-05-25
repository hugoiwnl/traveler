-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 05:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `people` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `hotel_name`, `dates`, `people`, `price`) VALUES
(12, 9, 'Mama Shelter Belgrade', '05/20/2021 - 05/24/2021', 2, 85),
(13, 9, 'Hotel Dubrovnik', '06/03/2021 - 06/05/2021', 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `nm` varchar(255) NOT NULL,
  `descr` varchar(555) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `nm`, `descr`, `pic`, `pic1`, `lat`, `lng`) VALUES
(1, 'Belgrade', 'Belgrade\'s long and storied history is suggested by its architecture, which varies from Byzantine and Ottoman to neoclassic and romantic buildings in the older neighborhoods, and from Art Nouveau to brutalism and neo-Byzantine design in New Belgrade. The city\'s many theaters, museums, monuments and opera houses boast a deep and fissured cultural life while the beaches and rivers attract sunbathers, sports enthusiasts and partygoers on the popular floating river barges that serve as nightclubs.', 'belgrade.jpg', 'belgrade1.jpg', '44.787197', '20.457273'),
(2, 'Ljubljana', 'Slovenia, wedged between Austria and Italy, has always been proud of its unique heritage. The capital, Ljubljana, is a perfect example of this blend of German, Mediterranean, and Slovenian culture. The old town is a blend of Baroque, Renaissance, and Art Nouveau buildings, watched over by a medieval castle. Cut through the gardens of Tivoli Park to the National Museum of Contemporary History for a history of modern Slovenia, featuring crumbled statues of Stalin and a recreation of a WWI trench.', 'ljubljana.jpg', 'ljubljana1.jpg', '46.05108', '14.50513'),
(3, 'Zagreb', 'Zagreb got its start as two medieval fortress towns atop hills overlooking the Sava River, and was reborn in the Baroque period as center of business, perfectly located on routes connecting Central Europe to the Adriatic Sea. These days, Zagreb is the heart of contemporary Croatia’s culture, art, sports, and academics, but its history is not forgotten. The unique blend of medieval towers, 19th century palaces, open-air markets, and ancient cathedrals, make Zagreb the perfect city to explore.', 'zagreb.jpg', 'zagreb1.jpg', '45.815399', '15.966568');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `nm` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `rating` float NOT NULL,
  `stars` int(11) NOT NULL,
  `descr` varchar(555) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `nm`, `loc`, `city`, `price`, `rating`, `stars`, `descr`, `city_id`, `pic`, `pic1`, `pic2`) VALUES
(1, 'Mama Shelter Belgrade', 'Kneza Mihaila 54A, Beograd 11000', 'Belgrade', 85, 4.5, 5, 'It is where the city is the most vibrant, in the heart of all the action, that Mama has settled down. Its 125 rooms with 5-star bedding, designed by Jalil Amor, line Ulica Kenza Mihajla, the capital\'s iconic pedestrian street. Mama never forgot that Belgrade is an important city in Southern Europe, and has incorporated this part of Belgrade\'s identity in the menu.', 1, 'mama-shelter.jpg', 'mama-shelter1.jpg', 'mama-shelter2.jpg'),
(2, 'Saint Ten', 'Svetog Save 10, Belgrade 11000', 'Belgrade', 160, 5, 5, 'Designed to reflect the residential luxury of Vracar, SAINT TEN Hotel offers 54 designed rooms rich in elegance and comfort. Our rooms, peaceful yet warm are the perfect blend of traditional chic and modern design featuring wooden floors, handmade and unique furniture with bathrooms in natural stone and rain shower, Noir Toiletries as an additional part for your experience, smart TV system, individual climate control.', 1, 'saint-ten.jpg', 'saint-ten1.jpg', 'saint-ten2.jpg'),
(3, 'Metropol Palace', 'Bulevar kralja Aleksandra 69, Beograd 11000', 'Belgrade', 90, 4.5, 4, 'This stunning Marriott, Luxury Collection hotel is located in the very center of the city. With its park surroundings, exceptional accommodation and impeccable service, the Metropol Palace offers you an unforgettable Belgrade experience. In addition to the exciting location and luxurious accommodation, guests can also enjoy its numerous amenities, from the peaceful privacy of the Spa & Wellness area, to an exceptional dinner in one of the hotel restaurants.', 1, 'metropol-palace.jpg', 'metropol-palace1.jpg', 'metropol-palace2.jpg'),
(4, 'Hyatt Regency Belgrade', 'Milentija Popovića 5, Beograd 11000', 'Belgrade', 115, 4.5, 4, 'Experience the unique, modern and energizing spirit of Hyatt Regency Belgrade Hyatt Regency Belgrade is the preferred upscale hotel for leisure and business travelers, conveniently located in the heart of New Belgrade, the capital’s main business and entertainment district. Close to the city center and well connected to Belgrade airport. Enjoy long walks along the Sava river, have fun in the largest shopping mall in the city or just relax at the hotel’s Club Olympus Fitness facilities.', 1, 'hyatt.jpg', 'hyatt1.jpg', 'hyatt2.jpg'),
(5, 'Hotel Moskva', 'Balkanska 1, Beograd 11000', 'Belgrade', 85, 4.6, 4, 'Located in the very city center, Hotel Moskva is an excellent choice for travelers visiting Belgrade, offering a luxury environment alongside many helpful amenities designed to enhance your stay. As your “home away from home,” the hotel rooms offer a flat screen TV, air conditioning, minibar and high speed with free wifi available in all hotel premises. Guests have access to room service and a concierge while staying at Hotel Moskva.', 1, 'hotel-moskva.jpg', 'hotel-moskva1.jpg', 'hotel-moskva2.jpg'),
(6, 'Hotel Cubo', 'Slovenska cesta 15, 1000 Ljubljana', 'Ljubljana', 120, 5, 5, 'Hotel Cubo is located in the centre of Slovenian capital Ljubljana, right opposite to the traffic free historical centre, within walking distance from the most important sightseeing sites and the shopping streets with lots of restaurants. It offers 26 modern rooms (2 Junior suites, 14 double rooms with one king bed, 7 twin rooms, 3 single rooms). All rooms are luminous and decorated with particularly good taste in a warm contemporary style using only the highest quality materials and amnesties, such as prestigious bed linen by Rivola Carmignani.', 2, 'hotel-cubo.jpg', 'hotel-cubo1.jpg', 'hotel-cubo2.jpg'),
(7, 'Grand Hotel Union', 'Miklošičeva cesta 1, 1000 Ljubljana', 'Ljubljana', 180, 4.5, 5, 'The first class hotel in Ljubljana, boasting a premier location in the city centre, offering most spacious & comfortable rooms, excellent complimentary buffet breakfast, free internet, secured parking garage and business centre.Located on the door step of the Old Town and less than 30 minutes from the international airport, Grand hotel Union Executive has got city\'s top location for business & leisure travellers. It is also the address of royal visits, presidential delegations, and major Ljubljana\'s events.', 2, 'hotel-union.jpg', 'hotel-union1.jpg', 'hotel-union2.jpg'),
(8, 'Radisson Blu Plaza Hotel', 'Bratislavska cesta 8, 1000 Ljubljana', 'Ljubljana', 160, 4.5, 4, 'Radisson Blu Plaza Hotel Ljubljana is a 4-star superior hotel located in Ljubljana and offers an à-la-carte restaurant, conference rooms and a gym. It features modern-style accommodation with free WiFi. All accommodation units are decorated in beige tones, and provide modern amenities such as LED satellite TV. Each room features a working area, an orthopedic bed, a minibar and coffee making facilities.', 2, 'radisson.jpg', 'radisson1.jpg', 'radisson2.jpg'),
(9, 'Hotel Nox', 'Celovška cesta 469, 1000 Ljubljana', 'Ljubljana', 100, 4.5, 4, 'See why so many travelers make Hotel Nox their hotel of choice when visiting Ljubljana. Providing an ideal mix of value, comfort and convenience, it offers a romantic setting with an array of amenities designed for travelers like you.Nearby landmarks such as Župnija Ljubljana - Podutik and Romarska c. Matere Bozje make Hotel Nox a great place to stay when visiting Ljubljana.', 2, 'hotel-nox.jpg', 'hotel-nox1.jpg', 'hotel-nox2.jpg'),
(10, 'G Design Hotel', 'Tržaška cesta 330, 1000 Ljubljana', 'Ljubljana', 110, 4.5, 4, 'G Design Hotel offers luxurious rooms with free Wi-Fi, free parking, a business centre with meeting facilities and a restaurant serving traditional and international specialities.Situated 5 km from the centre of Ljubljana, by the highway exit, set amongst meadows in the quiet outskirts of Ljubljana it is the perfect choice for business trips, as well as for those who enjoy the buzz of the city as well as the tranquility of nature.', 2, 'g-design.jpg', 'g-design1.jpg', 'g-design2.jpg'),
(11, 'Hotel Dubrovnik', 'Gajeva ulica 1, 10000, Zagreb', 'Zagreb', 100, 4.5, 4, 'Hotel Dubrovnik is located on the main city square of Zagreb which has a unique hospitality tradition since 1929. It is the only hotel located in the heart of Zagreb and it is surrounded by most of the major tourist sites such as the cathedral, Zagreb old town, Dolac market, parks, bars and restaurants. The hotel contains a total of 222 rooms which are equipped with air-conditioning, private bathrooms with showers or a bathtub, hairdryer, TV and a minibar.', 3, 'dubrovnik.jpg', 'dubrovnik1.jpg', 'dubrovnik2.jpg'),
(12, 'Esplanade Zagreb Hotel', 'Ulica Antuna Mihanovića 1, 10000, Zagreb', 'Zagreb', 110, 4.5, 5, 'Esplanade Zagreb Hotel built in 1925 for the passengers of the old Orient Express and completely renovated in 2004, features 208 spacious and lavishly furnished rooms and suites. Our Zagreb hotel rooms and suites feature luxurious and convenient amenities such as marble bathrooms, fluffy bathrobes, and free super-fast Internet access. Esplanade Zagreb accommodations provide the best of both luxury and convenience and are ideal for busy travelers and those seeking rest and relaxation.', 3, 'esplanade.jpg', 'esplanade1.jpg', 'esplanade2.jpg'),
(13, 'Hotel Jagerhorn', ' Ilica 14, 10000, Zagreb', 'Zagreb', 80, 4.5, 4, 'Welcome to Hotel Jägerhorn; an intimate oasis of style, service and comfort in the very center of Zagreb, Croatia. The oldest standing hotel in the city, the Jägerhorn enjoys a truly privileged location at just a stone’s throw from the main Ban Jelačić square in the heart of Zagreb. Nestled in a passage connecting the historic upper town with the city center, the hotel houses 18 elegantly appointed rooms, a stylish café offering the finest beverages, and the most beautiful terraces and garden to be found in the city.', 3, 'jager.jpg', 'jager1.jpg', 'jager2.jpg'),
(14, 'Hotel 9', 'Avenija Marina Držića 9, 10000, Zagreb', 'Zagreb', 80, 4.5, 4, 'Located just across the main bus station, this boutique hotel was built in 2013 and it offers an on-site bar, modernly furnished rooms with air conditioning and free Wi-Fi. The centre of Zagreb with all its sights is 1,7 km from Hotel 9. All rooms feature intelligent room systems, smart TVs and minibars. Each one comes with a bathroom fitted with a shower and a hairdryer.', 3, 'hotel9.jpg', 'hotel91.jpg', 'hotel92.jpg'),
(15, 'Doubletree by Hilton Zagreb', 'Ulica grada Vukovara 269A, 10000, Zagreb', 'Zagreb', 80, 4.5, 5, 'The DoubleTree by Hilton Zagreb is a 5 stars hotel conveniently located in the Green Gold business & shopping district; just in walking distance from the city center. The hotel is only 20 minutes (15km) driving from the airport. All of our guest rooms and suites offer the Sweet Dreams® by Doubletree sleep experience, complimentary high-speed internet access, LCD TV and separate shower stall and bathtub.', 3, 'doubletree.jpg', 'doubletree1.jpg', 'doubletree2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotels-city`
--

CREATE TABLE `hotels-city` (
  `hotel_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels-city`
--

INSERT INTO `hotels-city` (`hotel_id`, `city_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `nm` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `descr` varchar(455) NOT NULL,
  `city_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `nm`, `loc`, `food`, `rating`, `descr`, `city_id`, `city`, `pic`, `pic1`, `site`) VALUES
(1, 'Skylounge Belgrade', 'Kralja Milana 35, Beograd 11000', 'Japanese', 5, 'With breathtaking panoramic view over the city of Belgrade, SkyLounge is a stylish rooftop bar. Located on the 8th floor of the Hilton Belgrade hotel with an outdoor terrace. Enjoy signature cocktails, Pan-Asian cuisine and prime cuts of meat.', 1, 'Belgrade', 'skylounge.jpg', 'skylounge1.jpg', 'https://skyloungebelgrade.rs/'),
(2, 'Frans', 'Bulevar Oslobođenja 18a, Beograd 11000', 'Mediterranean', 4.5, 'Restaurant Franš is one of the most prominent restaurants in Belgrade that is sure to win all your senses.It is situated in an ideal location in Autokomanda, at the edge of the highway, and is very accessible from all parts of the city.', 1, 'Belgrade', 'frans.jpg', 'frans1.jpg', 'https://frans.rs/'),
(3, 'Salon 1905', 'Karađorđeva 48 Beograd, 11000', 'Italian', 4.5, 'With Salon 5 we’ve broken new grounds when it comes to personalized cuisine, but now we wanted to take things further. Situated in the iconic ‘Geozavod’ edifice in the very heart of Belgrade’s old town, Salon 1905 offers a truly one of a kind fine dining.', 1, 'Belgrade', 'salon.jpg', 'salon1.jpg', 'https://www.salon1905.rs/'),
(4, 'Sakura', 'Karađorđeva 2-4, Beograd 11000', 'Japanese', 5, 'One of the most beautiful locations for relaxation and fun in Belgrade, richer for a new exclusive restaurant of the Far Eastern cuisine - Sakura. This contemporary restaurant with a sophisticated touch of the Far East has combined superior flavors of Asian cuisine and magnificent view of the confluence of the Sava and Danube rivers.', 1, 'Belgrade', 'sakura.jpg', 'sakura1.jpg', 'http://www.sakurarestoran.rs/sr/pocetna'),
(5, 'Restoran Klub Knjizevnika', 'Francuska 7, Beograd 11000', 'Serbian', 4, 'Klub Književnika Restaurant has been bringing together the greatest Serbian writers, actors, novelists for more than seventy years. It is fiercely protecting its spirit and resisting against the passage of time. This restaurant is the place where the great people of today meet with the young new hopes of tomorrow.', 1, 'Belgrade', 'klub.jpg', 'klub1.jpg', 'https://klubknjizevnika.rs/'),
(6, 'Capriccio Ristopizza', 'Trubarjeva cesta 52, 1000 Ljubljana', 'Italian', 5, 'Stefano Rado, the owner of Cappriccio, has fallen in love with the green capital of Slovenia upon his first visit and has decided to move here. But an Italian who has two restaurants in Padua, Italy, missed an authentic ‘ristopizza’ with an Italian pizza-making master. That is why he invited Luca to work with him. The two have been working together for the past 20 years.', 2, 'Ljubljana', 'ristopizza.jpg', 'ristopizza1.jpg', 'https://www.capriccio.si/en/'),
(7, 'Kodila Gourmet', 'Adamič-Lundrovo nabrežje 5, 1000 Ljubljana', 'Slovenian', 5, 'Kodila gourmet is a place well known for its traditional Slovenian food. We offer products from the region of Prekmurje – prekmurska and smoked ham, prekmurska gibanica, ocvirki, and many more. You are welcome for a bite of good food, drinks or coffee at the Ljubljana central market.', 2, 'Ljubljana', 'kodila.jpg', 'kodila1.jpg', 'https://gourmet-lj.si/en/gourmet-experiences/restaurants-and-bars/kodila-gourmet'),
(8, 'Restavracija Strelec', 'Grajska planota 1, 1000 Ljubljana', 'Slovenian', 4.5, 'The Restavracija Strelec restaurant, located in Ljubljana Castle\'s picturesque Shooters\' Tower, offers an experience of authentic historical ambience coupled with top-quality Slovenian cuisine combining the best of the past and present.', 2, 'Ljubljana', 'strelec.jpg', 'strelec1.jpg', 'https://strelec.kaval-group.si/'),
(9, 'Restaurant Compa', 'Trubarjeva cesta 40, 1000 Ljubljana', 'Steakhouse', 4, 'A long-time local favourite for perfectly seasoned and prepared meat, it\'s one of the few restaurants in Ljubljana where you\'ll definitely want to make a reservation in advance. The menu is a single page, with a handful of cold and hot starters, so the main decision you\'ll have to make is whether you want beef, pork or horse.', 2, 'Ljubljana', 'compa.jpg', 'compa1.jpg', 'https://www.facebook.com/%C4%8Compa-209021859192246/'),
(10, 'Landerik', 'Stari trg 11, 1000 Ljubljana', 'Slovenian', 4.5, 'Landerik is in love with its homeland. Every single dish served here begins its journey somewhere in the wide countryside of our beautiful Slovenia, where, with the help of dedicated local growers and farmers, a key ingredient is selected - and it forms an important part of the whole plate, which is then tasted by Landerik guests.', 2, 'Ljubljana', 'landerik.jpg', 'landerik1.jpg', 'https://landerik.si/'),
(11, 'Heritage', 'Petrinjska ul. 14, 10000, Zagreb', 'Croatian', 5, 'The homely atmosphere of Heritage Croatian Food allows customers to relax after a hard working day. The success of this place would be impossible without the knowledgeable staff. Fabulous service is something that visitors note in their comments. Most reviewers mention that the dishes have affordable prices.', 3, 'Zagreb', 'heritage.jpg', 'heritage1.jpg', 'https://www.tripadvisor.rs/Restaurant_Review-g294454-d11779919-Reviews-HERITAGE_I_Croatian_Food_I_Snack_bar-Zagreb_Central_Croatia.html'),
(12, 'Zinfadel\'s', 'Ulica Antuna Mihanovića 1, 10000, Zagreb', 'Contemporary', 4.5, 'Zagreb Glavni Kolodvor is what you should see after having a meal at Zinfandel\'s. Have a nice time here and share tasty veal, sea bass and beef tartare with your friends. This restaurant provides good ice cream, crème brûlée and petit fours. Delicious house wine, champagne or liqueur are among the tastiest drinks to try. A lot of visitors order great coffee, tea or juice.', 3, 'Zagreb', 'zinfadel.jpg', 'zinfadel1.jpg', 'https://www.zinfandels.hr/en/mainpage.html'),
(13, 'L\'oro di napoli', 'Ratarska ul. 11, 10000, Zagreb', 'Italian', 4.5, 'When you enter L’Oro di Napoli, you real feel being brought immediately in Naples’ environment and genuinity. Quality of ingredients, warmth and courtesy of owner and manager ‘Enzo’ make it a dream-spot for any pizza-lover and I really find the best Italian restaurant in Zagreb by a long shot.', 3, 'Zagreb', 'napoli.jpg', 'napoli1.jpg', 'https://www.facebook.com/lorodinapoli.zagreb/'),
(14, 'Zrno Bio Bistro', 'Medulićeva ul. 20, 10000, Zagreb', 'European', 4.5, '100% organic food, the only place in Croatia which can boast such a thing, it also a decent selection of regional wines available. The interior is warm in appearance, with a terrace outside if the weather allows. There’s a bookstore in the basement as well, for budding architects.', 3, 'Zagreb', 'bistro.jpg', 'bistro1.jpg', 'https://zrnobiobistro.hr/'),
(15, 'Pri Zvoncu', 'Ulica Vrbik XII 1, 10000, Zagreb', 'Barbacue', 4, 'Mouthwatering rump steaks, mushroom soup and grilled meat can be what you need. The feature of this restaurant is serving tasty ice cream, tiramisu and strudels. Check out delicious house wine, craft beer or fino sherry.', 3, 'Zagreb', 'zvoncu.jpg', 'zvoncu1.jpg', 'https://prizvoncu.com/');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants-city`
--

CREATE TABLE `restaurants-city` (
  `restaurant_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants-city`
--

INSERT INTO `restaurants-city` (`restaurant_id`, `city_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `object_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `type`, `object_id`, `username`, `rating`, `description`) VALUES
(15, 'hotel', 1, 'predrag', 4, 'I really liked the hotel. ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nm`) VALUES
(8, 'proba', '$2y$10$fOo3ZtaE0lJ43KnNKuH9z.8wu.2QdkWcD.k9NZEBfjnitd03RKklq', 'Proba'),
(9, 'predrag', '$2y$10$FAHKTZKJXpHiyV03ormlMeCf3xZly/x1rNEoN.fcVkVZzuQlTOZfC', 'Predrag Djindjic'),
(10, 'test', '$2y$10$ABZSyfdJlKaSR2wWkBC5jODCCAPyPsgs.1vM2CpB1KaIxGWQ0TzgW', 'Test User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key2` (`city_id`);

--
-- Indexes for table `hotels-city`
--
ALTER TABLE `hotels-city`
  ADD UNIQUE KEY `key` (`hotel_id`),
  ADD KEY `key1` (`city_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants-city`
--
ALTER TABLE `restaurants-city`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`id`) REFERENCES `hotels-city` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`id`) REFERENCES `restaurants-city` (`restaurant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
