<?php

class Hanoi
{
    static $count = 0;
    /**
     * n个圆盘，由a移动到c
     *
     * @param $n integer 圆盘的个数
     * @param $a string 柱子A
     * @param $b string 柱子B
     * @param $c string 柱子C
     */
    public function hanoiFunc($n, $a, $b, $c)
    {
        if ($n ==1) {
            $this->Move($n, $a, $c);
        } else {
            $this->hanoiFunc($n-1, $a, $c, $b);//递归调用，由a移动到b，c为临时
            $this->Move($n, $a, $c);
            $this->hanoiFunc($n-1, $b, $a, $c);//递归调用，由b移动到c，b为临时
        }
    }

    public function Move($n, $a, $c)
    {
        static::$count++;
        $string = "移动 ".$n."号圆盘: 由 ".$a." 移动到 ".$c.PHP_EOL;
        echo $string;
    }
}
$hanoi = new Hanoi();
$hanoi->hanoiFunc(3, 'A', 'B', 'C');
var_dump(Hanoi::$count);