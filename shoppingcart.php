<?php
    session_start();

    require_once('mysqlconfig.php');
    if(!isset($_SESSION['cart'])){
        $_SESSION["cart"] = array();
        $_SESSION["cartamount"] = array();
    }

    if (count($_SESSION['cart']) != 0){
        $in  = str_repeat('?,', count($_SESSION['cart']) - 1) . '?';
        $sql = "SELECT * FROM noodles WHERE id IN ($in)"; 
        $stmt = $conn->prepare($sql); 
        $types = str_repeat('s', count($_SESSION['cart']));
        $stmt->bind_param($types, ...$_SESSION['cart']);
        $stmt->execute();
        
        $result = $stmt->get_result(); // get the mysqli result

        //declare array to store the data of database
        $row = []; 
    
        if ($result->num_rows > 0) 
        {
            // fetch all data from db into array 
            $row = $result->fetch_all(MYSQLI_ASSOC);

            $total = 0;
            $i = 0;
            foreach($row as $rows){
                $total += $rows['price'] * $_SESSION['cartamount'][$i];
                $i +=1; 
            }

        }
    }else{
        $row = array();
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Your shopping cart!</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <style>
            body{
                color: white;
                background-image:url("pictures/cartbg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            #nothingincart, #pay{
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

        <div id="header">
            <img src="pictures/cart.png">
        </div>

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

        <span>
            <button id="homebtn" onclick="goHome()"></button>
        </span>

        <br>
        <br>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th><h1>Image</h1></th>
                        <th><h1>Name</h1></th>
                        <th><h1>Price</h1></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    if(!empty($row))
                        
                        foreach($row as $rows)
                            
                        { 
                    ?>
                        <tr id="<?php echo $rows['id']?>">
                            <td><img src = "<?php echo $rows['image']; ?>" ></td>
                            <td><?php echo $rows['fullname'] ?></td>
                            <td>$<?php echo $rows['price']*$_SESSION['cartamount'][$i]; ?> (<?php echo $_SESSION['cartamount'][$i]; ?> items)</td>
                            <td><button onclick="deleteProduct('<?php echo $rows['id']?>', <?php echo $rows['price']*$_SESSION['cartamount'][$i]; ?>)"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                    <?php 
                        $i += 1;
                    }else{
                        echo "Nothing in your shopping cart yet!";
                    }
                    ?>
                </tbody>
            </table>
            <h1 id="nothingincart">Nothing in your shopping cart yet!</h1>
            <h1 id="total">Total: $<?php if (isset($total)){echo $total;}else{echo 0;} ?></h1> <!--change so it only shows up when cart is full-->
        </div>
        <br>
        <div id="checkout">
            <button id="addmore" onclick="goShop()">Add more products!</button>
            <button id="pay" onclick="proceedToCheckout()">Continue to checkout!</button>
        </div>
        <br>
        <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script>        
            var total = Number(<?php if (isset($total)){echo $total;}else{echo 0;} ?>);
        
            function proceedToCheckout(){ 
                window.location.href = "checkout.php";
            }

            function displayCheckout(){
                if (total > 0){
                    document.getElementById('pay').style.display = "block";
                }
            }

            displayCheckout();
        </script>
    </body>
    
    <!--PHP code for deleting products in cart-->
    <?php
        // if (isset($_POST['id'])){
        //     $deletedProduct = $_POST['id'];
        //     $productIndex = array_search($deletedProduct, $_SESSION["cart"]);
        //     array_splice($_SESSION["cart"], $productIndex, $productIndex);
        //     array_splice($_SESSION["cartamount"], $productIndex, $productIndex);
        //     unset($_SESSION["cart"][$productIndex]);
        //     unset($_SESSION["cartamount"][$productIndex]);
        //     array_values($_SESSION["cart"]);
        //     array_values($_SESSION["cartamount"]);
        // }
    ?>

    <?php
        mysqli_close($conn);
        if(isset($_SESSION['loggedin'])){
            if($_SESSION['loggedin'] == "true" || $_SESSION['loggedin'] == "no"){
                echo "<script>document.getElementById('loginlink').innerHTML = 'Logout';</script>";
                echo "<style>#loggedinform {display:block;}</style>";
            }
        }
    ?>
</html>