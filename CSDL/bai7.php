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
            padding: 5px 9px;
            margin: 0;
            background-color: red;
            font-size: 25px;
            width: auto;
            color: white;
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

        #main {
            width: 60%;
            margin: 10px auto 0;
            background-color: #e9e8ed;
            height: 50%;
            border: 5px ridge brown;

        }

        h2 {
            color: #dc070e;
            text-align: center;
            margin: 0;
            background-color: #e4c6b7;
            border: 1px solid black;
        }

        #pic {
            width: 30%;
            max-height: 100%;
            margin-right: 5px;
        }

        #descr {
            width: 70%;
            max-height: 100%;
            padding: 2px;
        }

        #descr p {
            margin: 0;
            overflow: scroll;
            max-height: 100%;
        }

        #body {
            display: flex;
            max-width: 100%;
            height: 86%;
        }

        #body>* {
            border: 1px solid black;
        }

        #main>* {
            margin: 5px;
        }

        .red-text {
            color: red;
        }
    </style>
    <?php
    require_once "connection.php";
    require_once "additional php files/function.php";

    $conn = connectToDB();
    ?>
</head>

<body>
    <form action="bai7.php" method="post" enctype="multipart/form-data">
        <table>
            <h3>TH??M S???A M???I</h3>
            <div id="background">
                <tr>
                    <td>M?? s???a: </td>
                    <td><input type="text" name="ma_sua" /></td>
                </tr>
                <tr>
                    <td>T??n s???a: </th>
                    <td><input type="text" name="ten" size="40" /></td>
                </tr>
                <tr>
                    <td>H??ng s???a: </th>
                    <td>
                        <select name="hang_sua">
                            <?php
                            $query = "select * from hang_sua";
                            $stmt = $conn->prepare($query);
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach ($result as $row) {
                            ?>
                                <option value="<?php echo $row["ma_hs"] ?>"><?php echo $row["ten"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Lo???i s???a: </th>
                    <td><select name="loai_sua">
                            <?php
                            $query = "select * from loai_sua";
                            $stmt = $conn->prepare($query);
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach ($result as $row) {
                            ?>
                                <option value="<?php echo $row["id"] ?>"><?php echo $row["loai_sua"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tr???ng l?????ng: </th>
                    <td><input type="text" name="weight" /> (gr ho???c ml)</td>
                </tr>
                <tr>
                    <td>????n gi??: </th>
                    <td><input type="text" name="price" /> (VN??)</td>
                </tr>
                <tr>
                    <td>Th??nh ph???n dinh d?????ng: </td>
                    <td>
                        <textarea name="ingredients" rows="2" cols="50">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>L???i ??ch: </th>
                    <td>
                        <textarea name="descr" rows="2" cols="50">
                    </textarea>
                    </td>
                </tr>
                <tr>
                    <td>H??nh ???nh: </th>
                    <td><input type="file" name="pic" /></td>
                </tr>
            </div>
        </table>
        <div id="buttonHolder">
            <input type="submit" name="submit" value="Th??m m???i" />
        </div>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $ma_sua = $_POST["ma_sua"] ?? null;
        $ten = $_POST["ten"] ?? null;
        $hang_sua = $_POST["hang_sua"] ?? null;
        $loai_sua = $_POST["loai_sua"] ?? null;
        $trong_luong = $_POST["weight"] ?? null;
        $gia = $_POST["price"] ?? null;
        $tp = $_POST["ingredients"] ?? null;
        $loi_ich = $_POST["descr"] ?? null;


        $target_dir = "./uploads/";
        $file_name;
        if (isset($_FILES["pic"])) {
            $file_name = $target_dir . basename($_FILES["pic"]["name"]);
            $file_name = checkIfExist($file_name);
        } else $file_name = "";

        if ($file_name != "") {
            move_uploaded_file($_FILES["pic"]["tmp_name"], $file_name);
        }

        $query = 'INSERT INTO sua (ma_sua, ten, hang_id, loai_id, trong_luong, gia, anh, ingredients, descr) values(?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $arr = array($ma_sua, $ten, $hang_sua, $loai_sua, $trong_luong, $gia, $file_name, $tp, $loi_ich);
        $stmt = $conn->prepare($query);
        if ($stmt->execute($arr)) {
            echo '<script>alert("Th??m m???i th??nh c??ng");</script>';

            $query = "Select * from sua where ma_sua = '$ma_sua'";
            $stmt = $conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            if ($row = $stmt->fetch()) {
                echo '<div id="main">
                <h2>' . $row["ten"] . '</h2>
                <div id="body">
                    <div id="pic">
                        <img src="' . $row["anh"] . '" style="height: 100%; width: 100%;" />
                    </div>
                    <div id="descr">
                        <p>
                            <b style="font-style: italic;">Th??nh ph???n dinh d?????ng:</b><br />
                            ' . $row["ingredients"] . '
                        <br/>
                            <b style="font-style: italic;">L???i ??ch:</b><br />
                            ' . $row["descr"] . '
                            <br />
                        <span><b><i>Tr???ng l?????ng: </i></b><span class="red-text">' . $row["trong_luong"] . ' gr</span> - 
                        <b><i>????n gi??: </i></b><span class="red-text">' . $row["gia"] . ' VN??</span></span>
                        </p>
                    </div>
                </div>
            </div>';
            }
        } else echo '<script>alert("Th??m m???i th???t b???i");</script>';
    }
    ?>
</body>

</html>