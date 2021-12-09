<html>
    <head>
    </head>
    <body>
        <?php
            $n = 10;
            $even_total = 0;
            $odd_total = 0;
            $max = 0;
            $min = 9999;
            $temp;
            $arr = array();
            
            for($i = 1; $i <= 10; $i++){
                $temp =  rand(1,40);

                if($temp % 2 == 0) $even_total += $temp;
                else $odd_total += $temp;

                if($max < $temp){
                    $max = $temp;
                }
                
                if($min > $temp){
                    $min = $temp;
                }

                array_push($arr, $temp);
            }    
        ?>
        <label>Mảng cho trước: </label>
        <?php 
            for($i = 0; $i < 10; $i++){
                echo $arr[$i] . ($i != 9 ? ', ' : '.');
            }
                
        ?>
        <br/>
        <label>Tổng các số chẵn: </label><?php echo $even_total ?><br/>
        <label>Tổng các số lẻ: </label><?php echo $odd_total ?><br/>
        <label>Số có giá trị lớn nhất: </label><?php echo $max ?><br/>
        <label>Số có giá trị nhỏ nhất: </label><?php echo $min ?><br/>
        <label>Mảng đảo ngược: </label>
        <?php 
            $reversed = array_reverse($arr);
            for($i = 0; $i < 10; $i++){
                echo $reversed[$i] . ($i != 9 ? ', ' : '.');
            }
        ?>
    </body>
</html>