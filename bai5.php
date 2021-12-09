<html>
    <head></head>
    <body>
        <h1>Dãy số</h1>
        <?php 
        for($i = 1; $i <= 100; $i++){
            echo '<p ' . ($i % 2 == 0 ? 'style="font-weight:bold;"' : '') . 
            '>'. $i . '</p>';
        }
        ?>
    </body>
</html>