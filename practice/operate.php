<?php

/**
 * 数组[‘a’, ‘b’, ‘c’] 转换成字符串 ‘abc’
*/
function arrayToString(array $arr) {
    $str = implode('' , $arr);
    return $str;
}

//var_dump(arrayToString(['a', 'b', 'c']));

/**
 * 编写一段用最小代价实现将字符串完全反序, e.g. 将 “1234567890” 转换成 “0987654321”
*/

function reverseString($str) {
    $i = 0;
    $o = '';
    while (isset($str[$i]) && $str[$i] != null) {
        $o = $str[$i++].$o;
    }

    return $o;
}

//var_dump(reverseString("1234567890"));

/**
 * 将字符长fang-zhi-gang 转化为驼峰法的形式：FangZhiGang
*/
function tuoFeng($str) {
    $res = str_replace('-', ' ', $str);
    var_dump(str_replace(' ', '', ucwords($res)));
}

//tuoFeng("fang-zhi-gang");

/**
 * 请用递归实现一个阶乘求值算法 F(n): n=5;F(n)=5!=5*4*3*2*1=120
*/

function factorial($num) {
    if ($num <= 1) {
        return 1;
    }

    return $num * factorial($num-1);
}

//var_dump(factorial(5));

/**
 * 写一个方法获取文件的扩展名
*/
function getExtention($fileName) {
    $res = explode('.', $fileName);
    return end($res);
}

//var_dump(getExtention('111.png'));


/**
 * 写出一个能创建多级目录的PHP函数（新浪网技术部）
*/
function makeDir($path, $mode) {

    if (is_dir($path)) {
        return "目录已存在";
    } else {
        if (mkdir($path, $mode, true)) {
            return "创建成功";
        } else {
            return "创建失败";
        }
    }
}

/**
 * 请写一段PHP代码，确保多个进程同时写入同一个文件成功（腾讯）
*/

function lockFwrite($str) {
    $fp = fopen("lock.txt","w+");

    if (flock($fp,LOCK_EX)) {
        //获得写锁，写数据
        fwrite($fp, "write something");
        // 解除锁定
        flock($fp, LOCK_UN);
    } else {
        echo "file is locking...";
    }

    fclose($fp);
}

