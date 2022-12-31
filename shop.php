<?php
    session_start();

    require_once('mysqlconfig.php');

    $cart = array();
    $_SESSION["cart"] = $cart;
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

        <style>
            img{
                height:25%;
                width:25%;
            }
            button{
                border:#F1BA0A 3px solid;
                background-color:black;
                padding:5px;
                font-size:60%;
                cursor:pointer;
                transition-duration:.4s;
                text-decoration:none;
                color:#F1BA0A;
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
        <div id="noodlepics">
            <img src="pictures/noodles/shin.jpg" class="addtocart shin china eastasia spicy ramen" alt="Shin Ramen">
            <button class="addtocart shin korea eastasia spicy ramen" id="shin">Add to cart!</button>
            <img src="pictures/noodles/maggi.jpg" class="addtocart india southasia nonspicy maggi" alt="Maggi">
            <button class="addtocart india southasia nonspicy maggi" id="maggi">Add to cart!</button>
            <img src="pictures/noodles/jinmailang.jpg" class="addtocart jinmailang china eastasia nonspicy ramen" alt="Jin Mai Lang">
            <button class="addtocart jinmailang china eastasia nonspicy ramen" id="jinmailang">Add to cart!</button>
        </div>
        <div id="filters">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET" id="filterform">
                <input type="checkbox" value="eastasia" name="filters[]" id="eastasia">
                <label for="eastasia">East Asia</label>
                <br>
                <input type="checkbox" value="nonspicy" name="filters[]" id="nonspicy">
                <label for="nonspicy">Non-spicy</label>
                <br>
                <input type="submit" value="Apply filters!">
                <br>
            </form>
        </div>
        <div id="searchquery">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                <br>
                <input type="text" name="query">
                <input type="submit" value="Search!">
            </form>
            <button type="button" id="goback" onclick="goHome()">Go back!</button>
        </div>
    </body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>
    
    <script type="text/javascript">
        function goHome(){
            window.location.href = "shop.php";
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