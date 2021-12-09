<html>

<head>
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

        body div {
            text-align: center;
        }

        #num1 td label, #num2 td label {
            color: blue;
            font-weight: bold;
        }

        #num1 td:first-child, #num2 td:first-child {
            text-align: right;
        }

        #num1 input[type=text],
        #num2 input[type=text] {
            border: 1px solid blue;
            border-radius: 3px;
        }
    </style>
    <?php
        if(isset($_GET['validation'])){
            echo '<script type="text/javascript">alert("Dữ liệu không hợp lệ!");</script>';
        }
        unset($_GET['validation']);
    ?>
</head>

<body>
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
    <form action="ketquapheptinh.php" method="post">
        <table>
            <tr id="operatorPicker">
                <th>
                    <label id="mainLabel">Chọn phép tính: </label>
                </th>
                <th>
                    <input type="radio" name="operator" value="Plus" />
                    <label>Cộng</label>
                    <input type="radio" name="operator" value="Sub" />
                    <label>Trừ</label>
                    <input type="radio" name="operator" value="Multi" />
                    <label>Nhân</label>
                    <input type="radio" name="operator" value="Divide" />
                    <label>Chia</label>
                </th>
            </tr>

            <tr id="num1">
                <td>
                    <label>Số thứ nhất: </label>
                </td>
                <td>
                    <input type="text" name="num1" size="30" />
                </td>
            </tr>

            <tr id="num2">
                <td>
                    <label>Số thứ nhì: </label>
                </td>
                <td>
                    <input type="text" name="num2" size="30" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tính" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>