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
    session_start();

    /* 
    Page d??ng cho 2 m???c ????ch, 1 l?? page ????ch c???a trang index khi chuy???n d??? li???u theo ph????ng th???c
    post, 2 l?? khi trang ????ng k?? tr??? th??nh th??ng tin c?? nh??n theo b??i 25. Do y??u c???u b??i 24 v???i
    25 c?? ??i???m chung l?? ?????u hi???n th??? th??ng tin sau khi ????ng k?? th??nh c??ng ho???c ??ang trong phi??n ????ng nh???p, ??i???m
    kh??c bi???t l?? ??? b??i 24 s??? hi???n l??n modal th??ng b??o ng?????i d??ng trong khi b??i 25 th?? kh??ng.  
    */
    $email = isset($_POST["email"]) ? $_POST["email"] : (isset($_SESSION["email"]) ? $_SESSION["email"] : null);
    $name = isset($_POST["name"]) ? $_POST["name"] : (isset($_SESSION["name"]) ? $_SESSION["name"] : null);
    $address = isset($_POST["address"]) ? $_POST["address"] : (isset($_SESSION["address"]) ? $_SESSION["address"] : null);
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : (isset($_SESSION["phone"]) ? $_SESSION["phone"] : null);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : (isset($_SESSION["gender"]) ? $_SESSION["gender"] : null);
    $password = isset($_POST["pass1"]) ? $_POST["pass1"] : (isset($_SESSION["password"]) ? $_SESSION["password"] : null);

    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["address"] = $address;
    $_SESSION["phone"] = $phone;
    $_SESSION["gender"] = $gender;
    $_SESSION["name"] = $name;

    $hobby = array();
    if (isset($_POST["red"]) || isset($_POST["yellow"]) || isset($_POST["green"])) {
        array_push($hobby, (isset($_POST["red"]) ? "?????" : null), (isset($_POST["yellow"]) ? "V??ng" : null), (isset($_POST["green"]) ? "Xanh" : null));
        $_SESSION["hobby"] = $hobby;
    } else $hobby = isset($_SESSION["hobby"]) ? $_SESSION["hobby"] : null;

    if (!isset($_SESSION["isLogin"]) || !$_SESSION["isLogin"]) {
        echo '<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Th??ng b??o</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>???Ch??c m???ng b???n ????ng k?? th??nh c??ng, click <a href="./index.php">v??o ????y</a>
          ????? chuy???n v??? trang ch??? n???u h??? th???ng kh??ng t??? chuy???n.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>';
    }
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
                <div style="display:<?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "hidden" : "" ?>;"><a href="index.php">Trang ch???</a></div>
                <div><a href="register.php"><?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "Th??ng tin c?? nh??n" : "????ng k??" ?></a></div>
                <div><a href="<?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "logout.php" : "login.php" ?>"><?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "????ng xu???t" : "????ng nh???p" ?></a></div>
            </div>
        </div>
        <div id="right-div">
            <h3 style="color: #004ca0; text-align:center;"><?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "TH??NG TIN C?? NH??N" : "TH??NG TIN ????NG K??" ?></h3>
            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell">Email:</div>
                        <div class="divTableCell"><?php echo $email ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell title">Th??ng tin c?? nh??n</div>
                        <div class="divTableCell">&nbsp;</div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">H??? v?? t??n:</div>
                        <div class="divTableCell"><?php echo $name ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">?????a ch???:</div>
                        <div class="divTableCell"><?php echo $address ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">??i???n tho???i</div>
                        <div class="divTableCell"><?php echo $phone ?></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">Gi???i t??nh</div>
                        <div class="divTableCell">
                            <?php echo ($gender == "male" ? "Nam" : "N???") ?>
                        </div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">S??? th??ch</div>
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
        $('#myModal').on('shown.bs.modal', function(e) {
            handler = setTimeout(function() {
                window.location.href = "./index.php";
            }, 4000);
        })
        $('#myModal').on('hidden.bs.modal', function(e) {
            clearTimeout(handler);
        })
    </script>
</body>

</html>