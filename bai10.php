<html>
    <head></head>
    <body>
        <?php 
            $list = array("alpha", "beta", "gamma", "delta", "epsilon");
            echo '<label>Mảng các đối tượng: </label>';
            foreach($list as $value){
                echo $value . ($value != $list[count($list) - 1] ? ', ' : '.');
            }
        ?>
    </body>
</html>