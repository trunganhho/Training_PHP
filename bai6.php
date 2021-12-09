<html>

<head>
    <style>
        th {
            padding: 0px 50px 0px;
        }

        td {
            padding-right: 50px;
        }

        table, td, th {
            border: 1px solid black;
        }

        .class1 {

        }
    </style>

</head>

<body>
    <table style="border-collapse:collapse;">
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Nội dung sách</th>
        </tr>
        <?php
        for ($i = 1; $i <= 100; $i++) {
        ?>
            <tr>
                <td style="text-align:center;padding-left:50px;"><?php echo $i ?></td>
                <td class="class1"><?php echo "Tensach$i" ?></td>
                <td class="class1"><?php echo "Noidung$i" ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>