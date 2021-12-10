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
    $A = $_POST["A"] ?? 0;
    $B = $_POST["B"] ?? 0;
    $bigest = $A > $B ? $A : $B;
    ?>
</head>

<body>
    <form action="bai20.php" method="post">
        <table>
            <h3>TÌM SỐ LỚN HƠN</h3>
            <div id="background">
                <tr>
                    <td>Số A: </td>
                    <td><input type="number" name="A" value="<?php echo $A ?>" step="any"/></td>
                </tr>
                <tr>
                    <td>Số B: </th>
                    <td><input type="number" name="B" value="<?php echo $B ?>" step="any"/></th>
                </tr>
                <tr>
                    <td>Số lớn hơn: </th>
                    <td><input type="text" name="bigest" readonly value="<?php echo $bigest ?>" /></th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Tìm" />
        </div>
    </form>
</body>

</html>