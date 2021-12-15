<html>

<head>
    <style>
        div:first-child {
            width: fit-content;
            margin: 0 auto;
            padding: 0 5px 10px;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            color: black;
            margin: 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            color: black;
        }

        td {
            padding: 0 20px 0 5px;
        }

        table {
            margin: 0 auto;
        }

        .odd {
            background-color: #ffaa4f;
        }

        td img {
            width: 30px;
            height: 30px;
        }

        th img {
            width: 30px;
            height: 30px;
        }

        #background {
            width: fit-content;
            max-width: 80%;
        }
    </style>
</head>

<body>
    <div id="background">
        <h1>Thông tin khách hàng</h1>
        <table>
            <tr>
                <th>Mã KH</th>
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th><img src="assets/edit.png" /></th>
                <th><img src="assets/delete.png" /></th>
            </tr>
            <?php
            require 'connection.php';

            $conn = connectToDB();
            $query = "Select * from khach_hang";
            $stmt = $conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $i = 0;

            while ($row = $stmt->fetch()) {
            ?>
                <tr>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>"><?php echo $row["ma_kh"] ?></td>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>"><?php echo $row["ten"] ?></td>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>" style="text-align:center; padding: 5px 0;">
                        <?php echo $row["gioi_tinh"] == 1 ? "Nữ" : "Nam" ?>
                    </td>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>"><?php echo $row["dia_chi"] ?></td>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>"><?php echo $row["dt"] ?></td>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>"><?php echo $row["email"] ?></td>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>">
                        <a href="./additional php files/edit.php?ma_kh=<?php echo $row["ma_kh"] ?>">Sửa</a>
                    </td>
                    <td class="<?php echo $i % 2 == 0 ? "odd" : "" ?>">
                        <a href="./additional php files/delete.php?ma_kh=<?php echo $row["ma_kh"] ?>">Xóa</a>
                    </td>
                </tr>

            <?php
                $i++;
            }
            ?>
        </table>
    </div>
</body>

</html>