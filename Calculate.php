<?php 

class Calculate{

    public function solve($num1, $num2, $operator){
        if($operator == "+"){
            $total = $num1 + $num2;
        }
        elseif($operator == "-"){
            $total = $num1 - $num2;
        }
        elseif($operator == "*"){
            $total = $num1 * $num2;
        }
        else{
            $total = $num1 / $num2;
        }
        return $total;
    }
}