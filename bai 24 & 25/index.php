<html>

<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <?php
    session_start();
    ?>
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
    </style>
</head>

<body>
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
            <h3 style="color: #004ca0; text-align:center;">TH??NG TIN ????NG K??</h3>
            <form method="post" action="register.php">
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell title">Th??ng tin t??i kho???n</div>
                            <div class="divTableCell"></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Email</div>
                            <div class="divTableCell"><input type="email" name="email" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Password</div>
                            <div class="divTableCell"><input type="password" id="pass1" name="pass1" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Nh???p l???i pasword</div>
                            <div class="divTableCell"><input type="password" id="pass2" name="pass2" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell title">Th??ng tin c?? nh??n</div>
                            <div class="divTableCell">&nbsp;</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">H??? v?? t??n</div>
                            <div class="divTableCell"><input type="text" name="name" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">?????a ch???</div>
                            <div class="divTableCell"><input type="text" name="address" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">??i???n tho???i</div>
                            <div class="divTableCell"><input type="text" name="phone" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Gi???i t??nh</div>
                            <div class="divTableCell">
                                <label>Nam</label>
                                <input type="radio" name="gender" value="male" />
                                <label>N???</label>
                                <input type="radio" name="gender" value="female" />
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">S??? th??ch</div>
                            <div class="divTableCell">
                                <label>Xanh</label>
                                <input type="checkbox" name="green" value="green" />
                                <label>?????</label>
                                <input type="checkbox" name="red" value="red" />
                                <label>V??ng</label>
                                <input type="checkbox" name="yellow" value="yellow" />
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell"></div>
                            <div class="divTableCell">
                                <input type="submit" value="????ng k??" onclick="checkPass()" />
                                <input type="reset" value="L??m l???i" />
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script type="text/javascript">
        function checkPass() {
            var pass1 = document.getElementById("pass1").value;
            var pass2 = document.getElementById("pass2").value;
            if (pass1 !== pass2) {
                event.preventDefault();
                alert("M???t kh???u ph???i kh???p v???i ph???n nh???p l???i!");
            }

        }
    </script>
</body>

</html>