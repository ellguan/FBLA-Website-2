<?php
    session_start();
    require_once('mysqlconfig.php');

    //selecting values from the table and display them
    $sql = " SELECT * FROM noodles";
    $result = $conn->query($sql);
    $conn->close();

    while($rows=$result->fetch_assoc()){
        
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
        </style>
    </head>
    <body>
        <div id="menu" onclick="menuclose()">
            <div id="menuitems">
                <h1 onclick="menuclose()">&times;</a>
                <!--logo here-->
                <!--line here-->
                <h1 onclick="goHome()">Home</h1>
                <h1 onclick="goRegister()">Membership</h1>
                <h1 onclick="goShop()">Products</h1>
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
                    while($rows=$result->fetch_assoc())
                    {
                ?>
                    <div class="noodlepic">
                        <img src="<?php echo $rows['image'];?>" class="addtocart "><br>
                        <h1><?php echo $rows['fullname']?></h1>
                        <h2>$<?php echo $rows['price'];?></h2>
                        <button class="addtocart shin korea eastasia spicy ramen" id="<?php echo $rows['id'];?>">Add to cart!</button>
                    </div>
                    <br>
                <?php
                    }
                ?>
                <img src="pictures/noodles/shin.jpg" class="addtocart shin southkorea eastasia spicy ramen" alt="Shin Ramen">
                <button class="addtocart shin korea eastasia spicy ramen" id="shin">Add to cart!</button>
                <img src="pictures/noodles/maggi.jpg" class="addtocart india southasia spicy maggi" alt="Maggi">
                <button class="addtocart india southasia spicy maggi" id="maggi">Add to cart!</button>
                <img src="pictures/noodles/jinmailang.jpg" class="addtocart jinmailang china eastasia nonspicy ramen" alt="Jin Mai Lang">
                <button class="addtocart jinmailang china eastasia nonspicy ramen" id="jinmailang">Add to cart!</button>
            </div>
            <div id="filters">
                <h1>SEARCH:</h1>
                <div id="searchquery">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                        <br>
                        <input type="text" name="query">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <button type="button" id="goback" onclick="goShop()">Go back!</button>
                </div>
                <h1>SORT BY:</h1>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET" id="filterform">
                    <h2>‣ Country?</h2>
                    
                    <h2 onclick="dropdown('countrydropdown')">‣ Region?</h2>
                    <div id="countrydropdown" class="dropdown">
                        <input type="checkbox" value="eastasia" name="filters[]" id="eastasia">
                        <label for="eastasia">East Asia</label><br>
                        <input type="checkbox" value="centralasia" name="filters[]" id="centralasia">
                        <label for="centralasia">Central Asia</label><br>
                        <input type="checkbox" value="southasia" name="filters[]" id="southasia">
                        <label for="southasia">South Asia</label><br>
                        <input type="checkbox" value="southeastasia" name="filters[]" id="southeastasia">
                        <label for="southeastasia">South East Asia</label>
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
                    <h2 onclick="dropdown('allergydropdown')">‣ Common Allergy/Dietary Restrictions?</h2>
                    <div id="allergydropdown" class="dropdown">
                        <input type="checkbox" value="glutenfree" name="filters[]" id="glutenfree">
                        <label for="glutenfree">Gluten-free</label><br>
                        <input type="checkbox" value="peanutfree" name="filters[]" id="peanutfree">
                        <label for="peanutfree">Peanut-free</label><br>
                        <input type="checkbox" value="soybeansfree" name="filters[]" id="soybeansfree">
                        <label for="soybeansfree">Soybeans-free</label><br>
                        <input type="checkbox" value="eggsfree" name="filters[]" id="eggsfree">
                        <label for="eggsfree">Eggs-free</label><br>
                        <input type="checkbox" value="milkfree" name="filters[]" id="milkfree">
                        <label for="milkfree">Milk-free</label><br>
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
                        <input type="checkbox" value="sour" name="filters[]" id="sour">
                        <label for="sour">Sour</label>
                    </div>
                    <h2 onclick="dropdown('noodledropdown')">‣ Noodle Type?</h2>
                    <div id="noodledropdown" class="dropdown">
                        <input type="checkbox" value="ramen" name="filters[]" id="ramen">
                        <label for="ramen">Ramen</label><br>
                        <input type="checkbox" value="maggi" name="filters[]" id="maggi">
                        <label for="maggi">Maggi</label><br>
                        <input type="checkbox" value="vermicelli" name="filters[]" id="vermicelli">
                        <label for="vermicelli">Vermicelli</label><br>
                        <input type="checkbox" value="chowmein" name="filters[]" id="chowmein">
                        <label for="chowmein">Chow Mein</label><br>
                        <input type="checkbox" value="cupnoodles" name="filters[]" id="cupnoodles">
                        <label for="cupnoodles">Cup Noodles</label><br>
                        <input type="checkbox" value="noodlesoup" name="filters[]" id="noodlesoup">
                        <label for="noodlesoup">Noodle Soup</label><br>
                        <input type="checkbox" value="cellophane" name="filters[]" id="cellophane">
                        <label for="cellophane">Cellophane</label>
                    </div>
                    <br>
                    <input type="submit" value="Apply filters!">
                    <button type="button" onclick="goShop()">Clear all filters!</button>   
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
        function dropdown(id){
            if(document.getElementById(id).style.display == "block"){
                document.getElementById(id).style.display = "none";
                
            }else{
                document.getElementById(id).style.display = "block";
            }
        }
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
                    finalArray[i].style.display = 'block';
                }
                
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
                                items[i].style.display='block';
                            }
                        </script>
    <?php
                    }

                }else{
                    echo "No results :(";
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