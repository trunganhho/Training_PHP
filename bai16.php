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

        td:nth-child(2){
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
    $owner = $_POST["owner"] ?? null;
    $old_num = $_POST["old_num"] ?? 0;
    $new_num = $_POST["new_num"] ?? 0;
    $price = $_POST["price"] ?? 0;
    $total = 0;

    if ($old_num >= 0 && $new_num >= 0 && $price >= 0) {
        if ($new_num >= $old_num) {
            $total = ($new_num - $old_num) * $price;
        } else echo '<script type="text/javascript">alert("Chỉ số mới không được phép bé hơn chỉ số cũ!");</script>';
    } else echo '<script type="text/javascript">alert("Dữ liệu không hợp lệ!");</script>';
    ?>
</head>

<body>
    <form action="bai16.php" method="post">
        <table>
            <h3>THANH TOÁN TIỀN ĐIỆN</h3>
            <div id="background">
                <tr>
                    <td>Tên chủ hộ: </td>
                    <td><input type="text" name="owner" value="<?php echo $owner ?>" /></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ: </td>
                    <td><input type="number" name="old_num" value="<?php echo $old_num ?>" /> (Kw)</td>
                </tr>
                <tr>
                    <td>Chỉ số mới: </td>
                    <td><input type="number" name="new_num" value="<?php echo $new_num ?>" /> (Kw)</td>
                </tr>
                <tr>
                    <td>Đơn giá: </th>
                    <td><input type="number" name="price" value="<?php echo $price ?>" step="any" /> (VNĐ)</th>
                </tr>
                <tr>
                    <td>Số tiền thanh toán: </th>
                    <td><input type="text" name="total" readonly value="<?php echo $total ?>" /> (VNĐ)</th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Tính" />
        </div>
    </form>
</body>

</html>