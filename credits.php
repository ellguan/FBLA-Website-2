<?php
    session_start();
    require_once('mysqlconfig.php');
?>

<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>checkout!</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-image:url("pictures/checkoutbg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                color:white;
            }
        </style>
    </head>
    <body>
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
            <button id="menubutton" onclick="menuopen()">☰</button> 
        </span>

        <div id="header">
            <h1>Disclaimer!</h1>
            <h3>This is not a real shop!</h3>
        </div>
        <br>
        <br>

        <div id="sidebyside">
            <div id="filters">
                <p>This website was created for part of the 2023 event Website Design for the competition Future Business Leaders of America.</p>
                <p>This being said, we are not actually selling anything, so please refrain from inputting your personal information in any of the forms on this website.</p>
                <p>Thank you for your understanding! We hope you enjoy our website.</p>
                <br>
                <p>-Ellen Guan, Laasya Nagumalli, Diya Kamath</p>
            </div>
            <div id="noodlepics">
                <h1>Picture Credits</h1>
                <pre>
“Asian Food and Snacks Online.” Yami, 12 Jan. 2018, www.yamibuy.com/en/pages/snack. 
“Supermarket.” Wai Yee Hong - Oriental Supermarket, 23 Oct. 2016, www.waiyeehong.com/about-us/. 
Lienesch, Hans "The Ramen Rater". “The Ramen Rater.” THE RAMEN RATER, 20 Jan. 2023, www.theramenrater.com/. 
Hong, Wai Yee. “Celebrate Lunar New Year, Bristol.” Wai Yee Hong - Oriental Supermarket, 21 July 2017, www.waiyeehong.com/. 
Https://M.Media-Amazon.com/Images/I/61ZOouFrsZL._AC_.Jpg. 23 June 2017, 
    www.amazon.com/https-m-Media-Amazon-com-images-I-61ZOouFrsZL-_AC_-jpg/dp/B09MKVMQS3. 
Heb.com, 30 Nov. 2018, www.heb.com/product-detail/nissin-chow-mein-spicy-teriyaki-beef-flavor-noodles/1656807. 
Japanese Product Online Store - Saqra Mart, 13 Apr. 2016, www.saqramart.com/. 
“Nissin Ramen Noodles (Japanese Instant Ramen) 5 Servings.” Japanese Taste, 23 Jan. 2019, 
    japanesetaste.com/products/nissin-chicken-ramen-noodles-japanese-instant-ramen-5-servings. 
Soluble, Irving. “Geometry Dash Texture Packs.” Geometry Dash Texture Packs, solubletexturepacks.com/. 
“Lucky Me! Noodles.” Sarisaristore.se, 28 Sept. 2005, 
    www.sarisaristore.se/en/instant/55-beef-na-beef-mami-lucky-me-55g-4807770270017.html#:~:
    text=Wheat%20flour%2C%20palm%20oil%2C%20iodized,tartazine%2C%20sunest%20yewllow%20and%20tea. 
“DataKart: A National Repository of Product Data.” GS1 India, 1 Dec. 2022, www.gs1india.org/datakart/. 
“The Best Online Shopping in Bhutan.” Zala.bt, 14 Apr. 2021, www.zala.bt/. 
“Elite Indomie Noodles - Instant Noodles (50x).” ShopiPersia, 29 Aug. 2022, 
    shopipersia.com/product/elite-indomie-noodelite-instant-noodles-50x/. . 
“Saha Pathanapibul Plc..” Tradekey.com, 1 Mar. 2020, 
    www.tradekey.com/product-free/Imee-Premium-Instant-Noodles-Chicken-Red-Curry-5697071.html. 
“Shopify's Content Delivery Network.” Shopify, cdn.shopify.com/. 
PLC, State Trading Organization. “Sto Estore.” Home Page - State Trading Organization PLC, 12 June 2011, 
    www.sto.mv/Estore/Product/Index/choice-super-cupnoodles-tom-yum-60g-10084037. 
“Buy Carrefour Products Online - Shop on Carrefour.” Carrefour Maf Uae Site, 27 June 2010, 
    www.carrefourjordan.com/mafjor/en/Carrefour/c/00000
Buy Taj Vegetables Instant Noodles 75g Online - Shop Food Cupboard on Carrefour Lebanon.” 
    Carrefour EGYPT Website, 14 Aug. 2013, 
    www.carrefourlebanon.com/maflbn/en/packet-noodles/taj-noodles-vegetables-75gr/p/350741?list_name=category%7CFLEB1714800. 
“Buy Products Easily.” Shopifull, 10 Jan. 2023, shopifull.com/. 
Lienesch, Hans "The Ramen Rater". “#3270: Fitmee Konjac Chicken Soto - Indonesia.” THE RAMEN RATER, 1 Sept. 2019, 
    www.theramenrater.com/2019/09/01/3270-fitmee-konjac-chicken-soto-indonesia/. 
“Lishan Taiwan Instant Noodle 5ct 275 g.” Lishan Taiwan Instant Noodle 5ct - Weee!, 23 Dec. 2019, 
    www.sayweee.com/en/product/Lishan-Taiwan-Instant-Noodle-5ct/4793
Lienesch, Hans "The Ramen Rater". “The Ramen Rater.” THE RAMEN RATER, 20 Jan. 2023, www.theramenrater.com/. 
“Soups Online!” Soups, 31 Dec. 2012, www.soupsonline.com/. 
“Buy Packet Noodles Online - Shop on Carrefour Jordan.” Carrefour Maf Uae Site, 24 Feb. 2019, 
    www.carrefourjordan.com/mafjor/en/food-cupboard/tins-jars-packets/soup-instant-noodles/packet-noodles/c/FJOR1714805. 
“Buy Nissin Instant Cup Noodles 75g Online - Shop Food Cupboard on Carrefour UAE.” Carrefour UAE Website, 21 July 2017, 
    www.carrefouruae.com/mafuae/en/cup-noodles/nissin-cup-noodles-spicy-seafd-69g/p/1376488. 
“Online Shopping in Pakistan: Cosmetics, Groceries, Mobiles, Fashion, Electronics & More: Online Shopping in Karachi, 
    Lahore and Pakistan.” Naheed.pk, 14 July 2011, www.naheed.pk/. 
“Maruchan Instant Noodle Soup 2.25oz.” Target, 23 Feb. 2022,
     www.target.com/p/maruchan-instant-lunch-beef-flavor-noodle-soup-2-25oz/-/A-47111273. 
“Tanaman Ramen Noodles in Cups (Made in Israel) " Yoshon.com.” Yoshon.com, 27 Nov. 2022, 
    yoshon.com/product/taaman-ramen-noodles-in-cups-made-in-israel/. 
“Shop a Recipe!” Order Groceries Online - Alphamega Hypermarkets, 14 Aug. 2011, www.alphamega.com.cy/en. 
“The Basket Online.” The Basket Online Grocery Shopping In Chattagram, 22 Oct. 2012, www.thebasketbd.com/. 
“Buy Indomie Cup Noodles” Carrefour EGYPT Website, 25 June 2014, 
    www.carrefourksa.com/mafsau/en/cup-noodles/indomie-cup-noodle-curry-60g/p/445487?list_name=category%7CFKSA1714806. 
                </pre>
            </div>
        </div>
        <br>
        <div id="checkout">
                <button  onclick="goHome()">Go home!</button>
        </div>
        <br>
        <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script>
        </script>

    </body>
</html>