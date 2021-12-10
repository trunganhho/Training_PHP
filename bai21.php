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

        td:nth-child(2){
            display: inline-block;
            padding-left: 15px;
        }

        input {
            color: red;
        }

        input[type=number] {
            width: 50px;
        }

        input[type=submit]{
            width: fit-content;
            color: black;
        }

        input[readonly] {
            background-color: #ffeaa7;
        }

        table {
            padding: 0 5px 0;
        }
    </style>
    <?php
    $a = $_POST["a"] ?? 0;
    $b = $_POST["b"] ?? 0;
    $solution = "x = ";
    if($a != 0){
    $solution .= -$b / $a;
    }
    else if($b != 0){
        $solution = "Phương trình vô nghiệm";
    } 
    else $solution = "Phương trình vô số nghiệm";
    ?>
</head>

<body>
    <form action="bai21.php" method="post">
        <table>
            <h3>GIẢI PHƯƠNG TRÌNH BẬC NHẤT</h3>
            <div id="background">
                <tr>
                    <td>Phương trình: </td>
                    <td><input type="number" name="a" value="<?php echo $a ?>" step="any"/> <b>x +</b> 
                    <input type="number" name="b" value="<?php echo $b ?>" step="any" /> <b>= 0</b></td>
                </tr>
                <tr>
                    <td>Nghiệm: </th>
                    <td><input type="text" name="solution" readonly value="<?php echo $solution ?>" size="30"/></th>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" value="Giải phương trình" />
        </div>
    </form>
</body>

</html>