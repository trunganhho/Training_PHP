<html>
    <head>
    </head>
    <body>
        <h1>Danh sách các năm từ 1900 cho đến giờ</h1>
        <label>Chọn năm: </label>
        <select id="years"> 
        <?php 
            for($i = date("Y"); $i >= 1900; $i--){
        ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>      
        <?php
            }
        ?>
        </select>
    </body>
</html>