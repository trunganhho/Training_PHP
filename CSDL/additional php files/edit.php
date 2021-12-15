<html>

<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Courgette">
    <style>
        td {
            padding: 5px 5px 5px 0;
        }

        #buttonHolder {
            text-align: center;
            padding: 5px 0 5px;
            background-color: #e59f0e;
        }

        form {
            text-align: center;
            width: 35%;
            margin: 0 auto 0;
            background-color: #e6b664;
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
            color: black;
        }

        td:nth-child(2) {
            display: inline-block;
            padding-left: 15px;
        }

        input[readonly] {
            background-color: #eda1db;
        }

        table {
            padding: 0 5px 0;

        }
    </style>
    <?php
    require '../connection.php';

    $conn = connectToDB();

    if (isset($_GET["ma_kh"])) {
        $query = "Select * from khach_hang where ma_kh='" . $_GET["ma_kh"] . "'";
        $stmt = $conn->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        if($row = $stmt->fetch()){
    ?>
</head>

<body>
    <form action="" method="post">
        <table>
            <h3>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h3>
            <tr>
                <td>Mã khách hàng: </td>
                <td><input type="text" name="ma_kh" size="10" readonly value="<?php echo $row["ma_kh"] ?>"/></td>
            </tr>
            <tr>
                <td>Tên khách hàng: </td>
                <td><input type="text" name="ten" size="35" value="<?php echo $row["ten"] ?>"/></td>
            </tr>
            <tr>
                <td>Phái: </td>
                <td>
                    <input type="radio" name="gender" value="male" <?php echo $row["gioi_tinh"] == 1 ? "" : "checked" ?>/>
                    <label>Nam</label>
                    <input type="radio" name="gender" value="female" <?php echo $row["gioi_tinh"] == 1 ? "checked" : "" ?>/>
                    <label>Nữ</label>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </th>
                <td><input type="text" name="address" size="35" value="<?php echo $row["dia_chi"] ?>"/></th>
            </tr>
            <tr>
                <td>Điện thoại: </th>
                <td><input type="text" name="phone" size="20" value="<?php echo $row["dt"] ?>"/></th>
            </tr>
            <tr>
                <td>Email: </th>
                <td><input type="text" name="email" size="35" value="<?php echo $row["email"] ?>"/></th>
            </tr>
        </table>
        <div id="buttonHolder">
            <input type="submit" name="submit" value="cập nhật" />
        </div>
    </form>
<?php
        }
    }

    if(isset($_POST["submit"])){
        $ten = $_POST["ten"];
        $gioi_tinh = $_POST["gender"];
        $dia_chi = $_POST["address"];
        $dt = $_POST["phone"];
        $email = $_POST["email"];

        $query = "update khach_hang set ten = ?, gioi_tinh = ?, dia_chi = ?, dt = ?, email = ? where ma_kh = '" . $_GET["ma_kh"] . "'";
        $stmt = $conn->prepare($query);
        $data = array($ten, $gioi_tinh, $dia_chi, $dt, $email);
        $stmt->execute($data);

        header("Location: ../bai8.php");
    }
?>
</body>

</html>