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

/**
 * 写一个函数，尽可能高效的，从一个标准url里取出文件的扩展名，例如:
http://www.sina.com.cn/abc/de/fg.php?id=1需要取出php或.php（新浪）
*/
function getExtl($url) {
    $arr = parse_url($url);
    $file = basename($arr['path']);
    $ext = explode('.', $file);

    return $ext[count($ext)-1];
}

//var_dump(getExtl("http://www.sina.com.cn/abc/de/fg.php?id=1"));

/**
 * 写一个函数，能够遍历一个文件夹下的所有文件和子文件夹。（新浪）
*/
function my_scandir($dir){

    $files = array();

    if(is_dir($dir)){
        if ($handle = opendir($dir)) {

            while (($file = readdir($handle))!== false) {

                if ($file!="." && $file!="..") {

                    if (is_dir($dir."/".$file)) {

                        $files[$file] = my_scandir($dir."/".$file);

                    } else {

                        $files[] = $dir."/".$file;

                    }

                }

            }
            closedir($handle);
            return $files;
        }

    }

}

/**
 * 实现无限极分类
*/
function tree($arr,$pid=0,$level=0){
    static $list = array();
    foreach ($arr as $v) {
        //如果是顶级分类，则将其存到$list中，并以此节点为根节点，遍历其子节点
        if ($v['parent_id'] == $pid) {
            $v['level'] = $level;
            $list[] = $v;
            tree($arr,$v['cat_id'],$level+1);
        }
    }

    return $list;
}


/**
 * 写一个函数，算出两个文件的相对路径，如b='/a/b/12/34/c.php';计算出a的相对路径应该是../../c/d（新浪）
*/

function releative_path($path1,$path2){
    $arr1 = explode("/",dirname($path1));
    $arr2 = explode("/",dirname($path2));
    //var_dump(dirname($path1), dirname($path2), $arr1, $arr2);
    for ($i=0,$len = count($arr2); $i < $len; $i++) {
        if ($arr1[$i]!=$arr2[$i]) {
            break;
        }
    }
    //var_dump($i);exit;
    // 不在同一个根目录下
    if ($i==1) {
        $return_path = array();
    }
    // 在同一个根目录下
    if ($i != 1 && $i < $len) {
        $return_path = array_fill(0, $len - $i,"..");
    }
    // 在同一个目录下
    if ($i == $len) {
        $return_path = array('./');
    }

    $return_path = array_merge($return_path,array_slice($arr1,$i));
    return implode('/',$return_path);

}

$a = '/a/b/c/d/e.php';

$b = '/a/b/12/34/c.php';

$c = '/e/b/c/d/f.php';

$d = '/a/b/c/d/g.php';



//echo releative_path($a,$b);//结果是../../c/d
//
//echo "<br />";
//
//echo releative_path($a,$c);//结果是a/b/c/d
//
//echo "<br />";
//
//echo releative_path($a,$d);//结果是./
//
//echo "<br />";


/**
 * 编写函数取得上一月的最后一天
*/
function getLastMonthLastDay($date) {
    if ($date != '') {
        $time = strtotime($date);
    } else {
        $time = time();
    }

    $day = date('j', $time);//获取该日期是当前月的第几天
    return date('Y-m-d',strtotime("-{$day} days", $time));
}

//var_dump(getLastMonthLastDay('2020-03-11'));


function yinYong() {
//    $a = range(0, 3);
//    xdebug_debug_zval('a');
    //定义变量b，将a的值赋给b
    //$b = $a;//此时看内存空间应该是下图那样（当没有对$a或$b进行修改的时候，是不会再复制一块空间出来的，这叫写时复制Copy on write）

//    $a = array( 'one' );
//    $a[] =& $a;
//    xdebug_debug_zval( 'a' );

    $a = 'new string';
    $b = 1;
    xdebug_debug_zval('a');
    xdebug_debug_zval('b');
}

//yinYong();

function gcTest() {
    $a = 'hello'; // $a -> zend_string
    xdebug_debug_zval('a');
    $b = $a; // $b,$a -> zend_string

    xdebug_debug_zval('a');
    xdebug_debug_zval('b');

    $c = &$b; // $c,$b -> zval(type = IS_REFERENCE, refcount = 2) -> zend_string
    xdebug_debug_zval('b');
    xdebug_debug_zval('c');
}

//gcTest();

//$a = "aabbzz"; $a++; echo $a;


//$a = [
//    'string' => 'life',
//    'object' => new stdClass()
//];
//
//xdebug_debug_zval('a');
//echo PHP_EOL;
//
//$c = &$a['string'];
//xdebug_debug_zval('a');
//echo PHP_EOL;
//
//$b = $a['object'];
//xdebug_debug_zval('a');
//echo PHP_EOL;
//
//$d = $b;
//
//xdebug_debug_zval('a');
//echo PHP_EOL;
//
//$c = 'new lift';
//
//xdebug_debug_zval('a');
//echo PHP_EOL;
//
//unset($c);
//xdebug_debug_zval('a');var_dump($a['string']);
//echo PHP_EOL;


//$a = 1;
//$b = 2;
//function Sum()
//{
//    global $a, $b; //在里面声明为全局变量
//    $b = $a + $b;
//}
//Sum();
//echo $b;
//
//$var1 = "111";
//$var2 = "";
//$var2 = &$var1;
//var_dump($var2);

//$var1 = "Example variable";
//$var2 = "";
//
//function test($flag) {
//    global $var1,$var2;
//    if (!$flag) {
//        $var2 = &$var1;
//    } else {
//        $GLOBALS["var2"] = &$var1;
//    }
//}
//
//test(false);
//var_dump($var2);
//$var2 = 'new var';
//test(true);
//var_dump($var1,$var2);


class A {
    private static $instance;
    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

