<?php
    require_once('mysqlconfig.php');
    session_start();
    
    // if(!isset($_SESSION['userlogin'])){
    //     header("location: login.php"); //redirects to main page if person is already authenticated
    // }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("location: login.php");
    }

    //creates the arrays for the shop and shopping cart
    $_SESSION["cart"] = array();
    $_SESSION["cartamount"] = array();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>HAAPIness</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">

        <style>
            #title img{
                height:10%;
                width:10%;
            }
            #title h1{
                margin-top:-3%;
            }
        </style>
    </head>
    <body>
        <button onclick="topFunction()" id="scrolltop" title="Go to top">&uarr;</button>

        <div id="menu" onclick="menuclose()">
            <div id="menuitems">
                <h1 onclick="menuclose()">&times;</h1>
                <!--logo here-->
                <!--line here-->
                <h1 onclick="goHome()">Home</h1>
                <h1 onclick="goAbout()">About</h1>
                <h1 onclick="goContact()">Contact</h1>
                <h1 onclick="goShop()">Products</h1>
                <h1 onclick="goCart()">Shopping Cart</h1>
                <h1 onclick="goCredits()">Credits</h1>
            </div>
        </div>

        <span> 
            <button id="menubutton" onclick="menuopen()">☰ Be HAAPI, Eat Noodles</button> 
        </span>

        <div id="title">
            <img src="pictures/heart.png">
            <h1>HAAPIness starts here.</h1>
            <button id="gotoshop" onclick="goShop()">Start exploring &#8594</button> 
        </div>

        <div id="slideshow" class="reveal">
            <h1>SHOP BY...</h1>
            <div id="flagslideshow">
                <div class="flags">
                    <img src="pictures/flags/china.png" onclick="filter('china')" class="startflag">
                    <img src="pictures/flags/india.webp" onclick="filter('india')">
                    <img src="pictures/flags/bangladesh.png" onclick="filter('bangladesh')">
                    <img src="pictures/flags/indonesia.webp" onclick="filter('indonesia')">
                    <img src="pictures/flags/japan.png" onclick="filter('japan')">
                    <img src="pictures/flags/malaysia.png" onclick="filter('malaysia')">
                    <img src="pictures/flags/philippines.webp" onclick="filter('philippines')">
                    <img src="pictures/flags/south korea.webp" onclick="filter('southkorea')">
                    <img src="pictures/flags/thailand.webp" onclick="filter('thailand')">
                    <img src="pictures/flags/vietnam.png" onclick="filter('vietnam')">
                </div>
            </div>
            <h1>Country?</h1>
            <div id="spicelevel">
                    <img src="pictures/spicelevel/spice1_square.png" onclick="filter('spice1')">
                    <img src="pictures/spicelevel/spice2_square.png" onclick="filter('spice2')">
                    <img src="pictures/spicelevel/spice3_square.png" onclick="filter('spice3')">
                    <img src="pictures/spicelevel/spice4_square.png" onclick="filter('spice4')">
                    <img src="pictures/spicelevel/spice5_square.png" onclick="filter('spice5')">
            </div>
            <br>
            <br>
            <h1>Spice level?</h1>
            <p>1 (not spicy) to 5 (very spicy)</p>
            <!-- 
            <div id="taste">
            </div>
            <h1>Taste?</h1>
            <div id="restrictions">
                    <img src="pictures/allergies/egg.png" onclick="filter('eggfree')">
                    <img src="pictures/allergies/peanuts.png" onclick="filter('peanutfree')">
                    <img src="pictures/allergies/milk.png" onclick="filter('milkfree')">                 
                    <img src="pictures/allergies/sesame.png" onclick="filter('sesamefree')">
            </div>
            <h1>Allergy/Dietary Restrictions?</h1> -->
            <button onclick="goShop()">More filters &#8594</button>
        </div>

        <div id="parallax">
            <div class="reveal">
                <h1>Don't know where to start?</h1>
                <p>Here are some of current customers' favorites!</p>
            </div>
        </div>

        <div id="favorites" class="reveal"> <!--LINK TO THE OVERLAYS AND STUFF-->
            <div id="column1">
                <div id="favorite1" class="favoritehover" onclick="gotoimage('jinmailang')">
                    <img src="pictures/noodles/jinmailang.png">
                    <div class="favoriteoverlay">
                        <h1>Jin Mai Lang-Instant Noodle Artificial Spicy Hot Beef</h1>
                    </div>
                </div>
                <div id="favorite2" class="favoritehover" onclick="gotoimage('nissin')">
                    <img src="pictures/noodles/nissindemae.png">
                    <div class="favoriteoverlay">
                        <h1>Nissin Demae Ramen Shoyu Tonkotsu Artificial Pork Flavor</h1>
                    </div>
                </div>
                <div id="favorite3" class="favoritehover" onclick="gotoimage('shinhorng')">
                    <img src="pictures/noodles/lukang.png">
                    <div class="favoriteoverlay">
                        <h1>Shin Horng Lukang Thin Noodles Ginger & Sesame Oil Flavor</h1>
                    </div>
                </div>
                
            </div>
            <div id="column2">
                <div id="favorite4" class="favoritehover" onclick="gotoimage('LuckyMeJjamppong')">
                    <img src="pictures/noodles/jjamppong.png">
                    <div class="favoriteoverlay">
                        <h1>Lucky Me! Special Instant Noodles Jjamppong</h1>
                    </div>
                </div>
                <div id="favorite5" class="favoritehover" onclick="gotoimage('NongshimBudae')">
                    <img src="pictures/noodles/nongshim.png">
                    <div class="favoriteoverlay">
                        <h1>Nongshim Budae Jjigae Noodle Soup</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="parallax3">
            <div class="reveal">
                <h1>Still haven't found what you're looking for yet?</h1>
                <button onclick="goShop()">Explore the shop! &#8594</button>
            </div>
        </div>

        <div id="aboutme"> <!--LITERALLY CHANGE THIS LOOKS UGLY AF-->
            <div class="reveal">
                <h1>SPREADING LOVE OF NOODLES.</h1>
                <h3>Authentic ingredients. Straight to your doorstep.</h3>
                <div id="abouttitle">
                    <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=992&q=80">
                    <p>Asian American Pacific Islanders make up a cultural mosaic in America, hosting a manifold assortment of unique customs and traditions. As of the 2020 Census, 24 million people identified as Asian and 1.6 million identified as Native Hawaiian and Other Pacific Islander, either as their only identity or in combination with another identity. It is easy for one to get lost in the vastness of the Americas when it is an ocean away from one’s own roots. </p>
                    
                </div>
                <p>The founders of this business, Ellen Guan, Diya Kamath, and Laasya Nagumalli, created this website as a means of interlacing one’s own American identity with the cultures from which we all come; Ellen, Laasya, and Diya are all members of the AAPI community, and what connects people better than food? Noodles, an integral part to countless AAPI cuisines, and instant food, a foundational comfort food of American recreation, birthed the initiative: Be HAAPI, Eat Noodles. Authentic instant noodles are not readily available in many parts of the world, but HAAPIness will ship to any address, no matter the distance. With a commitment to equity and equal access, just add water and heat to enjoy a filling meal from any AAPI country that you wish. With HAAPIness, you can resuscitate connectedness to your own culture and customs.</p>
                <h3>Be HAAPI, Eat Noodles!</h3>
            </div>
        </div>
        <div id="parallax2">
            <div id="form" class="reveal">
                <h1>Talk to us!</h1> 
                <p>Know a brand you love but don't see? Or any other general questions or comments? We would love to hear from you!</p>
                <form>
                    <div class="flexbox">
                        <div>
                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name"><br>
                        </div>
                        <div>
                            <label for="email">Email:</label><br>
                            <input type="text" id="email" name="email"><br>
                        </div>
                    </div>
                    <br>
                    <label for="message">Tell us what you think!</label><br>
                    <textarea name="message"></textarea><br><br>
                    <input type="checkbox" value="mailinglist" name="mailinglist" id="mailinglist">
                    <label for="mailinglist">Click here to sign up to be apart of our mailing list and be the first person to know when we release new deals!</label><br>
                    <br>
                </form>
                <button onclick="signup()">Send!</button>
            </div>
            <br>
            <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js" type="text/javascript"></script>
        <script>
           function signup(){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'You have signed up for the mailing list!',
        showConfirmButton: false,
        timer: 1500
    })
}
        </script>
    </body>
    <?php
        // $sql = "INSERT INTO noodles (id, image, fullname, price ) values('BaiJiaVermicelli', 'pictures/noodles/BaiJiaVermicelli.png', 'Bai Jia Instant Vermicelli Pickled Cabbage', '3'), ('UniPrez', 'pictures/noodles/UniPrez.png', 'Uni-President Seafood Flavor Instant Noodle', '3'), ('NissinChowMein', 'pictures/noodles/NissinChowMein.png', 'Nissin Chow Mein Spicy Teriyaki Beef Flavor Chow Mein Noodles', '3'), ('UniPrez', 'pictures/noodles/UniPrez.png', 'Uni-President Seafood Flavor Instant Noodle', '3'), ('NissinChowMein', 'pictures/noodles/NissinChowMein.png', 'Nissin Chow Mein Spicy Teriyaki Beef Flavor Chow Mein Noodles', '3'),('CupNoodlesJapaneseCurry', 'pictures/noodles/CupNoodlesJapaneseCurry.png', 'Cup Noodles Spiced Curry Japanese Curry Soup', '3'),  ('Amoy', 'pictures/noodles/Amoy.png', 'Amoy Straight to Wok Udon Noodles', '3'),('SimplyAsiaMongolian', 'pictures/noodles/SimplyAsiaMongolian.png', 'Simply Asia Mongolian Noodle Bowl', '3'), ('NissinCupNoodlesNakiryu', 'pictures/noodles/NissinCupNoodlesNakiryu.png', 'Nissin, Nakiryu Tantanmen Ramen', '3')";
        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        //   } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        //   }
    ?>
</html>