<?php
/*
 * Using the PHP language, have the function ArrayAddition(arr) take the array of numbers stored in arr 
 * and return the string true if any combination of numbers in the array can be added up to equal the largest number 
 * in the array, otherwise return the string false. 
 * 
 * For example: if arr contains [4, 6, 23, 10, 1, 3] the output should return true because 4 + 6 + 10 + 3 = 23. 
 * The array will not be empty, will not contain all the same elements, and may contain negative numbers. 
 * Input = 5,7,16,1,2 Output = "false"
 * Input = 3,5,-1,8,12 Output = "true"
 */
function ArrayAddition($arr) {
    
    $max = max($arr);
    $arr = array_filter($arr, function($value) use($max){
        return $value != $max;
    });

    $loopArray = function(&$arr) use(&$loopArray, $max){
        $totalArr = array_sum($arr);
        if($totalArr == $max){
            return true;
        }
        elseif($totalArr>$max){
            $howBig = $totalArr-$max;

            $key = array_search($howBig,$arr);            
            unset($arr[$key]);   
            
            return $loopArray($arr);

        }else{
            return false;
        }
    };
    return $loopArray($arr);
}
echo ArrayAddition([4, 6, 23, 10, 1, 3]);
