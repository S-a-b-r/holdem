<?php
    function randomArr(){
        $arr = [];
        for($i=0; $i<10; $i++){
            $arr[$i] = random_int(-1000,1000);
            $arr[$i]=$arr[$i]."";
        }
        echo("Входной массив:");
        for($i = 0; $i < 10; $i++){
            echo ($arr[$i]." ");
        }
        echo("<br>");
        $k = 0;
        for($i = 0; $i < 5; $i++){
            if($arr[$i]==$arr[9-$i]){
                //
            }
            else{
                $k++;
                $j = $i;
            }
        }
        echo("Выходной массив:");
        if($j && $k< 2){
            echo("Нужно заменить ".$arr[$j]." . Который находится на ".$j." месте");
        }
        else{
            echo("НЕЛЬЗЯ");
        }
        echo("<br><a href='index.html'>Вернуться к началу</a>");
    }

    function unrandomArr(){
        echo('<form id="test" action="" method="POST">
                Введите элементы массива через пробел<br/>
                <textarea name = "array" cols = "40" rows = "10"></textarea>
                <button name = "method" value = "unrandom"> Отправить </button>
            </form>'
        );
        try{
            $arr = explode(" ", $_POST['array']);
            $n = count($arr);
            echo("Входной массив:");
            for($i = 0; $i < $n; $i++){
                echo ($arr[$i]." ");
            }
            echo("<br>");
            $k = 0;
            for($i = 0; $i < $n / 2; $i++){
                if($arr[$i]==$arr[$n-$i-1]){
                    //Пропускаем итерацию
                }
                else{
                    $k++;
                    $j = $i;
                    $move = $arr[$n-$i-1];
                }
            }
            echo("Выходной массив:");
            if($k < 2){
                echo("Нужно заменить ".$arr[$j]." . Который находится на ".($j+1)." месте. На ".$move);
            }
            else{
                echo("НЕЛЬЗЯ");
            }
            echo("<br><a href='index.html'>Вернуться к началу</a>");
        }
        catch(Exception $e){
            echo("Не удалось разбить строку на элементы");
        }
    }

    if($_GET['method'] == random){
        randomArr();
    }
    else{
        unrandomArr();
    }
?>