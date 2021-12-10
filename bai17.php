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
    $sem1 = $_POST["sem1"] ?? 0;
    $sem2 = $_POST["sem2"] ?? 0;
    $avg = 0;
    $res;
    $rate;


    if ($sem1 >= 0 && $sem2 >= 0) {
        $avg = ($sem1 + $sem2 * 2) / 3;
        if($avg >= 5){
            $res = "Được lên lớp";
        } else $res = "Ở lại lớp";

        if($avg >= 8){
            $rate = "Giỏi";
        }
        else if($avg >= 6.5 && $avg < 8){
            $rate = "Khá";
        }
        else if($avg >= 5 && $avg < 6.5){
            $rate = "Trung bình";
        }
        else $rate = "Yếu";
    } else echo '<script type="text/javascript">alert("Dữ liệu không hợp lệ!");</script>';
    ?>
</head>

<body>
    <form action="bai17.php" method="post">
        <table>
            <h3>Kết quả học tập</h3>
            <div id="background">
                <tr>
                    <td>Điểm HK1: </td>
                    <td><input type="text" name="sem1" value="<?php echo $sem1 ?>" /></td>
                </tr>
                <tr>
                    <td>Điểm HK2: </td>
                    <td><input type="text" name="sem2" value="<?php echo $sem2 ?>" /></td>
                </tr>
                <tr>
                    <td>Điểm trung bình: </td>
                    <td><input type="text" name="avg" readonly value="<?php echo $avg ?>" /></td>
                </tr>
                <tr>
                    <td>Kết quả: </th>
                    <td><input type="text" name="res" readonly value="<?php echo $res ?>" /></th>
                </tr>
                <tr>
                    <td>Xếp loại học lực: </th>
                    <td><input type="text" name="rate" readonly value="<?php echo $rate ?>" /></th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Xem kết quả" />
        </div>
    </form>
</body>

</html>