<html>

<head></head>

<body>
    <table border="1">
        <tr>
            <th>Cơ số</th>
            <th>Bảng cửu chương</th>
        </tr>
        <?php
        for ($i = 2; $i <= 10; $i++) {
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $i ?></td>
            <td>
            <?php 
                for($j = 1; $j <= 10; $j++){
                    echo "$i * $j = " . ($i * $j) . "</br>";
                }
            ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>