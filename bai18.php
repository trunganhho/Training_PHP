<html>

<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Courgette">
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
            padding: 0 9px 0;
            margin: 0;
            background-color: #e84393;
            font-size: 25px;
            width: auto;
            color: white;
            font-family: 'Courgette';

        }

        td:first-child {
            color: brown;
        }

        input[readonly] {
            background-color: #ffeaa7;
        }

        input[name=pass]{
            color: red;
        }

        table {
            padding: 0 5px 0;
        }
    </style>
    <?php
    $math = $_POST["math"] ?? 0;
    $phys = $_POST["phys"] ?? 0;
    $chem = $_POST["chem"] ?? 0;
    $pass = $_POST["pass"] ?? 0;
    $total = 0;
    $res = "";

    if ($math >= 0 && $phys >= 0 && $chem >= 0) {
        $total = $math + $phys + $chem;
        if($math != 0 && $phys != 0 && $chem != 0 && $total >= $pass){
            $res = "Đậu";
        }
        else $res = "Trượt";
    }
    else echo '<script type="text/javascript">alert("Dữ liệu không hợp lệ!");</script>';
    ?>
</head>

<body>
    <form action="bai18.php" method="post">
        <table>
            <h3>KẾT QUẢ THI ĐẠI HỌC</h3>
            <div id="background">
                <tr>
                    <td>Toán: </td>
                    <td><input type="number" name="math" value="<?php echo $math ?>" step="any"/></td>
                </tr>
                <tr>
                    <td>Lý: </td>
                    <td><input type="number" name="phys" value="<?php echo $phys ?>" step="any"/></td>
                </tr>
                <tr>
                    <td>Hóa: </td>
                    <td><input type="number" name="chem" value="<?php echo $chem ?>" step="any"/></td>
                </tr>
                <tr>
                    <td>Điểm chuẩn: </th>
                    <td><input type="number" name="pass" value="<?php echo $pass ?>" step="any"/></th>
                </tr>
                <tr>
                    <td>Tổng điểm: </th>
                    <td><input type="text" name="total" readonly value="<?php echo $total ?>" /></th>
                </tr>
                <tr>
                    <td>Kết quả thi: </th>
                    <td><input type="text" name="res" readonly value="<?php echo $res ?>" /></th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Xem kết quả" />
        </div>
    </form>
</body>

</html>