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
        $arrOut = [];
        for($i = 0; $i < 10; $i++){
            $countZero = 0;
            $arr[$i] = (int)$arr[$i];
            $arr[$i]= (string)$arr[$i];
            for($j = 0; $j<strlen($arr[$i]);$j++){
                if($arr[$i][$j] == "0"){
                    $countZero++;
                }
            }
            if($countZero == 2){
                $arrOut[] = $i;
            }
        }
        echo("Выходной массив:");
        if($arrOut ==[]){
            echo("Таких чисел нет");
        }
        else{
            for($i = 0; $i < count($arrOut);$i++){
                echo($arr[$arrOut[$i]]." ");
            }
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
            $arrOut = [];
            for($i = 0; $i < $n; $i++){
                $countZero = 0;
                $arr[$i] = (int)$arr[$i];
                $arr[$i]= (string)$arr[$i];
                for($j = 0; $j<strlen($arr[$i]);$j++){
                    if($arr[$i][$j] == "0"){
                        $countZero++;
                    }
                }
                if($countZero == 2){
                    $arrOut[] = $i;
                }
            }
            echo("Выходной массив:");
            if($arrOut ==[]){
                echo("Таких чисел нет");
            }
            else{
                for($i = 0; $i < count($arrOut);$i++){
                    echo($arr[$arrOut[$i]]." ");
                }
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