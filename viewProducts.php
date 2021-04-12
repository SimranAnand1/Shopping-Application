<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
   <h1> Welcome to Simran's Product Store : Buy any items from Cosmetics and Jewellery!</h1>
</head>
<style>
    a {

        text-decoration: none;

    }

    a:visited {
        text-decoration: none;
    }

    button {
        width: 250px;
        height: 50px;
        background-color: yellow;
        color: blue;
        font-size: 20px;
        margin: 30px 0;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;

        background-color: cyan;
    }

    .Top {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 70px;
        justify-content: flex-end;


    }

    .Top div {
        margin: 10px;
        color: black;
        height: 30px;
    }

    .simran {

        width: 100%;
        height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .simran div {
        margin: 50px;
    }

    .inner{
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <div class="Top">
        <diV>
            <?php session_start()
            ?>
            <?php
            if (empty($_SESSION)) {
                header('location:Login.php');
            } else {
                $cur_UserName = $_SESSION['name'];
                echo "Logged in  as   $cur_UserName";
            }
            ?>
        </diV>

        <div>
            <button onclick="window.location.href='Logout.php';">Logout</a></button>
        </div>
    </div>
    <diV class="simran">
        <div>
            <div class="inner">
               <img src="https://www.society19.com/wp-content/uploads/2015/11/main16.jpg" alt="cosmetics" width="250px" height="250px">
               <button onclick="window.location.href='viewProd1.php';">COSMETICS</a></button>
            </div>
        </div>

        <div>
                <div class="inner">
                    <img src="http://southindiajewels.com/wp/wp-content/uploads/2015/04/Kazana-Jewellery-Wedding-sets.jpg" alt="jewellery" width="250px" height="250px">
                    <button onclick="window.location.href='viewProd2.php';">JEWELLERY</button>
                </div>
        </div>
    </diV>
</body>


</html>