<?php
    function randomArr(){
        $arr = [];
        for($i=0; $i<10; $i++){
            $arr[$i] = random_int(-10000,10000);
            $arr[$i]=$arr[$i]."";
        }
        echo("Входной массив:");
        for($i = 0; $i < 10; $i++){
            echo ($arr[$i]." ");
        }
        echo("<br>");
        $arrOut = [];
        for($i = 0; $i < 10; $i++){
            $countZero = 0;
            for($j = 0; $j<strlen($arr[$i]);$j++){
                if($arr[$i][$j] == "0"){
                    $countZero++;
                }
            }
            if($countZero == 2){
                $arrOut[] = $arr[$i];
            }
        }
        echo("Выходной массив:");
        if($arrOut ==[]){
            echo("Таких чисел нет");
        }
        else{
            for($i = 0; $i < count($arrOut);$i++){
                echo($arrOut[$i]." ");
            }
        }
    }

    function unrandomArr(){
        $n = $_GET['n'];
        if($n>100){
            return "Кол-во элементов массива должно быть меньше 100";
        }
        else{
            echo('<form id="test" action="" method="POST">
                    Введите элементы массива через пробел<br/>
                    <textarea name = "array" cols = "40" rows = "10"></textarea>
                    <button name = "method" value = "unrandom"> Отправить </button>
                </form>');
            try{
                $arr = explode(" ", $_POST['array']);
                echo("Входной массив:");
                for($i = 0; $i<$n; $i++){
                    echo ($arr[$i]." ");
                }
                echo("<br>");
                $arrOut = [];
                for($i = 0; $i < $n; $i++){
                    $countZero = 0;
                    for($j = 0; $j<strlen($arr[$i]);$j++){
                        if($arr[$i][$j] == "0"){
                            $countZero++;
                        }
                    }
                    if($countZero == 2){
                        $arrOut[] = $arr[$i];
                    }
                }
                echo("Выходной массив:");
                if($arrOut ==[]){
                    echo("Таких чисел нет");
                }
                else{
                    for($i = 0; $i < count($arrOut);$i++){
                        echo($arrOut[$i]." ");
                    }
                }
            }
            catch(Exception $e){
                echo("Не удалось разбить строку на элементы");
            }
        }
    }

    if($_GET['method'] == random){
        randomArr();
    }
    else{
        echo('
        <form id="test" action="" method="GET">
            Введите количество элементов массива <br/> 
            <input name = "n">
            <button name = "method" value = "unrandom"> Ввести числа вручную </button>
        </form>');
        if($_GET['n'] != ""){
            unrandomArr();
        }
        
    }
?>