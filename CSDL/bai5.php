<html>

<head>
    <style>
        h2 {
            text-align: center;
            background-color: #eac5af;
            color: #d6080c;
            margin: 0;
        }

        #background {
            width: 70%;
            margin: 0 auto;
            border: 1px solid black;
        }

        .divTable {
            display: table;
            width: 100%;
        }

        .divTableRow {
            display: table-row;
        }

        .divTableHeading {
            background-color: #EEE;
            display: table-header-group;
        }

        .divTableCell,
        .divTableHead {
            border: 1px solid #999999;
            display: table-cell;
            padding: 3px 10px;
        }

        .divTableCell {
            text-align: center;
            width: 20%;
        }

        .divTableHeading {
            background-color: #EEE;
            display: table-header-group;
            font-weight: bold;
        }

        .divTableFoot {
            background-color: #EEE;
            display: table-footer-group;
            font-weight: bold;
        }

        .divTableBody {
            display: table-row-group;
        }

        #background {
            background-color: #ececec;
        }
    </style>
    <?php
    // Import the file where we defined the connection to Database.     
    require_once "connection.php";

    $conn = connectToDB();

    $query = "SELECT COUNT(*) as so_record FROM sua";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();

    $query = "SELECT * FROM sua";
    $stmt = $conn->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
</head>

<body>
    <div id="background">
        <h2>Thông tin các sản phẩm</h2>
        <div class="divTable">
            <div class="divTableBody">
                <?php
                for($i = 0; $i < ceil($total_records / 5); $i++){
                ?>
                <div class="divTableRow">
                    <?php 
                    for($j = $i * 5; $j < ($i + 1) * 5; $j++){
                        if($j >= count($result)){
                            break;
                        } 
                    ?>
                        <div class="divTableCell">
                            <p><a href="./bai6.php?so_tt=<?php echo $result[$j]["so_tt"] ?>"><?php echo $result[$j]["ten"] ?></a></p>
                            <p><?php echo $result[$j]["trong_luong"] . ' gr' . ' - ' . number_format($result[$j]["gia"],0,"",".") . ' VNĐ'  ?></p>
                            <img src="<?php echo $result[$j]["anh"] ?>" width="150" height="150" />
                        </div>

                    <?php
                    }?>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>