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
            width: 35%;
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

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    if (isset($_GET["logout"])) {
        echo '<script>alert("Đăng xuất thành công!");</script>';
        unset($_GET["logout"]);
    }
    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;

    if ($email != null && $password != null) {
        if ($password != $_SESSION["password"] || $email != $_SESSION["email"]) {
            echo '<script>alert("Email hoặc mật khẩu không đúng!");</script>';
        } else if ($password == $_SESSION["password"] && $email == $_SESSION["email"]) {
            echo '<script>
                alert("Đăng nhập thành công!");
                window.location.href = "./register.php";
            </script>';
            $_SESSION["isLogin"] = true;
        }
    }

    if (isset($_POST["login"])) {
        if (isset($_POST["remember"])) {
            $_SESSION["remember"] = true;
        } else {
            if (isset($_SESSION["remember"])) {
                $_SESSION["remember"] = false;
            }
        }
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
                <div style="display:<?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "none" : "" ?>;"><a href="index.php">Trang chủ</a></div>
                <div><a href="register.php"><?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "Thông tin cá nhân" : "Đăng ký" ?></a></div>
                <div><a href="<?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "logout.php" : "login.php" ?>"><?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "Đăng xuất" : "Đăng nhập" ?></a></div>
            </div>
        </div>
        <div id="right-div">
            <h3 style="color: blue; text-align:center; font-weight:bold;">THÔNG TIN ĐĂNG NHẬP</h3>
            <form method="post" action="login.php" class="<?php echo isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] ? "hidden" : "" ?>">
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell">Email</div>
                            <div class="divTableCell"><input type="email" name="email" size="30" value="<?php echo $_SESSION["remember"] ? $_SESSION["email"] : "" ?>" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Password</div>
                            <div class="divTableCell"><input type="password" name="password" size="30" value="<?php echo $_SESSION["remember"] ? $_SESSION["password"] : "" ?>" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell"></div>
                            <div class="divTableCell"><input type="checkbox" name="remember" /> Ghi nhớ Thông tin</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell"></div>
                            <div class="divTableCell">
                                <input type="submit" value="Đăng nhập" name="login" />
                                <input type="reset" value="Làm lại" />
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>

</html>