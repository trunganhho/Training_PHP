<html>
    <head>
        <?php
        // Câu e 
        function UCLN($a, $b){
            if($a % $b != 0){
                return UCLN($b, $a % $b);
            }
            else return $b;
        }

        // Câu f
        function BCNN($a, $b){
            return ($a * $b) / UCLN($a, $b);
        }
        ?>
    </head>
    <body>
        <h2>Tính toán</h2>
        <?php
        /* Câu a
            $x = 3;
            $y = 5;
        */

        /* Câu b
            $x = rand(1, 30);
            $y = rand(1, 30);
        */   
        
        /* Câu c 
        do{
            $x = rand(1, 30);
            $y = rand(1, 30);
        } while($x <= $y);
        */

        /* Câu d
        do{
            $x = rand(1, 30);
            $y = rand(1, 30);
        } while($y % $x != 0);
        */

            echo "<p>$x + $y = " . ($x + $y) . "</p><br/>"
            . "<p>$x - $y = " . ($x - $y) . "</p><br/>" 
            . "<p>$x * $y = " . ($x * $y) . "</p><br/>"
            . "<p>$x / $y = " . ($x / $y) . "</p><br/>"
            . "<p>$x % $y = " . ($x % $y) . "</p><br/>"
            . "<p>Ước chung lớn nhất của $x và $y: " . UCLN($x,$y) . "</p><br/>"
            . "<p>Bội chung nhỏ nhất của $x và $y: " . BCNN($x,$y) . "</p><br/>";
        ?>
    </body>
</html>