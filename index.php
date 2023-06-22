<?php
    require_once('mysqlconfig.php');
    session_start();
    
    // if(!isset($_SESSION['userlogin'])){
    //     header("location: login.php"); //redirects to main page if person is already authenticated
    // }

    // if(isset($_GET['logout'])){
    //     session_destroy();
    //     unset($_SESSION);
    //     header("location: login.php");
    // }

    //creates the arrays for the shop and shopping cart
    if(!isset($_SESSION['cart'])){
        $_SESSION["cart"] = array();
        $_SESSION["cartamount"] = array();
    }

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            #title img{
                height:10%;
                width:10%;
            }

            @media (max-width: 1000px){
                #slideshow{
                    min-height: 1000px;
                }
                #parallax, #parallax3{
                   font-size:150%; 
                }
                #aboutme{
                    font-size:100%;
                }
                #aboutme img{
                    width:100%;
                    height:100%;
                    padding:2%;
                }
                #form{
                    max-width:80%;
                }
                #title {
                    margin-top:20%;
                }
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
                <h1 onclick="login()" id="loginlink">Login</h1>
                <h1 onclick="goRegistration()">Registration</h1>
                <h1 onclick="goContact()">Contact</h1>
                <h1 onclick="goShop()">Products</h1>
                <h1 onclick="goCart()">Shopping Cart</h1>
                <h1 onclick="goCredits()">Credits</h1>
            </div>
        </div>

        <span> 
            <button id="menubutton" onclick="menuopen()">☰ Be HAAPI, Eat Noodles</button> 
        </span>
        
        <span>
            <button id="homebtn" onclick="goHome()"></button>
        </span>

        <!-- <i id="login" class="fa fa-user" style="font-size:200%;" onclick="login()"></i> -->
        <div id="loginformdiv">
            <form id="loginform" action="jslogin.php" method="post">
                <h1 onclick="loginclose()" id="closelogin" style="font-size:400%;">&times;</h1>
                <h3 id="loggedinform">You are currently signed in as <?php echo $_SESSION['name'] ?>. Click here to <a href="logout.php">Log out</a>. Note that logging out will delete any products currently in your cart.</h3>
                <img src="pictures/heart2.png">
                <h1><i class="fa fa-user"></i> Username</h1>
                <input type="text" placeholder="Enter username" name="username" required style="font-size:100%;" autocomplete="on">
                <h1><i class="fa fa-key"></i> Password</h1>
                <input type="password" placeholder="Enter password" name="password" required autocomplete="on"><br><br>
                <button type="submit">Login!</button>
                <p>Don't have an account? <a href="registration.php">Sign Up!</a></p>
            </form>
        </div>

        <!-- <i id="cart" class="fa fa-shopping-cart" style="font-size:200%;" onclick="goCart()"></i> -->

        <div id="title">
            <h5 style="color:#F1BA0A;" id="welcomelogin">Welcome back, <?php echo $_SESSION['name'] ?>!</h5>
            <h1>HAAPIness starts here.</h1>
            <button id="gotoshop" onclick="goShop()">Start exploring &#8594</button> 
        </div>

        <div id="slideshow" class="reveal">
            <h1>SHOP BY...</h1>
            <h2>COUNTRY?</h2>
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
            <h2>SPICE LEVEL?</h2>
            <p>1 (not spicy) to 5 (very spicy)</p>
            <div id="spicelevel">
                    <img src="pictures/spicelevel/spice1_square.png" onclick="filter('spice1')">
                    <img src="pictures/spicelevel/spice2_square.png" onclick="filter('spice2')">
                    <img src="pictures/spicelevel/spice3_square.png" onclick="filter('spice3')">
                    <img src="pictures/spicelevel/spice4_square.png" onclick="filter('spice4')">
                    <img src="pictures/spicelevel/spice5_square.png" onclick="filter('spice5')">
            </div>
            <br>
            <br>
            
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
                <p>The founders of this business, Ellen Guan, Diya Kamath, and Laasya Nagumalli, created this website as a means of interlacing one’s own American identity with the cultures from which we all come; Ellen, Laasya, and Diya are all members of the AAPI community, and what connects people better than food? Noodles, an integral part to countless AAPI cuisines, and instant food, a foundational comfort food of American recreation, birthed the initiative: Be HAAPI, Eat Noodles. Authentic instant noodles are not readily available in many parts of the world, but Be Haapi Eat Noodles will ship to any address, no matter the distance. With a commitment to equity and equal access, just add water and heat to enjoy a filling meal from any AAPI country that you wish. With HAAPIness, you can resuscitate connectedness to your own culture and customs.</p>
                <h3>Be HAAPI, Eat Noodles!</h3>
            </div>
        </div>
        <div id="parallax2">
            <div id="form" class="reveal">
                <h1>Talk to us!</h1> 
                <p>Know a brand you love but don't see? Or any other general questions or comments? We would love to hear from you!</p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- converts special characters to HTML entities -->
                    <div class="flexbox">
                        <div>
                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name" required autocomplete="on"><br>
                        </div>
                        <div>
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email" required autocomplete="on"><br>
                        </div>
                    </div>
                    <br>
                    Tell us what you think!<br>
                    <textarea name="message" required></textarea><br><br>
                    <input type="checkbox" value="mailinglist" name="mailinglist" id="mailinglist">
                    <label for="mailinglist">Click here to sign up to be apart of our mailing list and be the first person to know when we release new deals!</label><br>
                    <br>
                    <button type="submit">Send!</button>
                </form>
                <!--<button onclick="signup()">Send!</button>-->
            </div>
            <br>
            <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
            function loggedin(){
                Swal.fire({
                    icon: 'success',
                    title: 'You have successfully logged in!'
                })
            }
        </script>
    </body>
    <?php
        if(isset($_SESSION['loggedin'])){
            if($_SESSION['loggedin'] == "true"){
                echo "<script src='script.js'>
                </script><script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>loggedin()</script>";
                echo "<style>#welcomelogin, #loggedinform{display:block;}</style>";
                echo "<script>document.getElementById('loginlink').innerHTML = 'Logout';</script>";
                $_SESSION['loggedin'] = "no";
            }
            if($_SESSION["loggedin"] == "false"){
                echo "<script src='script.js'>
                </script><script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>loginerror()</script>";
                $_SESSION['loggedin'] = "else";
            }
            if($_SESSION["loggedin"] == "no"){
                echo "<style>#welcomelogin, #loggedinform{display:block;}</style>";
                echo "<script>document.getElementById('loginlink').innerHTML = 'Logout';</script>";
            }
        }

        if(isset($_SESSION['registered'])){
            echo $_SESSION['registered'];
            if($_SESSION['registered'] == "true"){
                echo "<script src='script.js'>
                </script><script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>register()</script>";
                $_SESSION['registered'] = "else";
            }
            else if($_SESSION['registered'] == "false"){
                echo "<script src='script.js'>
                </script><script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>registererror()</script>";
                $_SESSION['registered'] = "else";
            }
        }

        $name = $email = $message = $username = $secretword = "";
        $emailErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*             $username = $_POST['username'];
            $secretword = $_POST['password']; */
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
              }
            $message = test_input($_POST["message"]);
            echo "<script>signup()</script>";
        }

        function test_input($data) {
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // $sql = "INSERT INTO noodles (id, image, fullname, price, filters) values('myojo', 'pictures/noodles/myojo.png', 'Myojo Ramen', '3', 'addtocart myojo pacificislanders carolineislands spice1 savory peanutfree sesamefree fishfree treenutsfree shellfishfree'), ('nissinstirfry', 'pictures/noodles/nissinstirfry.png', 'FULLNAME', '3', 'addtocart nissinstirfry pacificislanders northernmarianaislands spice3 savory peanutfree fishfree treenutsfree shellfishfree'), ('kame', 'pictures/noodles/kame.png', 'KaMe Stir Fry Hokkien Noodles', '3', 'addtocart kame pacificislanders fiji spice1 savory peanutfree sesamefree fishfree treenutsfree shellfishfree'), ('simplyasia', 'pictures/noodles/simplyasia.png', 'Simply Asia Chinese Style Lo Mein Noodles', '3', 'addtocart simplyasia pacificislanders newcaledonia spice3 savory peanutfree sesamefree fishfree treenutsfree shellfishfree'), ('nissinteriyaki', 'pictures/noodles/nissinteriyaki.png', 'Nissin Chow Mein Teriyaki Beef Flavor', '3', 'addtocart nissinteriyaki pacificislanders papuanewguinea spice4 savory peanutfree sesamefree fishfree treenutsfree shellfishfree'), ('oceans', 'pictures/noodles/oceans.png', 'Oceans Halo Organic Ramen', '3', 'addtocart oceans pacificislanders solomonislands spice2 savory peanutfree sesamefree fishfree treenutsfree shellfishfree'), ('perfectearth', 'pictures/noodles/perfectearth.png', 'Perfect Earth Tom Yum Organic Instant Noodles', '3', 'addtocart perfectearth pacificislanders vanuatu spice3 savory glutenfree peanutfree sesamefree fishfree treenutsfree shellfishfree'), ('cung', 'pictures/noodles/cung.png', 'Cung Ding Kool', '3', 'addtocart cung pacificislanders marshallislands spice5 spicy peanutfree sesamefree treenutsfree'), ('immi', 'pictures/noodles/immi.png', 'Immi', '3', 'addtocart immi pacificislanders newzealand spice3 savory peanutfree fishfree treenutsfree shellfishfree'), ('sedaap', 'pictures/noodles/sedaap.png', 'Sedaap Supreme', '3', 'addtocart sedaap pacificislanders samoa spice3 savory peanutfree sesamefree fishfree treenutsfree shellfishfree'), ('rama', 'pictures/noodles/rama.png', 'Rama Food', '3', 'addtocart rama pacificislanders hawaiian spice2 savory glutenfree peanutfree sesamefree fishfree treenutsfree shellfishfree')";
        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        //   } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        //   }
    ?>
</html>