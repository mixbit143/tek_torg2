<?php
include('index.html');

if(isset($_POST['button'])){
    echo $_POST['text']. ' => ' ;
    echo checkText($_POST['text']) === true ? 'true' : 'false';
}
if(isset($_POST['button1'])){
    var_dump(build($_POST['text1']));
}

function checkText($value)
{
    $array = [
        '(' => ')',
        '[' => ']',
        '{' => '}'
    ];
    $check = [];
    foreach (str_split($value) as $item) {
        if (array_key_exists($item, $array)) {
            $check[] = $item;
            continue;
        }
        if ($item !== $array[end($check)]) {
            break;
        }
        array_pop($check);
    }
    return count($check) === 0;
}

function build($value){
    $array = [];
    $zvezda = 1;
    if ($value%2===0) {
        for ($i=0;$value>$i;$i++) {
            $triangle = ($value*2)-1;
            $array[$i] = str_pad($array[$i], $zvezda, '*');
            $array[$i] = str_pad($array[$i], $triangle, ' ', STR_PAD_BOTH);
            $zvezda += 2;
        }
    }
    else {
        $number = 1;
        for ($i=0;$value>$i;$i++) {
            if ($number <= $value/2) {
                $array[$i] = str_pad($array[$i], $zvezda, '*');
                $array[$i] = str_pad($array[$i], $value,' ', STR_PAD_BOTH);
                $zvezda+=2;
                $number++;
            } else {
                $array[$i] = str_pad($array[$i], $zvezda, '*');
                $array[$i] = str_pad($array[$i], $value,' ', STR_PAD_BOTH);
                $zvezda-=2;
            }
        }
    }
    return $array;
}


