<?php
    session_start();
    require_once('mysqlconfig.php');

    //selecting values from the table and display them
    $sql = " SELECT * FROM noodles";
    $result = $conn->query($sql);
    $_SESSION["allnoodles"] = array();
    while($row=$result->fetch_assoc()){
        array_push($_SESSION["allnoodles"], $row);
    }

    for ($x = 1; $x <= 10; $x++) {
        $_SESSION["shop".$x] = array();
    }
    $noodlecounter = 0;
    for ($counter = 1; $counter <= 10; $counter++) {
        for ($x = 0; $x < 15; $x++) {
            if(array_key_exists($noodlecounter, $_SESSION["allnoodles"])){
                array_push($_SESSION["shop".$counter], $_SESSION["allnoodles"][$noodlecounter]);
            }
            $noodlecounter+=1;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Shop</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-image:url("pictures/shopbg2.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            
            img{
                height:25%;
                width:25%;
            }
            body{
                color: white;
            }

            #goback{
                display:none;
            }
            .all{
                display:none;
            }
            #pagination{
                display:flex;
            }
            #noresults{
                display:none;
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
                <h1 onclick="goAbout()">About</h1>
                <h1 onclick="goContact()">Contact</h1>
                <h1 onclick="goHome()">Home</h1>
                <h1 onclick="goShop()">Products</h1>
                <h1 onclick="goCart()">Shopping Cart</h1>
                <h1 onclick="goCredits()">Credits</h1>
            </div>
        </div>

        <span> 
            <button id="menubutton" onclick="menuopen()">☰</button> 
        </span>

        <div id="header">
            <img src="pictures/shop.png">
            <h1 onclick="goHome()">Be HAAPI, Eat Noodles</h1>
        </div>
        <br>
        <br>
        <div id="sidebyside">
            <div id="noodlepics">
                <?php
                    foreach($_SESSION["shop5"] as $rows){
                ?>
                    <div class="noodlepic addtocart <?php echo $rows['id'];?> <?php echo $rows['filters'];?>" onclick="itemopen('<?php echo (string)$rows['noodleid'];?>')">
                        <div>
                        <img src="<?php echo $rows['image'];?>"><br>
                        </div>
                        <div>
                        <h1><?php echo $rows['fullname']?></h1>
                        <h2>$<?php echo $rows['price'];?></h2>
                        <button>View product!</button>
                        </div>
                    </div>
                    <div class="noodlesoverlay" id="<?php echo (string)$rows['noodleid'];?>">
                        <div class="noodleoverlay1">
                            <img src="<?php echo $rows['image'];?>"><br>
                        </div>
                        <div class="noodleoverlay2">
                            <h1 onclick="itemclose('<?php echo (string)$rows['noodleid'];?>')" class="closenoodleoverlay">&times;</h1>
                            <h1><?php echo $rows['fullname']?></h1>
                            <h2>Filters:</h2><p><?php echo str_replace("addtocart","", $rows['filters']);?></p>
                            <h2>$<?php echo $rows['price'];?></h2>
                            <button id="<?php echo $rows['id'];?>" onclick="addtocart('<?php echo $rows['id'];?>')">Add to cart!</button>
                            <input type="number" id="<?php echo $rows['id'].'amount';?>" name="amount" step="1" value="1">
                        </div>
                    </div>
                <?php
                    }

                    foreach($_SESSION["allnoodles"] as $rows){
                        if(!(in_array($rows, $_SESSION["shop5"]))){
                ?>
                    <div class="all noodlepic addtocart <?php echo $rows['id'];?> <?php echo $rows['filters'];?>" onclick="itemopen('<?php echo (string)$rows['noodleid'];?>')" <?php echo $rows['filters'];?>>
                        <div>
                        <img src="<?php echo $rows['image'];?>"><br>
                        </div>
                        <div>
                        <h1><?php echo $rows['fullname']?></h1>
                        <h2>$<?php echo $rows['price'];?></h2>
                        <button>View product!</button>
                        </div>
                    </div>
                    <div class="noodlesoverlay" id="<?php echo (string)$rows['noodleid'];?>">
                        <div class="noodleoverlay1">
                            <img src="<?php echo $rows['image'];?>"><br>
                        </div>
                        <div class="noodleoverlay2">
                            <h1 onclick="itemclose('<?php echo (string)$rows['noodleid'];?>')" class="closenoodleoverlay">&times;</h1>
                            <h1><?php echo $rows['fullname']?></h1>
                            <h2>Filters:</h2><p><?php echo str_replace("addtocart","", $rows['filters']);?></p>
                            <h2>$<?php echo $rows['price'];?></h2>
                            <button id="<?php echo $rows['id'];?>" onclick="addtocart('<?php echo $rows['id'];?>')">Add to cart!</button>
                            <input type="number" id="<?php echo $rows['id'].'amount';?>" name="amount" step="1" value="1">
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>

                <br>

                <div class="pagination" id="pagination">
                    <a href="shop4.php">&laquo;</a>
                    <a href="shop.php">1</a>
                    <a href="shop2.php">2</a>
                    <a href="shop3.php">3</a>
                    <a href="shop4.php">4</a>
                    <a class="active" href="shop5.php">5</a>
                    <a href="shop6.php">6</a>
                    <a href="shop7.php">7</a>
                    <a href="shop8.php">8</a>
                    <a href="shop9.php">9</a>
                    <a href="shop6.php">&raquo;</a>
                </div>

                <h1 id="noresults">No results :(</h1>
            </div>
            <div id="filters">
                <h1>SEARCH:</h1>
                <div id="searchquery">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                        <div id="searchbar">
                            <input type="text" name="query">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <button type="button" id="goback" onclick="goShop()">Go back!</button>
                </div>
                <h1>SORT BY:</h1>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET" id="filterform">
                    <h2 onclick="dropdown('countrydropdown')">‣ Country?</h2> <!--change-->
                    <div id="countrydropdown" class="dropdown">
                        <input type="checkbox" value="china" name="filters[]" id="china">
                        <label for="china">China</label><br>
                        <input type="checkbox" value="japan" name="filters[]" id="japan">
                        <label for="japan">Japan</label><br>
                        <input type="checkbox" value="mongolia" name="filters[]" id="mongolia">
                        <label for="mongolia">Mongolia</label><br>
                        <input type="checkbox" value="southkorea" name="filters[]" id="southkorea">
                        <label for="southkorea">South Korea</label><br>
                        <input type="checkbox" value="kazakhstan" name="filters[]" id="kazakhstan">
                        <label for="kazakhstan">Kazakhstan</label><br>
                        <input type="checkbox" value="turkmenistan" name="filters[]" id="turkmenistan">
                        <label for="turkmenistan">Turkmenistan</label><br>
                        <input type="checkbox" value="bangladesh" name="filters[]" id="bangladesh">
                        <label for="bangladesh">Bangladesh</label><br>
                        <input type="checkbox" value="iran" name="filters[]" id="iran">
                        <label for="iran">Iran</label><br>
                        <input type="checkbox" value="maldives" name="filters[]" id="maldives">
                        <label for="maldives">Maldives</label><br>
                        <input type="checkbox" value="nepal" name="filters[]" id="nepal">
                        <label for="nepal">Nepal</label><br>
                        <input type="checkbox" value="pakistan" name="filters[]" id="pakistan">
                        <label for="pakistan">Pakistan</label><br>
                        <input type="checkbox" value="india" name="filters[]" id="india">
                        <label for="india">India</label><br>
                        <input type="checkbox" value="hongkong" name="filters[]" id="hongkong">
                        <label for="hongkong">Hong Kong</label><br>
                        <input type="checkbox" value="iraq" name="filters[]" id="iraq">
                        <label for="iraq">Iraq</label><br>
                        <input type="checkbox" value="israel" name="filters[]" id="israel">
                        <label for="israel">Israel</label><br>
                        <input type="checkbox" value="jordan" name="filters[]" id="jordan">
                        <label for="jordan">Jordan</label><br>
                        <input type="checkbox" value="lebanon" name="filters[]" id="lebanon">
                        <label for="lebanon">Lebanon</label><br>
                        <input type="checkbox" value="qatar" name="filters[]" id="qatar">
                        <label for="qatar">Qatar</label><br>
                        <input type="checkbox" value="saudiarabia" name="filters[]" id="saudiarabia">
                        <label for="saudiarabia">Saudi Arabia</label><br>
                        <input type="checkbox" value="turkey" name="filters[]" id="turkey">
                        <label for="turkey">Turkey</label><br>
                        <input type="checkbox" value="unitedarabemirates" name="filters[]" id="unitedarabemirates">
                        <label for="unitedarabemirates">United Arab Emirates</label><br>
                        <input type="checkbox" value="yemen" name="filters[]" id="yemen">
                        <label for="yemen">Yemen</label><br>
                        <input type="checkbox" value="brunei" name="filters[]" id="brunei">
                        <label for="brunei">Brunei</label><br>
                        <input type="checkbox" value="cambodia" name="filters[]" id="cambodia">
                        <label for="cambodia">Cambodia</label><br>
                        <input type="checkbox" value="indonesia" name="filters[]" id="indonesia">
                        <label for="indonesia">Indonesia</label><br>
                        <input type="checkbox" value="laos" name="filters[]" id="laos">
                        <label for="laos">Laos</label><br>
                        <input type="checkbox" value="malaysia" name="filters[]" id="malaysia">
                        <label for="malaysia">Malaysia</label><br>
                        <input type="checkbox" value="taiwan" name="filters[]" id="taiwan">
                        <label for="taiwan">Taiwan</label><br>
                        <input type="checkbox" value="philippines" name="filters[]" id="philippines">
                        <label for="philippines">Philippines</label><br>
                        <input type="checkbox" value="singapore" name="filters[]" id="singapore">
                        <label for="singapore">Singapore</label><br>
                        <input type="checkbox" value="thailand" name="filters[]" id="thailand">
                        <label for="thailand">Thailand</label><br>
                        <input type="checkbox" value="timorleste" name="filters[]" id="timorleste">
                        <label for="timorleste">Timor Leste</label><br>
                        <input type="checkbox" value="vietnam" name="filters[]" id="vietnam">
                        <label for="vietnam">Vietnam</label><br>
                        <input type="checkbox" value="carolineislands" name="filters[]" id="carolineislands">
                        <label for="carolineislands">Caroline Islands</label><br>
                        <input type="checkbox" value="northernmarianaislands" name="filters[]" id="northernmarianaislands">
                        <label for="northernmarianaislands">Northern Mariana Islands</label><br>
                        <input type="checkbox" value="fiji" name="filters[]" id="fiji">
                        <label for="fiji">Fiji</label><br>
                        <input type="checkbox" value="newcaledonia" name="filters[]" id="newcaledonia">
                        <label for="newcaledonia">New Caledonia</label><br>
                        <input type="checkbox" value="papuanewguinea" name="filters[]" id="papuanewguinea">
                        <label for="papuanewguinea">Papua New Guinea</label><br>
                        <input type="checkbox" value="solomonislands" name="filters[]" id="solomonislands">          
                        <label for="solomonislands">Solomon Islands</label><br>
                        <input type="checkbox" value="vanuatu" name="filters[]" id="vanuatu">
                        <label for="vanuatu">Vanuatu</label><br>
                        <input type="checkbox" value="marshallislands" name="filters[]" id="marshallislands">
                        <label for="marshallislands">Marshall Islands</label><br>
                        <input type="checkbox" value="newzealand" name="filters[]" id="newzealand">
                        <label for="newzealand">New Zealand</label><br>
                        <input type="checkbox" value="samoa" name="filters[]" id="samoa">
                        <label for="samoa">Samoa</label><br>
                        <input type="checkbox" value="hawaii" name="filters[]" id="hawaii">
                        <label for="hawaii">Hawaii</label><br>
                    </div>
                    <h2 onclick="dropdown('regiondropdown')">‣ Region?</h2>
                    <div id="regiondropdown" class="dropdown">
                        <input type="checkbox" value="eastasia" name="filters[]" id="eastasia">
                        <label for="eastasia">East Asia</label><br>
                        <input type="checkbox" value="centralasia" name="filters[]" id="centralasia">
                        <label for="centralasia">Central Asia</label><br>
                        <input type="checkbox" value="southasia" name="filters[]" id="southasia">
                        <label for="southasia">South Asia</label><br>
                        <input type="checkbox" value="southeastasia" name="filters[]" id="southeastasia">
                        <label for="southeastasia">South East Asia</label><br>
                        <input type="checkbox" value="westernasiaterritories" name="filters[]" id="westernasiaterritories">
                        <label for="westernasiaterritories">Western Asia or Territories</label>
                        <input type="checkbox" value="pacificislanders" name="filters[]" id="pacificislanders">
                        <label for="pacificislanders">Pacific Islands</label>
                    </div>
                    <h2 onclick="dropdown('spicedropdown')">‣ Spice Level?</h2>
                    <div id="spicedropdown" class="dropdown">
                        <input type="checkbox" value="spice1" name="filters[]" id="spice1">
                        <label for="spice1">1 (Not spicy)</label><br>
                        <input type="checkbox" value="spice2" name="filters[]" id="spice2">
                        <label for="spice2">2</label><br>
                        <input type="checkbox" value="spice3" name="filters[]" id="spice3">
                        <label for="spice3">3</label><br>
                        <input type="checkbox" value="spice4" name="filters[]" id="spice4">
                        <label for="spice4">4</label><br>
                        <input type="checkbox" value="spice5" name="filters[]" id="spice5">
                        <label for="spice5">5 (Very spicy)</label>
                    </div>
                    <h2 onclick="dropdown('allergydropdown')">‣ Common Allergy Restrictions?</h2>
                    <div id="allergydropdown" class="dropdown">
                        <input type="checkbox" value="glutenfree" name="filters[]" id="glutenfree">
                        <label for="glutenfree">Gluten-free</label><br>
                        <input type="checkbox" value="peanutfree" name="filters[]" id="peanutfree">
                        <label for="peanutfree">Peanut-free</label><br>
                        <input type="checkbox" value="sesamefree" name="filters[]" id="sesamefree">
                        <label for="sesamefree">Sesame-free</label><br>
                        <input type="checkbox" value="fishfree" name="filters[]" id="fishfree">
                        <label for="fishfree">Fish-free</label><br>
                        <input type="checkbox" value="nutsfree" name="filters[]" id="nutsfree">
                        <label for="nutssfree">Treenuts-free</label><br>
                        <input type="checkbox" value="shellfishfree" name="filters[]" id="shellfishfree">
                        <label for="shellfishfree">Shellfish-free</label>
                    </div>
                    <h2 onclick="dropdown('tastedropdown')">‣ Taste?</h2>
                    <div id="tastedropdown" class="dropdown">
                        <input type="checkbox" value="spicy" name="filters[]" id="spicy">
                        <label for="spicy">Spicy</label><br>
                        <input type="checkbox" value="savory" name="filters[]" id="savory">
                        <label for="savory">Savory</label><br>
                        <input type="checkbox" value="sweet" name="filters[]" id="sweet">
                        <label for="sweet">Sweet</label>
                    </div>
                    <br>
                    <div id="submitfilters">
                        <input type="submit" value="Apply filters!"><br>
                        <button type="button" onclick="goShop()">Clear all filters!</button>   
                    </div>
                </form>   
            </div>
        </div>
        <div id="checkout">
                <button  onclick="checkout()">Checkout!</button>
        </div>
        <br>
        <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
    </body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>
    
    <script type="text/javascript"> 
    </script>

    <!--PHP code for filters-->
    <?php
        if(isset($_GET['filters'])){
            echo "
            <script>
                var filters = document.getElementsByClassName('addtocart');
                for (var i = 0; i < filters.length; i++){
                    filters[i].style.display = 'none';
                }
                var filteredarrays = [];
            </script>
            ";
            foreach($_GET['filters'] as $filter){
    ?>
                <script type="text/javascript">
                    var filtername = "<?php echo $filter ?>";
                    document.getElementById(filtername).checked = true;
                    var filtered = document.getElementsByClassName(filtername);
                    var arr = Array.prototype.slice.call( filtered, 0 ); //changes HTMLcollection to an array
                    filteredarrays.push(arr);
                </script>
    <?php

            }
    ?>
            <script>
                var finalArray = filteredarrays[0];
                if (filteredarrays.length > 1){
                    for (var i = 1; i < filteredarrays.length; i++){
                        finalArray = reduceArrays(finalArray, filteredarrays[i]);
                    }
                }
                
                for (var i = 0; i < finalArray.length; i++){
                    finalArray[i].style.display = 'flex';
                }
                if (finalArray.length == 0){
                    document.getElementById('noresults').style.display = "block";
                }
                document.getElementById('pagination').style.display = 'none';
                
            </script>
    <?php
        }
    ?>

    <!--PHP code for search bar-->
    <?php
        if(isset($_GET['query'])){

            $query = $_GET['query']; 
            $min_length = 3;

            if(strlen($query) >= $min_length){
                echo "
                <script>
                    var filters = document.getElementsByClassName('addtocart');
                    for (var i = 0; i < filters.length; i++){
                        filters[i].style.display = 'none';
                    }
                </script>
                ";

                $sql = "SELECT * FROM noodles WHERE fullname LIKE '%".$query."%'"; 
                $stmt = $conn->prepare($sql); 
                $stmt->execute();
                
                $result = $stmt->get_result(); // get the mysqli result

                //declare array to store the data of database
                $row = []; 
            
                if ($result->num_rows > 0) 
                {
                    // fetch all data from db into array 
                    $row = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($row as $rows){
    ?>
                        <script>
                            var items = document.getElementsByClassName("<?php echo $rows['id']?>");
                            for (var i=0; i < items.length; i++){
                                items[i].style.display='flex';
                                document.getElementById('pagination').style.display = 'none';
                            }
                        </script>
    <?php
                    }

                }else{
                    echo "
                    <script>
                        document.getElementById('pagination').style.display = 'none';
                        document.getElementById('noresults').style.display = 'block';
                    </script>
                    ";
                }

                //displays the go back button
                echo "
                    <script>
                        document.getElementById('goback').style.display = 'block';
                    </script>
                    ";
            }else{ // if query length is less than minimum
                echo "Minimum length is ".$min_length;
            }
        }
        
    ?>
</html>