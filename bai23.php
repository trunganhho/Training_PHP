<html>

<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Courgette">
    <style>
        td {
            padding: 5px 5px 5px 0;
        }

        #buttonHolder {
            text-align: center;
            padding-bottom: 5px;
        }

        form {
            text-align: center;
            width: 380px;
            margin: 0 auto 0;
            background-color: pink;
        }

        h3 {
            padding: 0 9px 0;
            margin: 0;
            background-color: orange;
            font-size: 25px;
            width: auto;
            color: brown;
            font-family: 'Courgette';
        }

        td:first-child {
            color: brown;
        }

        td:nth-child(2) {
            display: inline-block;
            padding-left: 15px;
        }

        input[readonly] {
            background-color: #eda1db;
        }

        table {
            padding: 0 5px 0;
        }
    </style>
    <?php
    $side3 = $_POST["side3"] ?? 0;
    $side2 = $_POST["side2"] ?? 0;
    $side1 = $_POST["side1"] ?? 0;
    $type = "";
    $isRightAngledType = false;
    $isIsoscelesType = false;
    $isEquilateralType = false;
    $isTriangle = false;

    if ($side3 < $side2 + $side1 && $side2 < $side3 + $side1 && $side1 < $side2 + $side3) {
        $isTriangle = true;
        if ($side1 == $side2 && $side1 == $side3 && $side3 == $side2) {
            $isEquilateralType = true;
        }
        if ($side1 == $side2 || $side1 == $side3 || $side3 == $side2) {
            $isIsoscelesType = true;
        }
        if (
            $side1 * $side1 == $side2 * $side2 + $side3 * $side3 || $side2 * $side2 == $side1 * $side1 + $side3 * $side3
            || $side3 * $side3 == $side2 * $side2 + $side1 * $side1
        ) {
            $isRightAngledType = true;
        }
    } else $type = "Không là tam giác";

    if ($isTriangle) {
        $type = "Tam giác thường";
        if ($isRightAngledType) {
            if ($isIsoscelesType) {
                $type = "Tam giác vuông cân";
            } else $type = "Tam giác vuông";
        } 
        else if ($isIsoscelesType) {
            $type = "Tam giác cân";
        } 

        if ($isEquilateralType) {
            $type = "Tam giác đều";
        }
    }
    ?>
</head>

<body>
    <form action="bai23.php" method="post">
        <table>
            <h3>NHẬN DẠNG TAM GIÁC</h3>
            <div id="background">
                <tr>
                    <td>Cạnh 1: </td>
                    <td><input type="number" name="side1" value="<?php echo $side1 ?>" /> (cm)</td>
                </tr>
                <tr>
                    <td>Cạnh 2: </td>
                    <td><input type="number" name="side2" value="<?php echo $side2 ?>" /> (cm)</td>
                </tr>
                <tr>
                    <td>Cạnh 3: </td>
                    <td><input type="number" name="side3" value="<?php echo $side3 ?>" /> (cm)</td>
                </tr>
                <tr>
                    <td>Loại tam giác: </th>
                    <td><input type="text" name="type" readonly value="<?php echo $type ?>" /></th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Nhận dạng" />
        </div>
    </form>
</body>

</html>