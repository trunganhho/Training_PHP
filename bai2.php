<html>
    <head></head>
    <body>
        <h2>Hiển thị thông tin học sinh</h2>
        <form action="" method="post">
            <label>Họ và tên: </label>
            <input type="text" name="fullName" value="<?php echo $_POST["fullName"] ?? null ?>"/><br/><br/>
            <label>Ngày sinh: </label>
            <input type="date" name="dob" value="<?php echo $_POST["dob"] ?? null ?>"/><br/><br/>
            <label>Lớp: </label>
            <input type="text" name="class" value="<?php echo $_POST["class"] ?? null ?>"/><br/><br/>
            <input type="submit" value="Hiển thị"/>
        </form>
        <?php
            $name = isset($_POST["fullName"]) ? $_POST["fullName"] : null;
            $dob = isset($_POST["dob"]) ? $_POST["dob"] : null;
            $class = isset($_POST["class"]) ? $_POST["class"] : null;

            $date_dob = date_create($dob);

            echo '<p>Họ và tên: ' . $name . '<br/>Ngày sinh: ' . date_format($date_dob, "d/m/Y") . '<br/>Lớp: ' .
            $class . '</p>';
        ?>
    </body>
</html>