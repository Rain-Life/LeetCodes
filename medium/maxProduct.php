<?php
class Solution {
    /**
     * 题号：152
    * @param Integer[] $nums
    * @return Integer
    */
    public function maxProduct($nums) {
        $newMax = $newMin = 1;
        $max = $nums[0];
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] < 0) {
                $tmp = $newMax;
                $imax = $newMin;
                $imin = $tmp;
            }

            $newMax = max($newMax*$nums[$i], $nums[$i]);
            $newMin = min($newMin*$nums[$i], $nums[$i]);

            $max = max($max, $newMax);
        }

        return $max;
    }
}

//参考：https://leetcode-cn.com/problems/maximum-product-subarray/solution/hua-jie-suan-fa-152-cheng-ji-zui-da-zi-xu-lie-by-g/