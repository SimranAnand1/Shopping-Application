<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMETICS</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            color: black;

            background-color: yellow;
        }

        h1,
        h2 {
            text-align: center;
            padding: 10px;
        }

        .cosmetics {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-row-gap: 25px;
            margin-bottom: 50px;
            align-items: center;
            justify-items: center;
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
            color: red;
            height: 30px;
        }

        button {
            width: 150px;
            height: 50px;
            background-color: cyan;
            color: blue;
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
            color: darkblue;
        }

        .btn {
            width: 150px;
            font-size: 32px;
            height: 50px;
            background: pink;
            color: blue;
        }
    </style>
</head>

<body>
    <h1>COSMETICS</h1>


    <div class="Top">
       <div> <button class="btn" onclick="window.location.href='viewProducts.php'"> HOME </button></div>
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
    <div>


    </div>
    <div class="cosmetics">

        <div>
            <img width="250px" height="250px" src="https://sep.yimg.com/ay/theperfumespot/eva-by-eva-longoria-3-4-oz-eau-de-parfum-spray-for-women-37.png">

            <h3>Eva Perfume</h3>
            <h2> price - $200</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">


        </div>
        <div>
            <img width="250px" height="250px" src="https://www.indianproducts.biz/cimages/lakme-absolute-shine-line-eye-liner-gray1.jpg">

            <h3>Lakme Eyeliner</h3>
            <h2> price - $300</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>
        <div>
            <img width="250px" height="250px" src="https://crazyatbeauty.com/wp-content/uploads/2019/12/Himalaya_Herbals_Lip_Balm_Review.-1-1140x1213.jpg">

            <h3>Himalayas Lip Balm</h3>
            <h2> price - $100</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>
        <div>
            <img width="250px" height="250px" src="https://n2.sdlcdn.com/imgs/i/2/3/Pink-Root-HONEY-ALMOND-COLD-SDL206146399-1-5aa0d.jpg">

            <h3>Vaseline Cold Cream</h3>
            <h2> price - $80</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>
        <div>
            <img width="250px" height="250px" src="https://images.coplusk.net/project_images/62029/image/full_101_1906.jpg">

            <h3>Style Nail Polish</h3>
            <h2> price - $150</h2>
            <h3>ENTER NO.OF ITEMS</h3><input class="in" type="number" value="0" placeholder="0">

        </div>


    </div>
    <div class="timepass">
        <button onclick="window.location.href='billing.php'"> BILL </button>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    let inputdate = document.getElementsByClassName('in');
    console.log(inputdate)
    price = [200, 300, 100, 80, 150];
    cosmetics = ["Eva Perfume", "Lakme Eyeliner", "Himalayas Lip Balm", "Vaseline Cold Cream", "Style Nail Polish"]
    quantiy_array = Array(6).fill(0)
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
                    url: "viewProd1.php",
                    data: {
                        "info": quantiy_array,
                        "price_info": price,
                        "cosmetic": cosmetics
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

$_SESSION['info'] = isset($_POST['info']) ? $_POST['info'] : '';
$_SESSION['price'] = isset($_POST['price_info']) ? $_POST['price_info'] : '';
$_SESSION['cosmetic'] = isset($_POST['cosmetic']) ? $_POST['cosmetic'] : '';
?>

</html>