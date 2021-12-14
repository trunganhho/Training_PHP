<html>

<head>
    <style>
        #main {
            width: 60%;
            margin: 0 auto;
            background-color: #e9e8ed;
            height: 50%;
            border: 5px ridge brown;

        }

        #footer {
            max-height: 14%;
            width: 29%;
            text-align: end;
            border: 1px solid black;
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

        #descr p span {
            float: right;
        }

        #body {
            display: flex;
            max-width: 100%;
            height: 75%;
        }

        #body>* {
            border: 1px solid black;
        }

        #main>* {
            margin: 5px;
        }
    </style>
    <?php
    require_once "connection.php";

    $conn = connectToDB();
    if (isset($_GET["so_tt"])) {
        $query = "SELECT * FROM sua where so_tt = " . $_GET["so_tt"];
        $stmt = $conn->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
    ?>
</head>

<body>
    <div id="main">
        <h2><?php echo $row["ten"] ?></h2>
        <div id="body">
            <div id="pic">
                <img src="<?php echo $row["anh"] ?>" style="height: 100%; width: 100%;" />
            </div>
            <div id="descr">
                <p>
                    <b style="font-style: italic;">Thành phần dinh dưỡng:</b><br />
                    <?php echo $row["ingredients"] ?><br />
                    <b style="font-style: italic;">Lợi ích:</b><br />
                    <?php echo $row["descr"] ?><br /><br/>
                <span><b><i>Trọng lượng: </i></b> <?php echo $row["trong_luong"] ?> gr - 
                <b><i>Đơn giá: </i></b> <?php echo number_format($row["gia"],0,"","."); ?> VNĐ</span>
                </p>
            </div>
        </div>
        <div id="footer"><a href="./bai5.php">Quay về</a></div>
    </div>
<?php
        }
    }
?>
</body>

</html>