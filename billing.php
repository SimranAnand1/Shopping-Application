<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Receipt</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        text-transform: uppercase;
    }

    .blue {
        border: 2px solid #1ABC9C;
    }

    .blue thead {
        background: #1ABC9C;
    }

    .blue thead:hover {
        border: 2px solid #9B59B6;
        background: blue;
    }


    thead {
        color: black;

    }

    th,
    td {
        text-align: center;
        padding: 5px 0;
    }

    th {
        height: 50px;
    }

    tbody tr:nth-child(even) {
        background: #ECF0F1;
    }

    tbody tr:hover {
        background: #BDC3C7;
        color: red;
    }

    table {
        margin-bottom: 50px;
    }

    .timepass {
        display: flex;
        justify-content: center;
    }

    .timepass button {
        width: 400px;
        font-size: 32px;
        height: 50px;
        background: #9B59B6;
        color: yellow;
    }
</style>



<?php session_start();
?>
<?php
if (empty($_SESSION)) {
    header('location:Login.php');
}
?>

<body>
    <div>


        <table class="blue">
            <thead>
                <tr>
                    <th> PRODUCT NAME </th>
                    <th>PRICE </th>
                    <td>QUANTITY</td>
                    <td> SUM</td>
                </tr>
            </thead>
            <tbody id="TB">

                <?php
                $totalprice = 0;

                if (!empty($_SESSION['info']) && !empty($_SESSION['price']) && !empty($_SESSION['cosmetic'])) {
                    $array = $_SESSION['info'];
                    $array2 = $_SESSION['price'];
                    $cosmetics = $_SESSION['cosmetic'];
                    for ($x = 0; $x < count($array); $x++) {
                        if ($array[$x] != 0) {
                            $c_sum = ($array2[$x] * $array[$x]);
                            echo "<tr> <td>$cosmetic[$x] </td> <td>$array2[$x]</td> <td>$array[$x]</td> <td>  $c_sum </td> </tr>";
                        }
                        $totalprice = $totalprice + ($array2[$x] * $array[$x]);
                    }
                }
            

                if (!empty($_SESSION['info_jewel']) && !empty($_SESSION['price']) && !empty($_SESSION['jewel'])) {
                    $jewell = $_SESSION['info_jewel'];
                    $jewell2 = $_SESSION['price'];
                    $jewels = $_SESSION['jewel'];
                    for ($x = 0; $x < count($jewell); $x++) {
                        if ($jewell[$x] != 0) {
                            $j_sum = ($jewell2[$x] * $jewell[$x]);
                            echo "<tr> <td>$jewel[$x] </td> <td>$jewell2[$x]</td> <td>$jewell[$x]</td> <td> $j_sum</td> </tr>";
                        }
                        $totalprice = $totalprice + ($jewell[$x] * $jewell2[$x]);
                    }
                }
                ?>

            </tbody>
        </table>

        <div style="text-align: center;">
            <h1><?php echo "TOTAL PRICE $totalprice"; ?></h1>
        </div>
        <div class="timepass">
            <button onclick="window.print();return false;"> PRINT BILL RECEIPT </button>
        </div>

    </div>
</body>
</body>

</html>