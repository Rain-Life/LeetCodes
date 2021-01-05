<?php

// [1,2,3,4,5] 右移2位变成[4,5,1,2,3]
//@see https://leetcode-cn.com/problems/rotate-array/solution/xuan-zhuan-shu-zu-by-leetcode/

// k % 5

//方法一：用php自带的函数处理
function test1($arr, $k) {
    //将移动后的数组进行切割，然后合并
    $move = $k % count($arr);
    $arr1 = array_slice($arr, 0, count($arr)-$move);
    $arr2 = array_slice($arr, count($arr)-$move);

    return array_merge($arr2, $arr1);
}

//原地算法
function test2($arr, $k) {
    $len = count($arr);
    $k%=$len;
    $arr = reverse($arr, 0, $len-1);
    $arr = reverse($arr, 0, $k-1);
    $arr = reverse($arr, $k, $len-1);
    print_r($arr);
}

function reverse($arr, $start, $end) {
    while ($start < $end) {
        $temp = $arr[$start];
        $arr[$start] = $arr[$end];
        $arr[$end] = $temp;
        $start++;
        $end--;
    }

    return $arr;
}

//test2([1,2,3,4,5], 4);



//最长回文子串：https://leetcode-cn.com/problems/longest-palindromic-substring/





//顺序数组找某一重复数字个数
function numberTimes($arr, $target) {
    $start = binaryFindStart($arr, 0, count($arr), $target);
    $end = binaryFindEnd($arr, 0, count($arr), $target);
    return $end-$start+1;
}

function binaryFindStart($arr, $start, $end, $target) {
    if ($start > $end) {
        return;
    }

    while ($start <= $end) {
        $mid = ($start + $end) >> 1;
        if ($arr[$mid] > $target) {
            $end = $mid - 1;
        } else if($arr[$mid] < $target) {
            $start = $mid + 1;
        } else {
            if ($mid == 0 || $arr[$mid-1] != $target) {
                return $mid;
            } else {
                $start = $mid + 1;
            }
        }
    }
}

function binaryFindEnd($arr, $start, $end, $target) {
    if ($start > $end) {
        return;
    }

    while ($start <= $end) {
        $mid = ($start + $end) >> 1;
        if ($arr[$mid] > $target) {
            $end = $mid - 1;
        } else if($arr[$mid] < $target) {
            $start = $mid + 1;
        } else {
            if (($mid == (count($arr)-1)) || ($arr[$mid+1] != $target)) {
                return $mid;
            } else {
                $start = $mid + 1;
            }
        }
    }
}

//var_dump(numberTimes([1,2,3,3,3,3,4,5,6,7,8,9], 3));



//反转字符串
function reverseString($str) {
    $start = 0;
    $end = strlen($str)-1;
    while ($start <= $end) {
        $temp = $str[$start];
        $str[$start] = $str[$end];
        $str[$end] = $temp;
        $start++;
        $end--;
    }

    return $str;
}

//var_dump(reverseString("olleh"));


function is2Pow($number) {
    if ($number == 0) {
        return false;
    }

    if (($number & ($number-1)) == 0) {
        return true;
    }

    return false;
}

//var_dump(is2Pow(127));


//给一个字符串，找出最长不重复子串？
function maxNoRepeatStr($str) {
    $start = 0;//记录最长不重复子串的开始位置
    $maxLength = 0;//最长不重复子串的长度
    $map = [];//map
    for ($i=0; $i < strlen($str); $i++) {
        if (isset($map[$str[$i]])) {
            $start = $map[$str[$i]] + 1;
        }

        if (($i- $start + 1) > $maxLength) {
            $maxLength = $i - $start + 1;
        }

        $map[$str[$i]] = $i;
    }

    return $maxLength;
}

//var_dump(maxNoRepeatStr("abba"));

function probability($length) {

    $count = 0;
    for ($i=0; $i < 100; $i++) {
        $map = [];
        $j=0;
        while ($j < $length) {
            $number = mt_rand(0, 9);
            if (isset($map[$number])) {
                $count++;
                break;
            }
            $map[$number] = $j;
            $j++;
        }
    }
    var_dump($count/1000000);
}
//probability(6);









