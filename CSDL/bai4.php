<html>

<head>
    <style>
        div:first-child {
            width: fit-content;
            margin: 0 auto;
            padding: 0 5px 10px;
            border: 1px solid black;
            background-color: #e6e6e6;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            color: #7a3303;
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


        th, .odd {
            background-color: #ffaa4f;
        }

        td img {
            width: 30px;
            height: 40px;
        }

        table {
            border-collapse: collapse;
        }

        .inline {
            display: inline-block;
            float: right;
            margin: 20px 0px;
        }

        input,
        button {
            height: 34px;
        }

        .pagination {
            display: inline-block;
        }

        .pagination a {
            font-weight: bold;
            font-size: 18px;
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid black;
        }

        .pagination a.active {
            background-color: pink;
        }

        .pagination a:hover:not(.active) {
            background-color: skyblue;
        }
    </style>
</head>

<body>
    <?php

    // Import the file where we defined the connection to Database.     
    require_once "connection.php";

    $conn = connectToDB();
    $per_page_record = 5;  // Number of entries to show in a page.   
    // Look for a GET variable page if not found default is 1.        
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page_record;

    $query = "SELECT sua.*, hang_sua.ten as hang_sua, loai_sua.loai_sua as loai FROM sua inner join hang_sua on sua.hang_id = hang_sua.ma_hs inner join loai_sua on loai_sua.id = sua.loai_id
     LIMIT $start_from, $per_page_record";
    $stmt = $conn->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    ?>
    <div>
        <h1>Thông tin sữa</h1>
        <table class="table table-striped table-condensed    
                                          table-bordered">
            <thead>
                <tr>
                    <th width="10%">Số TT</th>
                    <th>Tên sữa</th>
                    <th>Hãng sữa</th>
                    <th>Loại sữa</th>
                    <th>Trọng lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                while ($row = $stmt->fetch()) {
                    $so_tt = $row["so_tt"];
                    // Display each field of the records.    
                ?>
                    <tr>
                        <td class="<?php echo $i % 2 == 1 ? "odd" : "" ?>"><?php echo $so_tt; ?></td>
                        <td class="<?php echo $i % 2 == 1 ? "odd" : "" ?>"><?php echo $row["ten"]; ?></td>
                        <td class="<?php echo $i % 2 == 1 ? "odd" : "" ?>"><?php echo $row["hang_sua"]; ?></td>
                        <td class="<?php echo $i % 2 == 1 ? "odd" : "" ?>"><?php echo $row["loai"]; ?></td>
                        <td class="<?php echo $i % 2 == 1 ? "odd" : "" ?>"><?php echo $row["trong_luong"]; ?> gram</td>
                        <td class="<?php echo $i % 2 == 1 ? "odd" : "" ?>"><?php echo number_format($row["gia"],0,"","."); ?> VNĐ</td>
                    </tr>
                <?php
                $i++;
                };
                ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php
            $query = "SELECT COUNT(*) as so_record FROM sua";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $total_records = $stmt->fetchColumn();

            echo "</br>";
            // Number of pages required.   
            $total_pages = ceil($total_records / $per_page_record);
            $pagLink = "";

            if ($page >= 2) {
                echo "<a href='bai4.php?page=" . ($page - 1) . "'>  Prev </a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<a class = 'active' href='bai4.php?page="
                        . $i . "'>" . $i . " </a>";
                } else {
                    $pagLink .= "<a href='bai4.php?page=" . $i . "'>   
                                                " . $i . " </a>";
                }
            };
            echo $pagLink;

            if ($page < $total_pages) {
                echo "<a href='bai4.php?page=" . ($page + 1) . "'>  Next </a>";
            }

            ?>
        </div>


        <div class="inline">
            <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
            <button onClick="go2Page();">Go</button>
        </div>
    </div>
    </div>

    <script>
        function go2Page() {
            var page = document.getElementById("page").value;
            page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
            window.location.href = 'bai4.php?page=' + page;
        }
    </script>
    </div>
</body>

</html>