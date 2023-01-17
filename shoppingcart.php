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
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Your shopping cart!</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <style>
            body{
                color: white;
                background-image:url("pictures/checkoutbg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            #nothingincart, #checkout{
                display:none;
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
                <h1 onclick="goRegister()">Membership</h1>
                <h1 onclick="goShop()">Products</h1>
            </div>
        </div>

        <span> 
            <button id="menubutton" onclick="menuopen()">☰</button> 
        </span>

        <div id="header">
            <img src="pictures/checkout.png">
            <h1 onclick="goHome()">Be HAAPI, Eat Noodles</h1>
        </div>

        <br>
        <br>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Count</th>
                        <th>Price</th>
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
                            <td><h1><?php echo $rows['fullname'] ?></h1></td>
                            <td><h1><?php echo $_SESSION['cartamount'][$i]; ?></h1></td>
                            <td><h1>$<?php echo $rows['price']*$_SESSION['cartamount'][$i]; ?></h1></td>
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
            <p id="nothingincart">Nothing in your shopping cart yet!</p>
            <p id="total">Total: $<?php if (isset($total)){echo $total;}else{echo 0;} ?></p> <!--change so it only shows up when cart is full-->
        </div>

        <button id="checkout" onclick="proceedToCheckout()">Checkout!</button>
        <button id="addmore" onclick="goShop()">Add more products!</button>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script>        
            var total = Number(<?php echo $total ?>);
        
            function proceedToCheckout(){ //make sure to link this to checkout page
                <?php //$_SESSION['cart'] = array();
                //echo implode("", $_SESSION['cart'])?>
            }

            function displayCheckout(){
                if (total > 0){
                    document.getElementById('checkout').style.display = "block";
                }
            }

            displayCheckout();
        </script>
    </body>
    
    <!--PHP code for deleting products in cart-->
    <?php
        if (isset($_POST['id'])){
            echo "hello";
            $deletedProduct = $_POST['id'];
            $productIndex = array_search($deletedProduct, $_SESSION["cart"]);
            unset($_SESSION["cart"][$productIndex]);
            unset($_SESSION["cartamount"][$productIndex]);
            array_values($_SESSION["cart"]);
            array_values($_SESSION["cartamount"]);
        }
    ?>

    <?php
        mysqli_close($conn);
    ?>
</html>