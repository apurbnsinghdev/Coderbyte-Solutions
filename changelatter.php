<?php

function LetterChanges($str) {  
  
    
    for($i = 0; $i < strlen($str); $i++){
        
        if (preg_match("/^[a-z]$/i", $str[$i])) {
            $str[$i] = chr(ord($str[$i])+1);

            if (preg_match("/^[a|e|i|o|u]$/i", $str[$i])) {

                $str[$i] = strtoupper($str[$i]);
            }
        }          
    }
    // code goes here
    return $str; 
           
  }

  echo LetterChanges('hello*3');

?>