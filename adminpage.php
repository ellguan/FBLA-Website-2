<!DOCTYPE html>
<?php
require_once('mysqlconfig.php');
// start session
session_start();
if (isset($_POST['username'], $_POST['password'])) {
    if ($stmt = $conn->prepare('SELECT username, password FROM adminlogin2 WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($username, $password);
            $stmt->fetch();
            if (password_verify($_POST['password'], $password)) {
                $_SESSION['adminloggedin'] = "true";
            } else {
                $_SESSION['adminloggedin'] = "false";
                header("Location: adminlogin.php");
            }
        } else {
            $_SESSION['adminloggedin'] = "false";
            header("Location: adminlogin.php");
        }
        $stmt->close();
    }
}else if(!isset($_SESSION['adminloggedin'])){
    header("Location: index.php");
}else if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == "true"){
}else{
    header("Location: index.php");
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Admin Portal</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <style>
            body{
                background-image:url("pictures/loginbg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            #logindiv{
                width:80%;
                background-color:#A70B0B;
                margin-left:auto;
                margin-right:auto;
                color:white;
                padding:5%;
            }
            /* table, td, th{
                font-size:100%;
                border: 10px solid white;
            }
            td, th, tr{
                padding: 10%;
            } */
            th, td{
                color:white;
                border: 5px solid white;
                text-align:center;
            }
            .title{
                font-size:300%;
                color:#F1BA0A;
                padding:5%;
            }
            button[type="submit"]{
                border-color:white;
                color:white;
                font-size:100%;
            }
            button[type="submit"]:hover{
                border-color:#F1BA0A;
                color:#F1BA0A;
            }
            #menubutton:hover{
                color:#A70B0B;
            }
            .logout{
                margin-left:5%;
                font-size:200%;
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
            <button id="menubutton" style="color:#F1BA0A;" onclick="menuopen()">☰ Be HAAPI, Eat Noodles</button> 
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

        <h1 class="title">Admin Portal</h1><br>

        <div id="logindiv">
            <h1>Add a product!</h1>
            <form action="addproduct.php" method="post">
                <label for="noodleid"><b>ID</b></label>
                <input type="text" name="noodleid" required><br><br>
                <label for="noodleimage"><b>Image</b></label>
                <input type="text" name="noodleimage" required><br><br>
                <label for="noodlename"><b>Full Name</b></label>
                <input type="text" name="noodlename" required><br><br>
                <label for="noodleprice"><b>Price</b></label>
                <input type="text" name="noodleprice" required><br><br>
                <label for="noodlefilters"><b>Filters</b></label>
                <input type="text" name="noodlefilters" required><br><br>
                <button type="submit">Create an entry!</button>
            </form>
            <br>
            <h1>Delete a product!</h1>
            <p>Search for a product via name to delete.</p>
            <div id="searchquery">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                        <div id="searchbar">
                            <input type="text" name="query">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
<?php
    if(isset($_GET['query'])){
        echo "<script>document.getElementById('table').style.display = block;</script>";
    
        $query = $_GET['query']; 
        $min_length = 3;
    
        if(strlen($query) >= $min_length){ 
    
            $sql = "SELECT * FROM noodles2 WHERE fullname LIKE '%".$query."%'"; 
            $stmt = $conn->prepare($sql); 
            $result = $stmt->execute();

            $result = $stmt->get_result(); // get the mysqli result

                //declare array to store the data of database
                $row = [];
?>
            <div class="content">
            <table id="table">
                <tr>
                    <th>id</th>
                    <th>image</th>
                    <th>full name</th>
                    <th>price</th>
                    <th>filters</th>
                    <th></th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                    if ($result->num_rows > 0) 
                {
                    // fetch all data from db into array 
                    $row = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($row as $rows){
                ?>
                <tr id="<?php echo $rows['id']; ?>row">
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['image'];?></td>
                    <td><?php echo $rows['fullname'];?></td>
                    <td><?php echo $rows['price'];?></td>
                    <td><?php echo $rows['filters'];?></td>
                    <td ><button onclick="deleteentry('<?php echo $rows['id']; ?>')"><i class="fa-solid fa-trash-can"></i></button></td>
                </tr>
                <?php
                    }
                }else{ // if query length is less than minimum
                    echo "Minimum length is ".$min_length;
            }
}
    }
                ?>
            </table>
            </div>
            </div>
            <br>
            <button class="logout" onclick="logout()">Log out</button>
            <br>
            <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
    </body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <script>
        function deleteentry(id){
            console.log(id);
            $.ajax({
                url: "deleteentry.php",
                type: "POST",
                data: {id: id},
                success: function(data){
                    console.log(data);
                    if (data == "1"){
                        //window.location.href = "adminpage.php";
                        Swal.fire({
                            icon: 'success',
                            title: 'Item has successfully been deleted!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        document.getElementById(id+"row").style.display = "none";
                    }
                }
            });
        }
        function logout(){
            window.location.href = "logout.php";
        }
    </script>
    <?php
    if(isset($_SESSION['addproduct'])){
        if($_SESSION['addproduct'] == "true"){
            echo "<script src='script.js'>
            </script><script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Entry has successfully been created!'
              })
            </script>";
            $_SESSION['addproduct'] = "false";
        }
    }
    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin'] == "true" || $_SESSION['loggedin'] == "no"){
            echo "<script>document.getElementById('loginlink').innerHTML = 'Logout';</script>";
            echo "<style>#loggedinform {display:block;}</style>";
        }
    }
    ?>
</html>