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
    $a = $_POST["a"] ?? null;
    $b = $_POST["b"] ?? null;
    $other = null;
    if ($a >= 0 && $b >= 0) {
        $other = number_format(sqrt($a*$a + $b*$b),2,',','');
    } else echo '<script type="text/javascript">alert("Dữ liệu không hợp lệ!");</script>';
    ?>
</head>

<body>
    <form action="bai19.php" method="post">
        <table>
            <h3>CẠNH HUYỀN TAM GIÁC VUÔNG</h3>
            <div id="background">
                <tr>
                    <td>Cạnh a: </td>
                    <td><input type="number" name="a" value="<?php echo $a ?>" step="any"/></td>
                </tr>
                <tr>
                    <td>Cạnh b: </th>
                    <td><input type="number" name="b" value="<?php echo $b ?>" step="any"/></td>
                </tr>
                <tr>
                    <td>Cạnh huyền: </th>
                    <td><input type="text" name="other" readonly value="<?php echo $other ?>" /></td>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Tính" />
        </div>
    </form>
</body>

</html>