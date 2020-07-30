<?php

class LeetCode003
{
    /**
     * 暴力解法
     *
     * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
     * abcabcbb
     *
     * 时间复杂度：O(n^2)
     * 空间复杂度：O(n)
     */
    public function baoli($s)
    {
        $len = strlen($s);
        if ($len <=1) {
            return $len;
        }
        $max = 0;

        for ($i=0; $i<$len; $i++) {
            $str = '';
            for ($j=$i; $j<$len; $j++) {
                if (strpos($str, $s[$j]) === false) {
                    $str .= $s[$j];
                    continue;
                }
                break;
            }
            $max = max($max, strlen($str));
        }

        return $max;
    }

    /**
     * 使用滑动窗口的方法
     */
    public function useHuaDong($s)
    {
        $len = strlen($s);
        if ($len <= 1) {
            return $len;
        }
        $max = 0;
        $hash = [];
        $left = 0;
        for ($right = 0; $right < $len; $right++) {
            $char = substr($s, $right, 1);
            if (isset($hash[$char])) {
                $left = max($left, $hash[$char] + 1);
            }
            $hash[$char] = $right;
            $max = max($max, $right - $left + 1);
        }
        return $max;
    }

    /**
     * 滑动窗口
     *
     * $s为给定的字符串
     * $t为目标字符串
     */
    public function huadong($s, $t)
    {
        $countT = strlen($t);
        $countS = strlen($s);
        $left = 0;
        $right =0;
        $map = [];
        $max = $countS;
        for ($i=0; $i<$countT; $i++) {
            if ($map[$t[$i]]) {
                $map[$t[$i]]++;
                continue;
            }
            $map[$t[$i]] = 1;
        }

        while ($right < $countS) {
            if ($map[$s[$right]] > 0) {
                $countT--;
            }
            $map[$s[$right]]--;
            $right++;

            while ($countT === 0) {
                $len = $right - $left;
                if ($len < $max) {
                    $max = $len;
                    $targetStr = substr($s, $left, $right);
                }

                if (in_array($s[$left], $t)) {
                    $countT++;
                }
                $left++;
            }
        }
    }

    /**
     * 滑动窗口大小固定
     */
    public function huaDongFixed($arr, $width)
    {

    }
}

$obj = new LeetCode003();
$res = $obj->baoli("");
var_dump($res);