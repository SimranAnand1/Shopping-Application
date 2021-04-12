<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEWELLERY</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            color: black;

            background-color: pink;
        }

        h1,
        h2 {
            text-align: center;
            padding: 10px;
        }

        .jewels {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-row-gap: 25px;
            align-items: center;
            justify-items: center;
            margin-bottom: 50px;
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

        button {
            width: 150px;
            height: 50px;
            background-color: cyan;
            color: darkblue;
            font-size: 20px;
        }


        .timepass {
            display: flex;
            justify-content: center;
            margin-bottom: 100px;
        }

        .timepass button {
            width: 150px;
            font-size: 32px;
            height: 50px;
            background: red;
            color: yellow;
        }

        .btn {
            width: 150px;
            font-size: 32px;
            height: 50px;
            background: cyan;
            color: red;
        }
    </style>
</head>

<body>
    <h1>JEWELLERY</h1>

    <div class="Top">
        <button class="btn" onclick="window.location.href='viewProducts.php'"> HOME </button>
        <div>
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
        </div>

        <div>
            <button onclick="window.location.href='Logout.php';">Logout</a></button>
        </div>
    </div>
    <div class="jewels">

        <div>
            <img width="250px" height="250px" src="http://4.bp.blogspot.com/-DTDHa6F5Y3Y/UAm9yRHgRkI/AAAAAAAABIY/3cc_QAFIpxU/s1600/Jewelry+making.jpg">

            <h3>Bracelets</h3>
            <h2> price - $200</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>
        <div>
            <img width="250px" height="250px" src="https://cdnc.lystit.com/photos/2013/11/27/jcrew-crystal-crystal-rectangles-necklace-product-1-15337311-709198996.jpeg">

            <h3>Necklace</h3>
            <h2> price - $700</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>
        <div>
            <img width="250px" height="250px" src="https://cdn0.rubylane.com/shops/1519511/GV-10466.1L.jpg?82">

            <h3>Ear rings</h3>
            <h2> price - $300</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>
        <div>
            <img width="250px" height="250px" src="https://cdn.gatsbyjewellery.co.uk/wp-content/uploads/2019/01/bangles-gold-and-diamond.jpg">

            <h3>Bangles</h3>
            <h2> price - $100</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">
        </div>
        <div>
            <img width="250px" height="250px" src="https://barqmall.com/wp-content/uploads/2020/10/80a58aac57f40a330a8a9f959d52b74d.jpg">

            <h3>Finger Rings</h3>
            <h2> price - $150</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>

    </div>
    <div class="timepass">
        <button onclick="window.location.href='billing.php'"> BUY </button>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    let inputdate = document.getElementsByClassName('in');
    console.log(inputdate)
    price = [200, 700, 300, 100, 150];
    jewels = ["Bracelets", "Necklace", "Ear rings", "Bangles", " Finger rings"];
    quantiy_array = Array(5).fill(0)
    for (let i = 0; i < inputdate.length; i++) {
        inputdate[i].addEventListener('change', () => {
            if (inputdate[i].value < 0) {
                inputdate[i].value = 0;
                alert("QUANTITY CANNOT BE NEGATIVE");
                quantiy_array[i] = inputdate[i].value;
            } else {
                quantiy_array[i] = inputdate[i].value;
                console.log(quantiy_array)

                $.ajax({
                    type: "POST",
                    url: "viewProd2.php",
                    data: {
                        "info_jewel": quantiy_array,
                        "price_jewel": price,
                        "jewel": jewels
                    },
                    dataType: 'JSON',
                    success: function(resultData) {
                        console.log("POSTED DATA")
                    }

                });

            }
        })
    }
</script>
<?php

$_SESSION['info_jewel'] = isset($_POST['info_jewel']) ? $_POST['info_jewel'] : '';
$_SESSION['price'] = isset($_POST['price_jewel']) ? $_POST['price_jewel'] : '';
$_SESSION['jewel'] = isset($_POST['jewel']) ? $_POST['jewel'] : '';
?>

</html>