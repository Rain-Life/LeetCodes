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
        //找出所有无重复字符的子串
        $len = strlen($s);
        $arrStr = [];//存储所有的子串
        for ($i=0; $i<$len; $i++) {
            $str = $s[$i];//临时存储所有不包含重复字符的子串
            for ($j=$i+1; $j<$len; $j++) {
                if (strpos($str, $s[$j]) === false) {//验证字符是否在指定字符串中出现过
                    $str .= $s[$j];
                } else {
                    $arrStr[] = $str;
                    break;
                }
            }
        }

        $max = 0;
        //求出所有子串中最大的长度
        for ($k=0; $k<count($arrStr); $k++) {
            $strLen = strlen($arrStr[$k]);
            if ($strLen > $max) {
                $max = $strLen;
            }
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
}

$obj = new LeetCode003();
$obj->baoli("pwwkew");