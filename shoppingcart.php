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
            foreach($row as $rows){
                $total += $rows['price'];
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
        <style>
            body{
                color: white;
            }
            #nothingincart, #checkout{
                display:none;
            }
            
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($row))
                    foreach($row as $rows)
                    { 
                ?>
                    <tr id="<?php echo $rows['id']?>">
                        <td><?php echo $rows['fullname'] ?></td>
                        <td><img src = "<?php echo $rows['image']; ?>" ></td>
                        <td>$<?php echo $rows['price']; ?></td>
                        <td><button onclick="deleteProduct('<?php echo $rows['id']?>', <?php echo $rows['price']; ?>)">Delete</button></td>
                    </tr>
                <?php 
                    }else{
                        echo "Nothing in your shopping cart yet!";
                    }
                ?>
            </tbody>
        </table>
        <p id="nothingincart">Nothing in your shopping cart yet!</p>
        <p id="total">Total: $<?php if (isset($total)){echo $total;}else{echo 0;} ?></p> <!--change so it only shows up when cart is full-->

        <button id="checkout">Checkout!</button>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script>
            let checkout = document.getElementById("checkout");
            checkout.addEventListener("click", proceedToCheckout);
            
            var total = Number(<?php echo $total ?>);
        
            function proceedToCheckout(){ //make sure to link this to checkout page
                <?php $_SESSION['cart'] = array();
                echo implode("", $_SESSION['cart'])?>
            }

            function deleteProduct(id, price){
                document.getElementById(id).style.display = "none";
                total = total - Number(price);
                document.getElementById('nothingincart').style.display = "block";
                document.getElementById('total').innerHTML = "Total = $" + total;
                document.getElementById('checkout').style.display = "none";
            }

            function displayCheckout(){
                if (total > 0){
                    document.getElementById('checkout').style.display = "block";
                }
            }

            displayCheckout();
        </script>
    </body>
    <?php
        mysqli_close($conn);
    ?>
</html>