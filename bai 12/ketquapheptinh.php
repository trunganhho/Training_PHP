<html>

<head>
    <?php
    // Bài 13
    function Validate($num1, $num2, $operator)
    {
        if (is_numeric($num1) && is_numeric($num2)) {
            if ($operator == "Divide" && $num2 == 0) {
                header("Location: http://localhost:8080/Training_PHP/bai%2012/pheptinh.php?validation=false");
            }
        } else header("Location: http://localhost:8080/Training_PHP/bai%2012/pheptinh.php?validation=false");
    }
    ?>
    <style>
        h2 {
            text-align: center;
            color: skyblue;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        #operatorPicker th #mainLabel {
            color: brown;
            font-weight: bold;
        }

        #operatorPicker th label {
            color: red;
        }

        #operatorPicker th:nth-child(2) {
            text-align: left;
        }

        #num1 td label,
        #num2 td label,
        #kq td label {
            color: blue;
            font-weight: bold;
        }

        #num1 td:first-child,
        #num2 td:first-child,
        #kq td:first-child {
            text-align: right;
        }

        #num1 input[type=text],
        #num2 input[type=text],
        #kq input[type=text] {
            border: 1px solid blue;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <?php
    $num1 = $_POST["num1"] ?? null;
    $num2 = $_POST["num2"] ?? null;
    $operator = $_POST["operator"] ?? null;

    Validate($num1, $num2, $operator);

    $operator_name;
    $result;

    switch ($operator) {
        case 'Plus':
            $operator_name = 'Cộng';
            $result = $num1 + $num2;
            break;
        case 'Sub':
            $operator_name = 'Trừ';
            $result = $num1 - $num2;
            break;
        case 'Multi':
            $operator_name = 'Nhân';
            $result = $num1 * $num2;
            break;
        case 'Divide':
            $operator_name = 'Chia';
            $result = $num1 / $num2;
            break;
        default:
            $operator_name = 'Chưa được chọn';
            break;
    }

    ?>
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
    <table>
        <tr id="operatorPicker">
            <th>
                <label id="mainLabel">Chọn phép tính: </label>
            </th>
            <th>
                <?php echo '<label>' . $operator_name . '</label>' ?>
            </th>
        </tr>

        <tr id="num1">
            <td>
                <label>Số 1: </label>
            </td>
            <td>
                <input type="text" name="num1" size="30" value="<?php echo $num1 ?>" />
            </td>
        </tr>

        <tr id="num2">
            <td>
                <label>Số 2: </label>
            </td>
            <td>
                <input type="text" name="num2" size="30" value="<?php echo $num2 ?>" />
            </td>
        </tr>

        <tr id="kq">
            <td>
                <label>Kết quả: </label>
            </td>
            <td>
                <input type="text" name="kq" size="30" value="<?php echo $result ?>" />
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <a href="pheptinh.php" style="font-style: italic;">Quay lại trang trước</a>
            </td>
        </tr>
    </table>
</body>

</html>