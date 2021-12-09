<html>

<head>
    <style>
        table tr th{
            padding-right: 50px;
        }

        table tr td{
            padding-right: 50px;
        }
    </style>
</head>

<body>
    <h2>Bảng bình phương</h2>
    <table border="2">
        <tr>
            <th>i</th>
            <th>i^2</th>
        </tr>
        <?php
        $i = 0;
        while ($i <= 10) {
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $i * $i ?></td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
</body>

</html>