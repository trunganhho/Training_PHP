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
            background-color: #1abc9c;
        }

        h3 {
            padding: 0 9px 0;
            margin: 0;
            background-color: #16a085;
            font-size: 25px;
            width: auto;
            color: white;
            font-family: 'Courgette';
        }

        td:first-child {
            color: black;
        }

        td:nth-child(2){
            display: inline-block;
            padding-left: 15px;
        }

        input[readonly] {
            background-color: #94ffb0;
        }

        table {
            padding: 0 5px 0;
        }
    </style>
    <?php
    $start = $_POST["start"] ?? null;
    $end = $_POST["end"] ?? null;
    $total = 0;
    $first_entry = is_null($start) && is_null($end) ? true : false;

    if($start >= 10 && $end <= 24){
        if($start < $end){
            // Đã xét đk giờ kết thúc lớn hơn giờ bắt đầu
            $total = ($end <= 17 ? ($end - 10) * 20000 : ($end - 17) * 45000 + 7 * 20000) - 
            ($start <= 17 ? ($start - 10) * 20000 : ($start - 17) * 45000 + 7 * 20000);
        }
        else echo '<script type="text/javascript">alert("Giờ kết thúc phải lớn hơn giờ bắt đầu!");</script>';
    } else if(!$first_entry) echo '<script type="text/javascript">alert("Đang trong giờ nghỉ (Trước 10h và sau 24h)!");</script>';
    ?>
</head>

<body>
    <form action="bai22.php" method="post">
        <table>
            <h3>TÍNH TIỀN KARAOKE</h3>
            <div id="background">
                <tr>
                    <td>Giờ bắt đầu: </td>
                    <td><input type="number" name="start" value="<?php echo $start ?>" min="0" max="24"/> (h)</td>
                </tr>
                <tr>
                    <td>Giờ kết thúc: </th>
                    <td><input type="number" name="end" value="<?php echo $end ?>" min="0" max="24"/> (h)</th>
                </tr>
                <tr>
                    <td>Tiền thanh toán: </th>
                    <td><input type="text" name="total" readonly value="<?php echo $total ?>" /> (VNĐ)</th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Tính tiền" />
        </div>
    </form>
</body>

</html>