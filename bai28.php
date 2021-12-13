<html>

<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Courgette">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .row {
            width: 60%;
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
            margin: 0 auto;
        }

        /* Create four equal columns that sits next to each other */
        .column {
            flex: 25%;
            max-width: 100%;
            padding: 0 4px;
        }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
            width: 100%;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
            .column {
                flex: 50%;
                max-width: 50%;
            }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                flex: 100%;
                max-width: 100%;
            }
        }

        td {
            padding: 5px 40px 5px 0;
            width: 100px;
        }

        #buttonHolder {
            text-align: center;
            padding-bottom: 20px;
        }

        form {
            width: fit-content;
            margin: 0 auto 0;
            background-color: #6bdcd1;
            border: 1px solid black;
        }

        h3 {
            padding: 0 30px 0;
            margin: 0;
            background-color: #009688;
            font-size: 25px;
            width: auto;
            text-align: center;
            color: white;

        }

        input[readonly] {
            background-color: #ffeaa7;
        }

        #input1 {
            display: flex;
            margin: 5px 0;
        }

        #input1 * {
            margin: 0 5px 0;
        }

        #input2 {
            display: flex;
            margin: 5px 0;
        }

        #input2 * {
            margin: 10px 5px 0;
        }

        #res {
            margin: 20px auto 0;
            width: 70%;
            background-color: #fff5fa;
            text-align: center;
            color: red;
            border: 1px solid black;
        }
    </style>
    <?php

    ?>
</head>

<body>
    <form action="bai28.php" method="post">
        <h3>XEM THƯ MỤC HÌNH ẢNH</h3>
        <div id="input1">
            <label>Chọn thư mục hình: </label>
            <select name="dir">
                <?php
                $parent_dir = '.';
                $directories = glob($parent_dir . '/*', GLOB_ONLYDIR);

                foreach ($directories as $directory) {
                ?>
                    <option value="<?php echo $directory ?>">
                        <?php echo $directory ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div id="input2" name="size">
            <label>Kích cỡ hiển thị: </label>
            <select name="size">
                <option value="100">100 x 100</option>
                <option value="150">150 x 150</option>
                <option value="200">200 x 200</option>
            </select>
        </div>
        <div id="buttonHolder">
            <input type="submit" name="submit" value="Xem hình ảnh" />
        </div>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $size = $_POST["size"] ?? 100;
        $folder = $_POST["dir"] ?? null;
        $myfiles = array_diff(scandir($folder), array('.', '..'));
    ?>

        <div class="row">
            <?php
            ?>
                <div class="column">
                    <?php
                    for ($j = 2; $j < count($myfiles) + 2; $j++) {
                        $full_path_file = $folder . '/' . $myfiles[$j] ?? null;
                    ?>
                        <img src="<?php echo $full_path_file; ?>" style="height: <?php echo $size ?>px; width: <?php echo $size ?>px;">
                    <?php
                    }
                    ?>
                </div>
            <?php
                
             ?>
        </div>

    <?php
    }
    ?>
</body>

</html>