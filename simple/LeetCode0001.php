<?php

class LeetCode0001
{
    //暴力解法  时间复杂度n的平方  空间复杂度为O(1)
    public function twoSum($nums, $target)
    {
        $returnArr = [];
        $len = count($nums);
        for($i = 0; $i< $len; $i++) {
            for ($j=$i+1; $j<$len;$j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    $returnArr = [$i, $j];
                    break;
                }
            }
        }

        return $returnArr;
    }

    //解法二
    /**
     * A+B=target，用一种空间换时间的方法
     * 可能我们最容易想到的是，数组中米一个元素进行求和来找目标值
     * 而实际上减法能更加的快速的帮助我们找到，用目标值减去一个元素，另一个元素如果也存在于数组中，那么这两个数的下标就是我们要找的
     * 然后现在有一个问题就是，如何查询目标值减一个元素的差值在数组中
     * 这个时候就需要php中的array_key_exists()方法，我们将原数组进行翻转，也就是将原来的key(下标)变成value(值)，将value变成key
    */
    public function twoSume2($nums, $target)
    {
        $len = count($nums);
        $flip = [];
        for ($i=0; $i<$len; $i++) {
            $findValue = $target-$nums[$i];
            if (array_key_exists($findValue, $flip)) {
                return [$flip[$findValue], $i];
            }

            $flip[$nums[$i]] = $i;
        }
    }
}