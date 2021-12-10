<html>

<head>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Courgette">

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

        input[readonly] {
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
            <h3>DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
            <div id="background">
                <tr>
                    <td>Chiều dài: </td>
                    <td><input type="number" name="length" value="<?php echo $length ?>" step="any"/></td>
                </tr>
                <tr>
                    <td>Chiều rộng: </th>
                    <td><input type="number" name="width" value="<?php echo $width ?>" step="any"/></th>
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