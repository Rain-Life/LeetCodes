<?php

class LeetCode007
{
    /**
     * 整数反转
     *
     * 参考：https://leetcode-cn.com/problems/reverse-integer/solution/hua-jie-suan-fa-7-zheng-shu-fan-zhuan-by-guanpengc/
     * 注意溢出条件：ans * 10 + pop > MAX_VALUE
    */
    public function reverse($number)
    {
        $res = 0;//反转之后的值
        $maxValue = pow(2, 31)-1;//32位有符号整数的最大值
        $minValue = pow(-2, 31);//32位有符号整数的最小值
        while ($number !=0) {
            $last = $number%10;
            if ($res > $maxValue/10 || ($res == $maxValue/10 && $last > 7)) {//提前判断是为了避免溢出，导致程序抛异常
                return 0;
            }
            if ($res < $minValue/10 || ($res == $minValue/10 && $last < -8)) {
                return 0;
            }

            $res = $res*10+$last;
            $number = intval($number/10);
        }

        return $res;
    }
}

$obj = new LeetCode007();
var_dump($obj->reverse(123));