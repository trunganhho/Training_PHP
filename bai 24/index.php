<html>

<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style>
        #banner {
            background-color: blue;
            height: 30%;
            width: auto;
            position: relative;
        }

        #banner div h2 {
            color: white;
            font-weight: bold;
            margin: auto;
            text-align: center;
        }

        #banner div {
            position: absolute;
            top: 40%;
            width: 100%;
            text-align: center;
            font-size: 18px;

        }

        #body {
            height: 70%;
            display: flex;
        }

        #left-div {
            width: 25%;
            margin-right: 2px;
        }

        #right-div {
            width: 75%;
        }

        #menu {
            height: 30%;
            margin: 0.5px;
        }

        #menu div {
            height: fit-content;
            border: 1px solid black;
        }

        body>div {
            margin: 2px;
        }

        #body>div {
            border: 1px solid black;
        }

        /* Div table css */
        .divTable {
            display: table;
            width: 100%;
            margin-left: 3px;
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
            display: table-cell;
            padding: 3px 2px;
        }

        .divTableCell:first-child {
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

        .title {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $email = $_POST["email"] ?? null;
    $name = $_POST["name"] ?? null;
    $address = $_POST["address"] ?? null;
    $phone = $_POST["phone"] ?? null;
    $gender = $_POST["gender"] ?? null;
    $hobby = array();
    array_push($hobby, (isset($_POST["red"]) ? "Đỏ" : null), (isset($_POST["yellow"]) ? "Vàng" : null), (isset($_POST["green"]) ? "Xanh" : null));

    echo '<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông báo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>“Chúc mừng bạn đăng ký thành công, click <a href="./index.php">vào đây</a>
          để chuyển về trang chủ nếu hệ thống không tự chuyển.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>';
  /*
  sleep(4);
  header("Location: register.php"); */
    ?>
    <div id="banner">
        <div>
            <h2>VUNG BANNER WEBSITE</h2>
        </div>
    </div>
    <div id="body">
        <div id="left-div">
            <div id="menu">
                <div style="background-color: black; text-align:center; color:white; font-weight: bold;">Menu</div>
                <div><a href="index.php">Trang chủ</a></div>
                <div><a href="register.php">Đăng ký</a></div>
                <div style="color: white;">Đăng nhập</div>
            </div>
        </div>
        <div id="right-div">
            <h3 style="color: #004ca0; text-align:center;">THÔNG TIN ĐĂNG KÝ</h3>
            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell">Email:</div>
                        <div class="divTableCell"><?php echo $email ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell title">Thông tin cá nhân</div>
                        <div class="divTableCell">&nbsp;</div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">Họ và tên:</div>
                        <div class="divTableCell"><?php echo $name ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">Địa chỉ:</div>
                        <div class="divTableCell"><?php echo $address ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">Điện thoại</div>
                        <div class="divTableCell"><?php echo $phone ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">Giới tính</div>
                        <div class="divTableCell">
                            <?php echo ($gender == "male" ? "Nam" : "Nữ") ?>
                        </div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">Sở thích</div>
                        <div class="divTableCell">
                            <?php
                            for ($i = 0; $i < count($hobby); $i++) {
                                if ($hobby[$i] != null)
                                    echo $hobby[$i] . ($i != count($hobby) - 1 ? ", " : ".");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var handler;
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
        $('#myModal').on('shown.bs.modal', function (e) {
            handler = setTimeout(function(){
                window.location.href = "./register.php";
            }, 4000);
        })
        $('#myModal').on('hidden.bs.modal', function (e) {
            clearTimeout(handler);
        })
    </script>
</body>

</html>