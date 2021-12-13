<html>

<head>
    <style>
        form {
            width: fit-content;
            margin: 0 auto 0;
        }

        form h3 {
            text-align: center;
        }

        img {
            display: block;
            margin: 20px auto;
            width: 50%;
        }
    </style>

</head>

<body>
    <form action="bai27.php" method="post">
        <h3>Chọn và hiển thị ảnh</h3>
        <label>Chọn ảnh: </label>
        <select id="files" name="files">
            <option value="">Chọn file</option>
            <?php
            $mydir = './bai 26/uploads';

            $myfiles = array_diff(scandir($mydir), array('.', '..'));

            foreach ($myfiles as $file) {
            ?>
                <option value="<?php echo $file ?>"><?php echo $file ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Hiển thị ảnh" />
    </form>
    <?php
        if(isset($_POST["submit"])){
            if(!empty($_POST["files"])){
                echo '<img src="' . $mydir . '/' . $_POST["files"] . '" />';
            }
            else echo '<script>alert(\'Bạn chưa chọn ảnh để hiển thị!\');</script>';
        }
    ?>
</body>

</html>