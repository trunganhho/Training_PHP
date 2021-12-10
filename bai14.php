<html>

<head>
    <style>
        th,
        td {
            padding: 5px 50px 5px 0;
        }

        #buttonHolder {
            text-align: center;
            padding-bottom: 5px;
        }

        form {
            text-align: center;
            width: fit-content;
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
    $length = $_POST["length"] ?? 0;
    $width = $_POST["width"] ?? 0;
    if ($length >= 0 && $width >= 0) {
        $area = $length * $width;
    } else echo '<script type="text/javascript">alert("Dữ liệu không hợp lệ!");</script>';
    ?>
</head>

<body>
    <form action="bai14.php" method="post">
        <table>
            <h3>Diện tích hình chữ nhật</h3>
            <div id="background">
                <tr>
                    <td>Chiều dài: </td>
                    <td><input type="text" name="length" value="<?php echo $length ?>" /></td>
                </tr>
                <tr>
                    <td>Chiều rộng: </th>
                    <td><input type="text" name="width" value="<?php echo $width ?>" /></th>
                </tr>
                <tr>
                    <td>Diện tích: </th>
                    <td><input type="text" name="area" readonly value="<?php echo $area ?>" /></th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Tính" />
        </div>
    </form>
</body>

</html>