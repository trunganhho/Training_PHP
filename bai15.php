<html>

<head>
    <style>
        td {
            padding: 5px 40px 5px 0;
            width: 100px;
        }

        #buttonHolder {
            text-align: center;
            padding-bottom: 5px;
        }

        form {
            text-align: center;
            width: 350px;
            margin: 0 auto 0;
            background-color: pink;
        }

        h3 {
            margin: 0;
            background-color: orange;
            font-size: 32px;
            width: auto;
            color: brown;
        }

        td:first-child {
            color: brown;
        }

        input[type=text]:focus {
            background-color: #eda1db;
        }

        table {
            padding: 0 5px 0;
        }
    </style>
    <?php
    $radius = $_POST["radius"] ?? 0;
    if ($radius >= 0) {
        $circuit = round($radius * 2 * M_PI);
        $area = round($radius * $radius * M_PI);
    } else echo '<script type="text/javascript">alert("Dữ liệu không hợp lệ!");</script>';
    ?>
</head>

<body>
    <form action="bai15.php" method="post">
        <table>
            <h3>Diện tích và chu vi hình tròn</h3>
            <div id="background">
                <tr>
                    <td>Bán kính: </td>
                    <td><input type="text" name="radius" value="<?php echo $radius ?>" /></td>
                </tr>
                <tr>
                    <td>Diện tích: </th>
                    <td><input type="text" name="area" readonly value="<?php echo $area ?>" /></th>
                </tr>
                <tr>
                    <td>Chu vi: </th>
                    <td><input type="text" name="circuit" readonly value="<?php echo $circuit ?>" /></th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Tính" />
        </div>
    </form>
</body>

</html>