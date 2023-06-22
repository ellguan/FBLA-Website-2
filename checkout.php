<?php
    session_start();
    require_once('mysqlconfig.php');

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
            td{
                padding:3%;
            }
            th{
                text-align:left;
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

        <div id="header">
            <img src="pictures/checkout.png">
        </div>
        <br>
        <br>

        <div id="sidebyside">
            <div id="noodlepics">
                <div class="row">
                <div class="col-75">
                    <div class="container">
                    <form>

                        <div class="row">
                        <div class="col-50">
                            <h3>Shipping Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">

                            <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="NY">
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zip" placeholder="10001">
                            </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                            <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2023">
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="352">
                            </div>
                            </div>
                        </div>

                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
            <div id="filters">
                <h1>Cart
                    <span class="price" style="color:black">
                    <b> <?php echo ' '.$i; ?></b>
                    <i class="fa fa-shopping-cart"></i>
                    </span>
                </h1>
                <table>
                    <thead>
                        <tr>
                            <th><h3>Name</h3></th>
                            <th><h3>Price</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        if(!empty($row))
                            
                            foreach($row as $rows)
                                
                            { 
                        ?>
                            <tr>
                                <td><?php echo $rows['fullname'] ?></td>
                                <td>$<?php echo $rows['price']*$_SESSION['cartamount'][$i]; ?> (<?php echo $_SESSION['cartamount'][$i]; ?> items)</td>
                            </tr>
                        <?php 
                            $i += 1;
                        }else{
                            echo "Nothing in your shopping cart yet!";
                        }
                        ?>
                    </tbody>
                </table>

                <h1 id="total">Total: $<?php if (isset($total)){echo $total;}else{echo 0;} ?></h1>
            </div>
        </div>
        <br>
        <div id="checkout">
                <button  onclick="pay()">Pay now!</button>
        </div>
        <br>
        <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script>
            function pay(){
    Swal.fire({
        title: 'Your order has been confirmed!',
        text: "You will receive a receipt in your email shortly.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Okay!'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "index.php";
        }
      })
}
        </script>

    </body>
</html>

<?php
    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin'] == "true" || $_SESSION['loggedin'] == "no"){
            echo "<script>document.getElementById('loginlink').innerHTML = 'Logout';</script>";
            echo "<style>#loggedinform {display:block;}</style>";
        }
    }
?>