<?php

function array_push_array(array &$array) {
    $numArgs = func_num_args();
    if(2 > $numArgs) {
      trigger_error(sprintf('%s: expects at least 2 parameters, %s given', __FUNCTION__, $numArgs), E_USER_WARNING);
      return false;
    }
    $values = func_get_args();
    array_shift($values);
    foreach($values as $v) {
      if(is_array($v)) {
        if(count($v) > 0) {
          foreach($v as $w) $array[] = $w;
        }
      } else $array[] = $v;
    }
    return count($array);
}

$arr = array_map('trim', $arr);

function xmp_print_r($arr) { echo '<xmp>'; print_r($arr); echo '</xmp>'; }
function xmp_var_dump($var) { echo '<xmp>'; var_dump($var); echo '</xmp>'; }

function first($arr) {
	if (count($arr)<1) return null; 
	reset($arr);
	return $arr[key($arr)]; 
}

function last($arr) {
	if (count($arr)<1) return null; 
	end($arr);
	return $arr[key($arr)]; 
}

//array_splice($arr, $i); // $i 부터 끝까지 제거
//array_splice($arr, $i, $n); // $i 부터 $n개 제거
//array_splice($arr, $i, 1); // $i 번째 제거
//array_splice($arr, $i, 0, $str) // $i 번째에 원소 1개 삽입
//array_splice($arr, $i, 0, array($str1, $str2, ...) ) // $i 번째에 원소 여러개 삽입

$arr = array_filter($arr); 

//배열에서 숫자한글떼네기
function onlyHanAlpha($subject) {
    $pattern = '/([\xEA-\xED][\x80-\xBF]{2}|[a-zA-Z])+/';
    preg_match_all($pattern, $subject, $match);
    return implode('', $match[0]);
}

?>