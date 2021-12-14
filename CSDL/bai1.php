<html>

<head>
    <style>
        div {
            width: fit-content;
            margin: 0 auto;
            padding: 0 5px 10px;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            color: #093474;
            margin: 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            color: #54597f;
        }

        td {
            padding: 0 20px 0 0;
        }

        table {
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div>
        <h1>Thông tin hãng sữa</h1>
        <table>
            <tr>
                <th>Mã sữa</th>
                <th>Tên hãng sữa</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            <?php
            require 'connection.php';

            $conn = connectToDB();
            $query = "Select * from hang_sua";
            $stmt = $conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
            ?>
            <tr>
                <td><?php echo $row["ma_hs"] ?></td>
                <td><?php echo $row["ten"] ?></td>
                <td><?php echo $row["dia_chi"] ?></td>
                <td><?php echo $row["dt"] ?></td>
                <td><?php echo $row["email"] ?></td>
            </tr>

            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>