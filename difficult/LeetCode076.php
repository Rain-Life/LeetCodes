<?php

class LeetCode076
{
    /**
     * 题目：给定一个整数数组，计算长度为 k 的连续子数组的最大总和
     * 示例：
     * 输入：arr=[100,200,300,400]
     *   k=2
     *   输出：700
     *   解释：300+400=700
    */
    public function maxSumForce($arr, $k)
    {
        $n = count($arr);
        $max = 0;
        for ($i=0; $i < $n-$k+1; $i++) {
            $sum = 0;
            for ($j=0; $j<$k; $j++) {
                $sum+=$arr[$i+$j];
            }
            $max = max($max, $sum);
        }

        return $max;
    }

    public function maxSumWindow($arr, $k)
    {

        $maxSum = 0;
        //先拿到第一个窗口的和，此时它就是最大值
        for ($i = 0; $i < $k; $i++) {
            $maxSum += $arr[$i];
        }

        $sum = $maxSum;
        for ($j = $k; $j < count($arr); $j++) {
            $sum += $arr[$j] - $arr[$j-$k];
            $maxSum = max($maxSum, $sum);
        }

        return $maxSum;
    }

    /**
     * LeetCode076
    */
    public function minWindow($s, $t)
    {

    }
}

$obj = new LeetCode076();
$res = $obj->maxSumWindow([100,200,300,400], 2);
var_dump($res);