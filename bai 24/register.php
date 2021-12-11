<html>

<head>
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
                <div><a href="index.php">Trang chủ</a></div>
                <div><a href="register.php">Đăng ký</a></div>
                <div style="color: white;">Đăng nhập</div>
            </div>
        </div>
        <div id="right-div">
            <h3 style="color: #004ca0; text-align:center;">THÔNG TIN ĐĂNG KÝ</h3>
            <form method="post" action="index.php">
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell title">Thông tin tài khoản</div>
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
                            <div class="divTableCell">Nhập lại pasword</div>
                            <div class="divTableCell"><input type="password" id="pass2" name="pass2" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell title">Thông tin cá nhân</div>
                            <div class="divTableCell">&nbsp;</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Họ và tên</div>
                            <div class="divTableCell"><input type="text" name="name" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Địa chỉ</div>
                            <div class="divTableCell"><input type="text" name="address" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Điện thoại</div>
                            <div class="divTableCell"><input type="text" name="phone" size="30" /></div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Giới tính</div>
                            <div class="divTableCell">
                                <label>Nam</label>
                                <input type="radio" name="gender" value="male" />
                                <label>Nữ</label>
                                <input type="radio" name="gender" value="female" />
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">Sở thích</div>
                            <div class="divTableCell">
                                <label>Xanh</label>
                                <input type="checkbox" name="green" value="green" />
                                <label>Đỏ</label>
                                <input type="checkbox" name="red" value="red" />
                                <label>Vàng</label>
                                <input type="checkbox" name="yellow" value="yellow" />
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell"></div>
                            <div class="divTableCell">
                                <input type="submit" value="Đăng ký" onclick="checkPass()" />
                                <input type="reset" value="Làm lại" />
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
                alert("Mật khẩu phải khớp với phần nhập lại!");
            }

        }
    </script>
</body>

</html>