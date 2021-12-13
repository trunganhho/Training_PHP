<html>

<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Courgette">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
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
            background-color: #fff5fa;
            border: 1px solid black;
        }

        h3 {
            padding: 0 9px 0;
            margin: 0;
            background-color: #ff665b;
            font-size: 25px;
            width: auto;
            text-align: center;
            color: white;
            font-family: 'Courgette';

        }

        input[readonly] {
            background-color: #ffeaa7;
        }

        #input {
            display: flex;
            margin: 5px 0;
        }

        #input * {
            margin: 0 5px 0;
        }

        #input label {
            color: red;
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
    <form action="bai26.php" method="post" enctype="multipart/form-data">
        <h3>THUỘC TÍNH CỦA TẬP TIN</h3>
        <div id="input">
            <label>Tập tin: </label>
            <input type="text" name="filename" size="40" />
            <div id="input_file">
                <input type="file" name="my_file" onchange="this.form.filename.value = this.value" style="color: transparent;" />
            </div>
        </div>
        <div id="buttonHolder">
            <input type="submit" name="submit" value="Thuộc tính tập tin" />
        </div>
    </form>
    <?php
    if (isset($_FILES["my_file"])) {
        $message = "";
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["my_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["my_file"]["tmp_name"]);
            if ($check !== false) {
                $message += "File is an image - " . $check["mime"] . ".\n";
                $uploadOk = 1;
            } else {
                $message += "File is not an image.\n";
                $uploadOk = 0;
            }
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $message += "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            $message += "Sorry, file already exists.\n";
            $uploadOk = 0;
          }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message += "Sorry, your file was not uploaded.\n";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_file)) {
                echo '<div id="res">
                <p>Tên file: ' . basename($target_file) . '</p>
                <p>Loại file: ' . $imageFileType . '</p>
                <p>Kích cỡ: ' . $_FILES["my_file"]["size"] / 1024 . ' Kb</p>
            </div>';
            $message += "Your file is uploaded.\n";
            } else {
                $message += "Sorry, there was an error uploading your file.\n";
            }
        }

        echo '<script>alert("' . $message . '");</script>';
    }
    ?>
    <script>
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('[name=filename]').val(fileName.replace(/C:\\fakepath\\/i, ''));
        });
    </script>
</body>

</html>