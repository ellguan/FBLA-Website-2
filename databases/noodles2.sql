-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 26, 2023 at 05:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `useraccounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `noodles`
--

CREATE TABLE `noodles2` (
  `noodleid` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `filters` varchar(300) NOT NULL,
  `priced` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noodles`
--

INSERT INTO `noodles2` (`noodleid`, `id`, `image`, `fullname`, `price`, `filters`, `priced`) VALUES
(1, 'JinMaiLang', 'pictures/noodles/JinMaiLang.png', 'Jin Mai Lang Instant Noodle Artificial Spicy Hot Beef', 2, 'addtocart JinMaiLang eastasia china spice4 spicy ramen fishfree nutsfree shellfishfree peanutfree plantbased', 0),
(2, 'Shin', 'pictures/noodles/Shin.png', 'Nongshim Spicy Shin Cup Noodle Soup', 2, 'eastasia southkorea spice5 sweet instantnoodles fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(3, 'Masterkong', 'pictures/noodles/MasterKong.png', 'Master Kong Hot&SpicyBeef', 3, 'addtocart Masterkong eastasia china spice5 spicy instantnoodles', 0),
(4, 'BaiJia', 'pictures/noodles/BaiJia.png', 'Instant Sichuan Broad Noodles', 4, 'addtocart BaiJia eastasia china spice3 spicy instantnoodles fishfree shellfishfree ', 0),
(5, 'SichuanBaijiaChongqing', 'pictures/noodles/SichuanBaijiaChongqing.png', 'Sichuan Baijia Chongqing Burning Dry Noodles', 4, 'addtocart SichuanBaijiaChongqing eastasia china spice3 spicy instantnoodles fishfree shellfishfree ', 0),
(6, 'UFO', 'pictures/noodles/UFO.png', 'UFO Yakisoba noodles', 3, 'addtocart UFO eastasia japan spice2 savory instantnoodles fishfree nutsfree shellfishfree peanutfree glutenfree sesamefree ', 0),
(7, 'Maruchan', 'pictures/noodles/Maruchan.png', 'Maruchan Tanuki Soba', 3, 'addtocart Maruchan eastasia japan spice1 savory instantnoodles fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(8, 'AceCook', 'pictures/noodles/AceCook.png', 'AceCook Instant Harusame Soup, Szechuan Sesame Hot Flavor', 3, 'addtocart AceCook eastasia japan spice4 spicy ramen fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(9, 'KoyoWakame', 'pictures/noodles/KoyoWakame.png', 'Koyo Wakame Seaweed Ramen', 2, 'addtocart KoyoWakame eastasia japan spice3 savory ramen plantbased', 0),
(10, 'NissinCupNoodles', 'pictures/noodles/NissinCupNoodles.png', 'Nissin Cup Noodles Mongolia Miso Tanmen Nakamoto Ramen', 3, 'addtocart NissinCupNoodlesNakiryu eastasia japan spice3 savory instantnoodles', 0),
(11, 'Buldak', 'pictures/noodles/Buldak.png', 'Samyang 2X Buldak Cicken Stir Fried Ramen', 3, 'addtocart Buldak eastasia southkorea spice4 spicy instantnoodles fishfree nutsfree peanutfree, shellfishfree plantbased', 0),
(12, 'ottogi', 'pictures/noodles/ottogi.png', 'OTTOGI Cheese Ramen', 2, 'addtocart ottogi eastasia southkorea spice3 savory ramen fishfree nutsfree peanutfree glutenfree shellfishfree', 0),
(13, 'Paldo', 'pictures/noodles/Paldo.png', 'Paldo Fun & Yum Ilpoom Jjajangmen Chajang Noodle, Pack of 4, Traditional Brothless Chajang Ramen', 3, 'addtocart Paldo eastasia southkorea spice1 sweet ramen fishfree nutsfree glutenfree shellfishfree fishfree plantbased', 0),
(14, 'Indofood', 'pictures/noodles/Indofood.png', 'Indofood Instant Noodle: Mi Goreng', 1, 'addtocart Indofood southeastasia brunei spice1 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree plantbased', 0),
(15, 'Miesoa', 'pictures/noodles/Miesoa.png', 'Misoa Instant Noodles', 2, 'addtocart Miesoa southeastasia cambodia spice2 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree glutenfree', 0),
(17, 'Fitmee', 'pictures/noodles/Fitmee.png', 'Fitmee Soto Flavor Chicken Soup Konnyaku Shirataki Instant Noodle', 3, 'addtocart Fitmee southeastasia indonesia spice3 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(18, 'Lemonilo', 'pictures/noodles/Lemonilo.png', 'Lemonilo Mie Instan Alami Rasa Mie Goreng', 3, 'addtocart Lemonilo southeastasia indonesia spice3 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(20, 'MiSedaap', 'pictures/noodles/MiSedaap.png', 'Mi Sedaap Goreng Indo Flavour Fried Instant Noodles', 1, 'addtocart MiSedaap southeastasia indonesia spice1 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree plantbased', 0),
(22, 'NongShimBlack', 'pictures/noodles/NongShimBlack.png', 'NongShim Shin Black Spicy Pot-au-feu Ramen Noodle Soup', 4, 'addtocart NongShimBlack southeastasia laos spice5 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(23, 'Mama', 'pictures/noodles/Mama.png', 'Instant Mama Noodles Moo Nam Tok Flavor', 2, 'addtocart Mama southeastasia laos spice4 spicy ramen nutsfree peanutfree plantbased', 0),
(24, 'MaggiPersia', 'pictures/noodles/MaggiPersia.png', 'Maggi Persia Kari', 2, ' addtocart MaggiPersia southeastasia malaysia spice2 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree plantbased', 0),
(25, 'MyKuali', 'pictures/noodles/MyKuali.png', 'My Kuali Penang White Curry Noodle', 4, 'addtocart MyKuali southeastasia malaysia spice2 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(26, 'ian', 'pictures/noodles/ian.png', 'INA Pan Mee Dried Chili Shrimp', 1, 'addtocart ian southeastasia malaysia spice2 savory ramen nutsfree peanutfree sesamefree ', 0),
(27, 'MaggiMig', 'pictures/noodles/MaggiMig.png', 'Maggi Mi Goreng Cili ala Kampung', 2, 'addtocart MaggiMig southeastasia malaysia spice4 spicy ramen nutsfree peanutfree sesamefree fishfree shellfishfree plantbased', 0),
(28, 'Ttl', 'pictures/noodles/Ttl.png', 'Ttl Taiwanese Three Seasonings Chicken Flavor Instant Noodles', 3, 'addtocart Ttl southeastasia taiwan spice2 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(29, 'Lishan', 'pictures/noodles/Lishan.png', 'Lishan Taiwan Instant Noodle', 2, 'addtocart Lishan southeastasia taiwan spice2 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(30, 'TtlVeg', 'pictures/noodles/TtlVeg.png', 'TTL Pickled Vegetable Beef With Hua-Diao Liquor Instant Noodle', 4, 'addtocart TtlVeg southeastasia taiwan spice3 savory ramen ', 0),
(31, 'shinHorng', 'pictures/noodles/ShinHorng.png', 'shin Horng Lukang Thin Noodles Ginger & Sesame Oil Flavor', 2, 'addtocart ShinHorng southeastasia taiwan spice2 savory ramen plantbased', 0),
(32, 'UniPresident', 'pictures/noodles/UniPresident.png', 'Uni-President Ah Q Seafood Flavor Instant Noodles(Taiwan)', 2, 'addtocart UniPresident southeastasia taiwan spice2 savory instant noodles', 0),
(33, 'Vedan', 'pictures/noodles/Vedan.png', 'Vedan Instant Noodles-A Duck Bean-Thread Soup Flavor', 2, 'addtocart Vedan southeastasia taiwan spice3 savory ramen', 0),
(34, 'ThreeMeters', 'pictures/noodles/ThreeMeters.png', 'Three Meters Pepper Sesame Belt Noodles', 3, 'addtocart ThreeMeters southeastasia taiwan spice2 savory ramen', 0),
(35, 'LuckyMe', 'pictures/noodles/LuckyMe.png', 'Lucky Me Beef na Beef Mami Noodles', 3, 'addtocart LuckyMe southeastasia philippines spice2 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(36, 'LuckyMeJjamppong', 'pictures/noodles/LuckyMeJjamppong.png', 'Lucky Me! Special Instant Noodles Jjamppong', 3, 'addtocart LuckyMeJjamppong southeastasia philippines spice5 spicy ramen nutsfree peanutfree sesamefree plantbased', 0),
(37, 'LuckyMePancit', 'pictures/noodles/LuckyMePancit.png', 'Instant Pancit Canton Chow Mein Extra Hot Chili Flavor', 2, 'addtocart LuckyMePancit southeastasia philippines spice3 savory ramen nutsfree peanutfree sesamefree shellfishfree fishfree plantbased', 0),
(38, 'PrimaLaksa', 'pictures/noodles/PrimaLaksa.png', 'Prima Taste Laksa La Mian Noodles', 3, 'addtocart PrimaLaksa southeastasia singapore spice4 spicy ramen nutsfree peanutfree sesamefree shellfishfree fishfree glutenfree', 0),
(39, 'PrimaJuzz', 'pictures/noodles/PrimaJuzz.png', 'Prima Juzzs Mee Creamy Chicken Flavor', 2, 'addtocart PrimaJuzz southeastasia philippines spice1 savory ramen', 0),
(40, 'Al', 'pictures/noodles/Al.png', 'A1 Instant Noodle: Abalone', 4, 'addtocart Al southeastasia singapore spice3 savory ramen plantbased', 0),
(41, 'PrimaCurry', 'pictures/noodles/PrimaCurry.png', 'Prima Taste Singapore Curry Lamian Noodles', 3, 'addtocart PrimaCurry southeastasia singapore spice4 spicy ramen nutsfree peanutfree sesamefree shellfishfree fishfree plantbased', 0),
(42, 'Chings', 'pictures/noodles/Chings.png', 'Chings Singapore Curry Noodles', 3, 'addtocart Chings southeastasia singapore spice4 spicy ramen nutsfree peanutfree sesamefree shellfishfree fishfree plantbased', 0),
(43, 'MaMaThai', 'pictures/noodles/MaMaThai.png', 'Authentic Thai-Style Pork Noodles - Instant Noodles', 2, 'addtocart MaMaThai southeastasia thailand spice3 savory ramen', 0),
(44, 'MaMaPad', 'pictures/noodles/MaMaPad.png', 'Pad Thai Instant Spicy Noodles w/ Delicious Thai Flavors, Hot & Spicy Noodles w/ Pad Thai Soup Base', 1, 'addtocart MaMaPad southeastasia thailand spice5 spicy ramen ', 0),
(45, 'MaMaKhao', 'pictures/noodles/MaMaKhao.png', 'MAMA Instant Noodles Chicken Khao Soi Flavour', 2, 'addtocart MaMaKhao southeastasia thailnd spice2 savory ramen ', 0),
(46, 'MaMaStir', 'pictures/noodles/MaMaStir.png', 'MAMA Oriental Kitchen Stir Fried Salted Egg', 2, 'addtocart MaMaStir southeastasia thailand spice2 savory ramen nutsfree peanutfree sesamefree shellfishfree fishfree ', 0),
(47, 'IndomieOnion', 'pictures/noodles/IndomieOnion.png', 'Indomie Instant Noodles Onion Flavor', 1, 'addtocart IndomieOnion southeastasia timorleste spice1 savory ramen nutsfree peanutfree sesamefree shellfishfree fishfree plantbased', 0),
(48, 'MaMaMoo', 'pictures/noodles/MaMaMoo.png', 'Instant Noodles Moo Nam Tok', 2, 'addtocart MaMaMoo southeastasia timorleste spice4 spicy ramen nutsfree peanutfree nutsfree', 0),
(49, 'cf', 'pictures/noodles/cf.png', 'Chinese Food Convenient Delicious Instant Noodles Cup Seasoning Rice Vermicelli', 3, 'addtocart cf southasia pakistan spice3 savory instantnoodles', 0),
(50, 'HaoHao', 'pictures/noodles/HaoHao.png', 'Hao Hao Hot Sour Shrimp Flavor Instant Noodles', 3, 'addtocart HaoHao southeastasia vietnam spice4 spicy ramen ', 0),
(51, 'MamaPho', 'pictures/noodles/MamaPho.png', 'Mama Pho Bo Instant Beef Soup Bowl Noodle In Vietnamese Style', 3, 'addtocart MamaPho southeastasia vietnam spice2 savory instantnoodles ', 0),
(52, 'MamaPhoGa', 'pictures/noodles/MamaPhoGa.png', 'MAMA Pho Ga Instant Chicken Soup Bowl', 3, 'addtocart MamaPhoGa southeastasia vietnam spice1 savory instantnoodles nutsfree peanutfree sesamefree', 0),
(53, 'ViHuong', 'pictures/noodles/ViHuong.png', 'Vi Huong Instant Noodles Authentic Vietnamese Instant Ramen Soup Shrimp', 3, 'addtocart ViHuong southeastasia vietnam spice2 savory instantnoodles nutsfree peanutfree sesamefree ', 0),
(54, 'Vifon', 'pictures/noodles/Vifon.png', 'Vifon Mi Ga Instant Noodles Chicken Flavor (Vietnam)', 2, 'addtocart Vifon southeastasia vietnam spice2 savory instantnoodles', 0),
(56, 'NongshimBudae', 'pictures/noodles/NongshimBudae.png', 'Nongshim Budae Jjigae Noodle Soup', 1, 'addtocart NongshimBudae eastasia southkorea spice3 savory ramen', 0),
(57, 'CupNoodlesSoy', 'pictures/noodles/CupNoodlesSoy.png', 'Cup Noodles Soy Sauce Shrimps Peppery Shoyu Soup', 2, 'addtocart CupNoodlesSoy eastasia southkorea spice2 savory instantnoodles nutsfree sesamefree ', 0),
(58, 'ChopstickDesi', 'pictures/noodles/ChopstickDesi.png', 'Chopstick Desi Masala Instant Noodles', 1, 'addtocart ChopstickDesi southasia bangladesh spice2 savory ramen plantbased', 0),
(59, 'Doodles', 'pictures/noodles/Doodles.png', 'Doodles Masala Noodles', 3, 'addtocart Doodles southasia bangladesh spice4 savory ramen fishfree nutsfree shellfishfree peanutfree sesamefree plantbased', 0),
(60, 'MrNoodles', 'pictures/noodles/MrNoodles.png', 'Pran Mr.Noodles Instant Noodles Curry Flavor', 2, 'addtocart Mr.Noodles southasia bangladesh spice3 savory ramen plantbased', 0),
(61, 'MrNoodlesmagic', 'pictures/noodles/MrNoodlesmagic.png', 'Pran Mr. Noodles Magic Masala', 1, 'addtocart Mr.Noodlesmagic southasia bangladesh spice4 spicy instantnoodles plantbased', 0),
(62, 'ZimTak', 'pictures/noodles/ZimTak.png', ' Zim Tak Instant Noodle Oriental Hot Chili Chicken', 3, 'addtocart ZimTak southasia bangladesh spice5 spicy ramen', 0),
(63, 'KP', 'pictures/noodles/KP.png', 'KP Spicy Chicken Instant Noodles', 2, 'addtocart KP southasia bangladesh spice5 spicy ramen nutsfree peanutfree sesamefree ', 0),
(64, 'ZimTakveg', 'pictures/noodles/ZimTakveg.png', 'Zim Tak Instant Noodle Veg Flavor', 3, 'addtocart ZimTakveg southasia bangladesh spice2 savory ramen plantbased', 0),
(65, 'EliteIndomieNoodelite', 'pictures/noodles/EliteIndomieNoodelite.png', 'Elite Indomie Noodelite Vegetable Instant Noodles', 2, 'addtocart EliteIndomieNoodelite southasia iran spice1 savory ramen plantbased', 0),
(66, 'Indomie', 'pictures/noodles/Indomie.png', 'Indomie Chicken Flavour Instant Noodles', 3, 'addtocart Indomie southasia iran spice3 savory ramen fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(67, 'Galin', 'pictures/noodles/Galin.png', 'Galin Instant Noodles Meat Flavor', 3, 'addtocart Galin southasia iran spice3 savory instantnoodles fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(68, 'EliteIndomieNoodeliteMushroom', 'pictures/noodles/EliteIndomieNoodeliteMushroom.png', 'EliteIndomie Noodelite Mushroom and Cheese(Pizza) Instant Noodles', 3, 'addtocart EliteIndomieNoodeliteMushroom southasia iran spice1 savory ramen', 0),
(69, 'EliteIndomieNoodeliteBBQ', 'pictures/noodles/EliteIndomieNoodeliteBBQ.png', 'Elite Indomie Noodelite BBQ Instant Noodles', 3, 'addtocart EliteIndomieNoodeliteBBQ southasia iran spice1 savory ramen', 0),
(70, 'EliteIndomieNoodeliteBeef', 'pictures/noodles/EliteIndomieNoodeliteBeef.png', 'Elite Indomie Noodelite Beef & Chicken Instant Noodles', 3, 'addtocart EliteIndomieNoodeliteBeef southasia iran spice1 savory ramen', 0),
(71, 'imee', 'pictures/noodles/imee.png', 'IMEE Premium instant noodles: Chicken Red Curry', 3, 'addtocart imee southasia maldives spice3 savory instantnoodles fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(72, 'PrimaKottuMee', 'pictures/noodles/PrimaKottuMee.png', 'Prima KottuMee Hot & Spicy Flavour', 3, 'addtocart PrimaKottuMee southasia maldives spic5 spicy ramen ', 0),
(73, 'Mamee', 'pictures/noodles/Mamee.png', 'Mamee Oriental Noodles Chicken Flavour', 3, ' addtocart Mamee southasia maldives spice2 savory ramen fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(74, 'MameeYam', 'pictures/noodles/MameeYam.png', 'Mamee Cup Noodles Tom Yam', 3, 'addtocart MameeYam southasia maldives spice1 savory instantnoodles nutsfree peanutfree sesamefree plantbased', 0),
(75, 'SuperCup', 'pictures/noodles/SuperCup.png', 'Super Cup Noodles Tom Yam', 3, 'addtocart SuperCup southasia maldives spice3 savory instantnoodles nutsfree peanutfree sesamefree plantbased', 0),
(76, 'RumPum', 'pictures/noodles/RumPum.png', 'Rum Pum Rum Pum Instant Noodles Chicken Flavor', 3, 'addtocart RumPum southasia nepal spice3 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree', 0),
(77, 'WaiWai', 'pictures/noodles/WaiWai.png', 'Wai Wai Nepali Instant Noodles Veg Masala', 3, 'addtocart WaiWai southasia nepal spice3 savory ramen ', 0),
(78, 'rara', 'pictures/noodles/rara.png', 'RARA Chicken Instant Noodles', 3, 'addtocart rara southasia nepal spice3 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree', 0),
(79, 'twopm', 'pictures/noodles/twopm.png', 'Hot & Spicy Akabare Veg Curry Ramen Instant Noodles from Nepal', 2, 'addtocart twopm southasia nepal spice5 spicy ramen nutsfree peanutfree sesamefree fishfree shellfishfree plantbased', 0),
(80, 'Morre', 'pictures/noodles/Morre.png', 'Morre Masala Instant Noodles', 2, 'addtocart Morre southasia pakistan spice2 savory ramen plantbased', 0),
(81, 'MorreChatt', 'pictures/noodles/MorreChatt.png', 'Morre Instant Noodles Chatt Patta', 2, 'addtocart MorreChatt southasia pakistan spice2 savory instantnoodles plantbased', 0),
(82, 'NoodleDoodle', 'pictures/noodles/NoodleDoodle.png', 'Noodle Doodle Kolson Cup Instant Noodles Chunky Chicken', 3, 'addtocart NoodleDoodle southasia pakistan spice3 savory instantnoodles nutsfree peanutfree sesamefree fishfree shellfishfree', 0),
(83, 'NoodleDoodleFiery', 'pictures/noodles/NoodleDoodleFiery.png', 'Noodle Doodle Kolson Cup Instant Noodles Fiery Chatpata', 3, 'addtocart NoodleDoodleFiery southasia pakistan spice5 spicy instantnoodles', 0),
(84, 'MaggiSpicy', 'pictures/noodles/MaggiSpicy.png', 'Maggi Daiya Devilled Spicy Blast Noodles', 3, 'addtocart MaggiSpicy southasia india spice5 spicy ramen plantbased', 0),
(85, 'PrimaVeg', 'pictures/noodles/PrimaVeg.png', 'Prima Instant Noodles Vegetable Flavored', 3, 'addtocart PrimaVeg southasia pakistan spice2 savory ramen sesamefree plantbased', 0),
(86, 'PrimaHot', 'pictures/noodles/PrimaHot.png', 'Prima Kottu Mee Instant Noodles Hot & Spicy', 2, 'addtocart PrimaHot southasia pakistan spice5 spicy ramen ', 0),
(87, 'Maggi ', 'pictures/noodles/maggi.png', 'Maggi Chicken Flavor Instant Noodles', 3, 'addtocart Maggi southasia india spice3 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree ', 0),
(92, 'MaruchanBeef', 'pictures/noodles/MaruchanBeef.png', 'Maruchan Instant Lunch Beef Flavor Noodles', 3, 'addtocart MaruchanBeef japan eastasia spice2 savory instantnoodles nutsfree peanutfree sesamefree fishfree shellfishfree', 0),
(93, 'MaruchanChicken', 'pictures/noodles/MaruchanChicken.png', 'Maruchan Instant Lunch Chicken Flavor Noodles', 2, 'addtocart MaruchanChicken japan eastasia spice2 savory instantnoodles nutsfree peanutfree sesamefree ', 0),
(94, 'MaruchanShrimp', 'pictures/noodles/MaruchanShrimp.png', 'Maruchan Instant Lunch Shrimp Flavor Noodles', 3, 'addtocart MaruchanShrimp japan eastasia spice2 savory instantnoodles nutsfree peanutfree sesamefree ', 0),
(95, 'MaruchanCreamy', 'pictures/noodles/MaruchanCreamy.png', 'Maruchan Instant Creamy Chicken Noodle Soup', 3, 'addtocart MaruchanCreamy japan eastasia spice1 savory instantnoodles nutsfree peanutfree sesamefree glutenfree shellfishfree fishfree', 0),
(96, 'CupNoodles', 'pictures/noodles/CupNoodles.png', 'Cup Noodles Regular Cup Seafood Flavour', 3, 'addtocart CupNoodles eastasia hongkong spice1 savory instantnoodles nutsfree peanutfree sesamefree', 0),
(97, 'Nissin', 'pictures/noodles/Nissin.png', 'Nissin Demae Ramen Shoyu Tonkotsu Artificial Pork Flavour', 3, 'addtocart Nissin eastasia hongkong spice3 savory ramen plantbased', 0),
(98, 'SauTaoTom', 'pictures/noodles/SauTaoTom.png', 'Sau Tao Tom Yum Kung Flavour Ramen', 3, 'addtocart SauTaoTom eastasia hongkong spice2 savory instantnoodles', 0),
(99, 'Fuku', 'pictures/noodles/Fuku.png', 'Fuku Superior Soup Instant Noodle', 3, 'addtocart Fuku eastasia hongkong spice1 savory ramen ', 0),
(100, 'IndomieGo', 'pictures/noodles/IndomieGo.png', 'Mi Goreng Fried Noodle', 3, 'addtocart IndomieGo westernasiaterritories iraq spice1 savory ramen nutsfree peanutfree sesamefree shellfishfree fishfree plantbased', 0),
(101, 'Taaman', 'pictures/noodles/Taaman.png', 'Taaman Ramen Noodles', 3, 'addtocart Taaman westernasiaterritories israel spice1 savory instantnoodles', 0),
(102, 'Chain', 'pictures/noodles/Chain.png', 'Chain Kwo Noodles', 3, 'addtocart Chain westernasiaterritories jordan spice2 savory ramen', 0),
(103, 'ChainEgg', 'pictures/noodles/Chainegg.png', 'Chain Kwo Egg Noodles', 3, 'addtocart ChainEgg westernasiaterritories jordan spice2 savory ramen', 0),
(104, 'Taj', 'pictures/noodles/Taj.png', 'Taj Vegetables Noodles', 2, 'addtocart Taj westernasiaterritories lebanon spice2 savory ramen fishfree nutsfree shellfishfree peanutfree glutenfree sesamefree plantbased', 0),
(105, 'MaggiCili', 'pictures/noodles/MaggiCili.png', 'Cili ala Kampung Noodles', 3, 'addtocart MaggiCili westernasiaterritories qatar spice3 savory ramen nutsfree peanutfree sesamefree ', 0),
(106, 'IndomieOg', 'pictures/noodles/IndomieOg.png', 'Indomie Orignal Noodles', 1, 'addtocart IndomieOg westernasiaterritories saudiarabia spice3 savory instantnoodles fishfree nutsfree shellfishfree peanutfree sesamefree plantbased', 0),
(107, 'PleinSoleil', 'pictures/noodles/PleinSoleil.png', 'PleinSoleil Orignal Noodles', 4, 'addtocart PleinSoleil westernasiaterritories turkey spice3 savory ramen fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(108, 'NissinSeafood', 'pictures/noodles/NissinSeafood.png', 'Nissin Seafood Flavor Instant Noodles', 3, 'addtocart NissinSeafood westernasiaterritories unitedarabemirates spice3 savory instantnoodles nutsfree peanutfree sesamefree ', 0),
(109, 'Knorr', 'pictures/noodles/Knorr.png', 'Knorr Chicken Noodle Soup', 3, 'addtocart Knorr westernasiaterritories unitedarabemirates spice2 savory ramen nutsfree peanutfree sesamefree fishfree shellfishfree', 0),
(110, 'NongshimTo', 'pictures/noodles/NongshimTo.png', 'Nongshim Tonkotsu Ramen Noodle Soup', 2, 'addtocart NongshimTo westernasiaterritories yemen spice3 savory instantnoodles nutsfree peanutfree sesamefree fishfree shellfishfree', 0),
(111, 'Grito', 'pictures/noodles/Grito.png', 'Grito Chicken Flavored Instant Noodles', 4, 'addtocart Grito centralasia Kazakhstan spice2 savory instantnoodles ', 0),
(112, 'InstantNoodles', 'pictures/noodles/InstantNoodles.png', 'Instant Noodles Dosirak with Chicken and Beef Flavor', 3, 'addtocart InstantNoodles centralasia Kazakhstan spice3 savory instantnoodles', 0),
(113, 'YumYumChicken', 'pictures/noodles/YumYumChicken.png', 'Yum Yum Chicken Flavor Instant Noodles', 3, 'addtocart YumYumChicken centralasia Kazakhstan spice2 savory instantnoodles', 0),
(114, 'Noodlicious', 'pictures/noodles/Noodlicious.png', 'Noodlicious Vegetable Flavor Noodles', 4, 'addtocart Noodlicious centralasia Turkmenistan spice1 savory ramen plantbased', 0),
(115, 'MaxiBon', 'pictures/noodles/MaxiBon.png', 'MaxiBon Tomato Noodle Soup', 3, 'addtocart MaxiBon centralasia Turkmenistan spice2 savory ramen ', 0),
(119, 'BaiJiaVermicelli', 'pictures/noodles/BaiJiaVermicelli.png', 'Bai Jia Instant Vermicelli Pickled Cabbage', 2, 'addtocart BaiJiaVermicelli eastasia china spice4 spicy instantnoodles fishfree nutsfree shellfishfree peanutfree glutenfree sesamefree shellfishfree plantbased ', 0),
(120, 'UniPrez', 'pictures/noodles/UniPrez.png', 'Uni-President Seafood Flavor Instant Noodle', 3, 'addtocart UniPrez eastasia china spice2 savory instantnoodles', 0),
(121, 'NissinChowMein', 'pictures/noodles/NissinChowMein.png', 'Nissin Chow Mein Spicy Teriyaki Beef Flavor Chow Mein Noodles', 2, 'addtocart NissinChowMein eastasia china spice5 sweet instantnoodles ', 0),
(124, 'CupNoodlesJapaneseCurry', 'pictures/noodles/CupNoodlesJapaneseCurry.png', 'Cup Noodles Spiced Curry Japanese Curry Soup', 3, 'addtocart CupNoodlesJapaneseCurry eastasia japan spice4 savory ramen fishfree nutsfree shellfishfree peanutfree sesamefree ', 0),
(125, 'Amoy', 'pictures/noodles/Amoy.png', 'Amoy Straight to Wok Udon Noodles', 3, 'addtocart Amoy eastasia japan spice3 savory ramen ', 0),
(126, 'SimplyAsiaMongolian', 'pictures/noodles/SimplyAsiaMongolian.png', 'Simply Asia Mongolian Noodle Bowl', 3, 'addtocart SimplyAsiaMongolian eastasia mongolia spice4 spicy instantnoodles fishfree nutsfree peanutfree shellfishfree plantbased', 0),
(127, 'NissinCupNoodlesNakiryu', 'pictures/noodles/NissinCupNoodlesNakiryu.png', 'Nissin, Nakiryu Tantanmen Ramen', 3, 'addtocart NissinRamen eastasia', 0),
(128, 'myojo', 'pictures/noodles/myojo.png', 'Myojo Ramen', 3, 'addtocart myojo pacificislanders carolineislands spice1 savory peanutfree sesamefree fishfree treenutsfree shellfishfree', 0),
(129, 'nissinstirfry', 'pictures/noodles/nissinstirfry.png', 'Nissin Cup Noodles Stir Fry Korean BBQ Flavor Noodles', 3, 'addtocart nissinstirfry pacificislanders northernmarianaislands spice3 savory peanutfree fishfree treenutsfree shellfishfree', 0),
(130, 'kame', 'pictures/noodles/kame.png', 'KaMe Stir Fry Hokkien Noodles', 3, 'addtocart kame pacificislanders fiji spice1 savory peanutfree sesamefree fishfree treenutsfree shellfishfree', 0),
(131, 'simplyasia', 'pictures/noodles/simplyasia.png', 'Simply Asia Chinese Style Lo Mein Noodles', 2, 'addtocart simplyasia pacificislanders newcaledonia spice3 savory peanutfree sesamefree fishfree treenutsfree shellfishfree', 0),
(132, 'nissinteriyaki', 'pictures/noodles/nissinteriyaki.png', 'Nissin Chow Mein Teriyaki Beef Flavor', 2, 'addtocart nissinteriyaki pacificislanders papuanewguinea spice4 savory peanutfree sesamefree fishfree treenutsfree shellfishfree', 0),
(133, 'oceans', 'pictures/noodles/oceans.png', 'Oceans Halo Organic Ramen', 4, 'addtocart oceans pacificislanders solomonislands spice2 savory peanutfree sesamefree fishfree treenutsfree shellfishfree', 0),
(134, 'perfectearth', 'pictures/noodles/perfectearth.png', 'Perfect Earth Tom Yum Organic Instant Noodles', 4, 'addtocart perfectearth pacificislanders vanuatu spice3 savory glutenfree peanutfree sesamefree fishfree treenutsfree shellfishfree plantbased', 0),
(135, 'cung', 'pictures/noodles/cung.png', 'Cung Ding Kool', 3, 'addtocart cung pacificislanders marshallislands spice5 spicy peanutfree sesamefree treenutsfree', 0),
(136, 'immi', 'pictures/noodles/immi.png', 'Immi', 3, 'addtocart immi pacificislanders newzealand spice3 savory peanutfree fishfree treenutsfree shellfishfree', 0),
(137, 'sedaap', 'pictures/noodles/sedaap.png', 'Sedaap Supreme', 3, 'addtocart sedaap pacificislanders samoa spice3 savory peanutfree sesamefree fishfree treenutsfree shellfishfree', 0),
(138, 'rama', 'pictures/noodles/rama.png', 'Rama Food', 4, 'addtocart rama pacificislanders hawaiian spice2 savory glutenfree peanutfree sesamefree fishfree treenutsfree shellfishfree plantbased', 0),
(395, 'IndomieMi', 'pictures/noodles/IndomieMi.png', '5 Bags Indomie Mi Goreng Cabe Ijo (Green Chili Paste)', 7, 'addtocart IndomieMi southeastasia indonesia spice1 savory ramen nutsfree peanutfree fishfree shellfishfree plantbased', 0),
(396, 'IndomieBeef', 'pictures/noodles/IndomieBeef.png', 'Indo Mie Indomie Instant Noodles (Mi Goreng Spicy Beef Rendang)', 1, 'addtocart IndomieBeef southeastasia indonesia spice5 spicy ramen nutsfree peanutfree sesamefree fishfree shellfishfree plantbased', 0),
(397, 'IndomieFried', 'pictures/noodles/IndomieFried.png', 'Indomie Fried Instant Noodles', 1, 'addtocart IndomieFried southeastasia indonesia spice1 savory ramen plantbased', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noodles`
--
ALTER TABLE `noodles2`
  ADD PRIMARY KEY (`noodleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noodles`
--
ALTER TABLE `noodles2`
  MODIFY `noodleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
